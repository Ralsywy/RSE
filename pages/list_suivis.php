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
    $requete = $mysqlConnection->prepare('SELECT * FROM inscrit');

    //execution de la requete
    $requete->execute();
    $inscrits = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;
    ?>

    <!--BARRE DE RECHERCHE-->
    <div class="barre_recherche">
        <label for="search">
            <img src="img/search.png" id="img_search">
        </label>
        <input type="text" id="getName" placeholder="Rechercher un inscrit">
    </div>

    <div class="grille">
        <!-- UN INSCRIT -->
        <?php
            foreach ($inscrits as $ligne){
        ?>
        <div class="grid-item">
            <p class="nom"><?= $ligne["nom"] ?></p>
            <p class="prenom"><?= $ligne["prenom"] ?></p>
            <a href="#" class="btn1">Modifier</a>
        </div>
        <?php
        }
        ?>
        <!-- FIN D'UN INSCRIT -->
    </div>

<?php
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>