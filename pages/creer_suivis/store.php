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
$requete = $mysqlConnection->prepare("INSERT INTO inscrit(dte_contact,origine_contact,inscrit_rdc) VALUES (:dte_contact,:origine_contact,:inscrit_rdc);
INSERT INTO rdc(id_rdc,numero,centre) VALUES (:numero(),:numero,:centre)");
//execution de la requete
$last_id = $mysqlConnection->lastInsertId();
$requete->execute(["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"],"inscrit_rdc"=>$_POST["inscrit_rdc"],
"id_rdc"=>$last_id,"numero"=>$_POST["numero"],"centre"=>$_POST["centre"]]);
$requete = null;
$_SESSION["success"]="Première page du formulaire complétée";
$mysqlConnection = null;

header("location:index.php?route=creer2");
?>