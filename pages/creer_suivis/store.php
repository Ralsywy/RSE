<?php
// création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

// ordre de mission
$requete = $mysqlConnection->prepare('INSERT INTO inscrit(dte_contact,origine_contact) values(:dte_contact,:origine_contact)');
//execution de la requete
$requete->execute( ["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"]]);
$_SESSION["success"]="Première page du formulaire complétée";
$mysqlConnection = null;
$requete = null;


header("location:index.php?route=creer2");
?>