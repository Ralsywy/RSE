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
            <form method="POST">
            <label for="search">
                <img src="img/search.png" id="img_search">
            </label>
            <input type="text" name="search" placeholder="Rechercher un inscrit">
            <input type="submit" name="submit">
            </form>
        </div>
        <?php
        if(isset($_POST["submit"])){
            $str = $_POST["search"];
            $sth = $mysqlConnection->prepare("SELECT * FROM inscrit WHERE nom = '$str'");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();

            if($row = $sth->fetch())
            {
                ?>
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
                
                <tr>
                    <td><?php echo $row->id_inscrit; ?></td>
                    <td><?php echo $row->nom; ?></td>
                    <td><?php echo $row->prenom; ?></td>
                    <td><?php echo $row->name_acc; ?></td>
                    <td>
                        <a href="index.php?route=creer_suivis"><button class="btn_modifier">Modifier</button></a>
                        <a href="index.php?route=edit_statut&id=<?= $ligne["id_inscrit"] ?>"><button class="btn_term">Terminer</button></a>
                    </td>
                </tr>
                <?php
                $sth = null;
            }

            ?>
            </tbody>
            </table>
                <?php
            
        }
        ?>
        <!--TABLEAU-->
        <div class="tableau">
            
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