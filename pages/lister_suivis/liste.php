<?php
if (isset($_SESSION["login"])){

    // création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    ?>
    <div class="page_list_suivis">
        <!--BARRE DE RECHERCHE-->
        <div class="barre_recherche">
            <form method="post" type="search">
                <label for="search">
                    <img src="img/search.png" id="img_search">
                </label>
                <input type="text" name="getname" placeholder="Rechercher">
                <input type="submit" name="submit" value="Valider">
            </form>
        </div>
        <?php
        $recherche = "";
        ?>

        <!--TABLEAU-->
        <div class="tableau">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Accompagnateur</th>
                    <th scope="col">Nombre de démarches</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
        <?php
        if(isset($_POST['submit']) && ($_POST['getname']) != "")
        {
            $recherche = $_POST['getname'];
            $requete = $mysqlConnection->prepare("SELECT * FROM inscrit INNER JOIN accompagnateur ON inscrit.fk_id_accompagnateur = accompagnateur.id_accompagnateur WHERE CONCAT(nom,prenom) LIKE '%$recherche%'");
            $requete->execute();
            $inscrits = $requete->fetchAll();
            $mysqlConnection = null;
            $requete = null;

            foreach ($inscrits as $ligne){
                if($ligne["statut"] == 0){
                    ?>
                    <tr>
                        <th scope="row"><?= $ligne["id_inscrit"]?></th>
                        <td><?= $ligne["nom"]?></td>
                        <td><?= $ligne["prenom"]?></td>
                        <td><?= $ligne["name_acc"]?></td>
                        <td><?= $ligne["nb_demarche"]?></td>
                        <td>
                            <a href="index.php?route=creer_suivis"><button class="btn_modifier">Modifier</button></a>
                            <a href="index.php?route=edit_statut&id=<?= $ligne["id_inscrit"] ?>"><button class="btn_term">Terminer</button></a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
            </table>    
        <?php
        }else{
            $requete = $mysqlConnection->prepare("SELECT * FROM inscrit INNER JOIN accompagnateur ON inscrit.fk_id_accompagnateur = accompagnateur.id_accompagnateur WHERE CONCAT(nom,prenom) LIKE '%$recherche%'");
            $requete->execute();
            $inscrits = $requete->fetchAll();
            $mysqlConnection = null;
            $requete = null;
            foreach ($inscrits as $ligne){
                if($ligne["statut"] == 0){
                    ?>
                    <tr>
                        <th scope="row"><?= $ligne["id_inscrit"]?></th>
                        <td><?= $ligne["nom"]?></td>
                        <td><?= $ligne["prenom"]?></td>
                        <td><?= $ligne["name_acc"]?></td>
                        <td><?= $ligne["nb_demarche"]?></td>
                        <td>
                            <a href="index.php?route=creer_suivis"><button class="btn_modifier">Modifier</button></a>
                            <a href="index.php?route=edit_statut&id=<?= $ligne["id_inscrit"] ?>"><button class="btn_term">Terminer</button></a>
                        </td>
                    </tr>
                    <?php
                }
            }
        } ?></div>
    </div>
<?php
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>