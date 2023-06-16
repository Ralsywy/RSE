<?php
$mysqlConnection = new PDO(
    'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
    USER,
    PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);


$today = date("Y-m-d");

// ordre de mission
$requete = $mysqlConnection->prepare('UPDATE inscrit SET statut=1,dte_cloture=:dte_cloture where id_inscrit=:id');
//execution de la requete
$requete->execute(["id"=>$_GET["id"],"dte_cloture"=>$today]);
session_start();   
$requete = null; 




$mysqlConnection = null;
header("location:index.php?route=list_suivis");
?>