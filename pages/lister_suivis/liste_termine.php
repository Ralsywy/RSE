<?php
if (isset($_SESSION["login"])){

    // création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM inscrit INNER JOIN accompagnateur ON inscrit.fk_id_accompagnateur = accompagnateur.id_accompagnateur');

    //execution de la requete
    $requete->execute();
    $inscrits = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;
    ?>
    <div class="page_list_suivis">
        <!--BARRE DE RECHERCHE-->
        <div class="barre_recherche">
            <label for="search">
                <img src="img/search.png" id="img_search">
            </label>
            <input type="text" id="getName" placeholder="Rechercher un inscrit">
        </div>

        <div class="tableau">
            <div class="col">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Accompagnateur</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- UN INSCRIT -->
                <?php
                    foreach ($inscrits as $ligne){
                        if($ligne["statut"] == 1){
                            ?>
                            <tr>
                                <th scope="row"><?= $ligne["id_inscrit"]?></th>
                                <td><?= $ligne["nom"]?></td>
                                <td><?= $ligne["prenom"]?></td>
                                <td><?= $ligne["name_acc"]?></td>
                                <td>
                                    <a href="#"><button class="btn_modifier">Modifier</button></a>
                                    <a href="#"><button class="btn_term">Terminer</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                
                    }?><!-- FIN D'UN INSCRIT -->
            </tbody>
            </table>    
            </div>
        </div>
    </div>
<?php
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>