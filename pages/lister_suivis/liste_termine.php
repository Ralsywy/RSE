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
        <?php
        include("barre_recherche.php");
        $recherche = "";
        function rowCOUNT($mysqlConnection,$requete){
            $stmt = $mysqlConnection->prepare($requete);
            $stmt->execute();
            return $stmt->rowCount();
        }
        ?>

        <!--TABLEAU-->
        <div class="tableau">
            <table class="table table_sortable">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Accompagnateur</th>
                    <th scope="col">Nombre de rendez-vous</th>
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
            $requete = null;

            foreach ($inscrits as $ligne){
                $id_insc = $ligne["id_inscrit"];
                if($ligne["statut"] == 1){
                    ?>
                    <tr>
                        <td><?= $ligne["nom"]?></td>
                        <td><?= $ligne["prenom"]?></td>
                        <td><?= $ligne["name_acc"]?></td>
                        <td><?= rowCount($mysqlConnection,"SELECT * FROM plan_action WHERE fk_id_inscrit_plan = $id_insc") ?></td>
                        <td>
                            <a href="index.php?route=edit_reprendre&id=<?= $ligne["id_inscrit"] ?>"><button class="btn_reprendre">Reprendre</button></a>
                            <?php
                            if (isset($_SESSION["is_admin"])){
                            ?>
                            <a href="index.php?route=supp_inscrit&id=<?= $ligne["id_inscrit"]?>"><button class="btn_supp">Supprimer</button></a>
                            <?php
                            }
                            ?>
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
            $requete = null;
            foreach ($inscrits as $ligne){
                $id_insc = $ligne["id_inscrit"];
                if($ligne["statut"] == 1){
                    ?>
                    <tr>
                        <td><?= $ligne["nom"]?></td>
                        <td><?= $ligne["prenom"]?></td>
                        <td><?= $ligne["name_acc"]?></td>
                        <td><?= rowCount($mysqlConnection,"SELECT * FROM plan_action WHERE fk_id_inscrit_plan = $id_insc") ?></td>
                        <td>
                            <a href="index.php?route=edit_reprendre&id=<?= $ligne["id_inscrit"] ?>"><button class="btn_reprendre">Reprendre</button></a>
                            <?php
                            if (isset($_SESSION["is_admin"])){
                            ?>
                            <a href="index.php?route=supp_inscrit&id=<?= $ligne["id_inscrit"]?>"><button class="btn_supp">Supprimer</button></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
        } ?></div>
    </div>
    <script src="javascript/tablesort.js"></script>
    
<?php
$mysqlConnection = null;
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>