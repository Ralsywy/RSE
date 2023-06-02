<?php
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM plan_action where id_plan_action=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    session_start();

$mysqlConnection = null;
$requete = null; 
header("location:index.php?route=creer2");
?>