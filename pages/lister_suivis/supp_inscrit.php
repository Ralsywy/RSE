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
    $requete = $mysqlConnection->prepare('DELETE FROM permis_conduire WHERE fk_id_inscrit_permis=:id AND fk_id_inscrit_permis IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null;


    ////    ENFANT    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM enfant WHERE fk_id_inscrit_enfant=:id AND fk_id_inscrit_enfant IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null;

    ////    PLAN ACTION    //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM rdv WHERE fk_id_inscrit_rdv=:id AND fk_id_inscrit_rdv IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null;

    ////    INSCRIT    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM inscrit where id_inscrit=:id AND id_inscrit IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 


    ////    CAP EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cap_emploi where id_cap_emploi=:id AND id_cap_emploi IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

        ////    CMA EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cma where id_cma=:id AND id_cma IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

            ////    CV EMPLOI    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM cv where id_cv=:id AND id_cv IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////    LANGUE FR    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM langue_francaise where id_langue_francaise=:id AND id_langue_francaise IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////    LANGUE EN    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM langue_anglaise where id_langue_anglaise=:id AND id_langue_anglaise IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   mission locale   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM mission_locale where id_mission_locale=:id AND id_mission_locale IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   pole emploi   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM pole_emploi where id_pole_emploi=:id AND id_pole_emploi IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   RDC   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM rdc where id_rdc=:id AND id_rdc IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   SOELIS   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM soelis where id_soelis=:id AND id_soelis IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   FILES   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM files where id_files=:id AND id_files IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

    ////   FILES   ////
    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM resultat where id_resultat=:id AND id_resultat IS NOT NULL');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    $requete = null; 

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
header("location:$_SERVER[HTTP_REFERER]");
?>