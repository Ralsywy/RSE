<?php
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM rdv where id_rdv=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    session_start();

$mysqlConnection = null;
$requete = null; 
header("location:$_SERVER[HTTP_REFERER]");
?>