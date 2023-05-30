<?php
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('UPDATE inscrit SET statut=1 where id_inscrit=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    session_start();

$mysqlConnection = null;
$requete = null; 
header("location:index.php?route=list_suivis");
?>