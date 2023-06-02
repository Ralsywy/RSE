<?php
// création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
$choix_rdc = $_POST['inscrit_rdc'];
// ordre de mission
$requete = $mysqlConnection->prepare('INSERT INTO inscrit(dte_contact,origine_contact,inscrit_rdc) values(:dte_contact,:origine_contact,:inscrit_rdc)');
//execution de la requete
$requete->execute( ["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"],"inscrit_rdc"=>$_POST["inscrit_rdc"]]);
$_SESSION["success"]="Première page du formulaire complétée";
$mysqlConnection = null;
$requete = null;


header("location:index.php?route=creer2");
?>