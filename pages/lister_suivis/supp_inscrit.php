<?php
try{
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    ////    PERMIS    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM permis_conduire WHERE fk_id_inscrit_permis=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    ENFANT    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM enfants WHERE fk_id_inscrit_enfant=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    formation pro    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM formation_pro WHERE fk_id_inscrit_formation=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    PLAN ACTION    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM plan_action WHERE fk_id_inscrit_plan=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    INSCRIT    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM inscrit where id_inscrit=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    CAP EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cap_emploi where id_cap_emploi=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

        ////    CMA EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cma where id_cma=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

            ////    CV EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cv where id_cv=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////    LANGUE FR    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM langue_francaise where id_langue_francaise=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////   mission locale   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM mission_locale where id_mission_locale=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////   pole emploi   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM pole_emploi where id_pole_emploi=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////   RDC   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM rdc where id_rdc=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);

    ////   SOELIS   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM soelis where id_soelis=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);


    session_start();
    $_SESSION["success"]="Inscrit supprimé avec succès";

}
catch (Exception $e) {
    if ($e->getCode() == 23000) {
        $_SESSION["error"]="Suppression impossible";
    }
    else{
        $_SESSION["error"]="Erreur SQL";
    }
}

$mysqlConnection = null;
$requete = null; 
header("location:index.php?route=list_suivis");
?>