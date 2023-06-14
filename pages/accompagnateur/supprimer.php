<?php
try{
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    

    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM accompagnateur where id_accompagnateur=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null;
    
    session_start();
    $_SESSION["success"]="Accompagnateur supprimé avec succès";
}
catch (Exception $e) {
    if ($e->getCode() == 23000) {
        $_SESSION["error"]="Suppression impossible , l'accompagnateur est relié à un inscrit";
    }
    else{
        $_SESSION["error"]="Erreur SQL";
    }
}

$mysqlConnection = null;

header("location:index.php?route=creer_accompagnateur");
?>