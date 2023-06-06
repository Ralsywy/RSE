<?php
// création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );


////    Information personnelles    ////
$choix_rdc = $_POST['inscrit_rdc'];
$choix_enfant = $_POST['enfant_charge'];
// ordre de mission
$requete = $mysqlConnection->prepare("INSERT INTO inscrit(dte_contact,origine_contact,inscrit_rdc,enfant_charge) VALUES (:dte_contact,:origine_contact,:inscrit_rdc,:enfant_charge)");
// execution de la requete
$requete->execute(["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"],"inscrit_rdc"=>$_POST["inscrit_rdc"],"enfant_charge"=>$_POST["enfant_charge"]]);
$requete = null;

$last_id = $mysqlConnection->lastInsertId();
$id_rdc = $last_id;


    

if($choix_rdc == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO rdc(id_rdc,numero,centre) VALUES (:id_rdc,:numero,:centre)");
    // execution de la requete
    $requete->execute(["id_rdc"=>$id_rdc,"numero"=>$_POST["numero"],"centre"=>$_POST["centre"]]);
    $requete = null;
}
else{
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO rdc(id_rdc,dte_realisation_rdc) VALUES (:id_rdc,:dte_realisation_rdc)");
    // execution de la requete
    $requete->execute(["id_rdc"=>$id_rdc,"dte_realisation_rdc"=>$_POST["dte_realisation_rdc"]]);
    $requete = null;
}
/*
////    ACCOMPAGNATEURS    ////
$accompagnateur = $_POST['accompagnateur'];
// ordre de mission
$requete = $mysqlConnection->prepare("INSERT INTO inscrit(fk_id_accompagnateur) VALUES (:id_rdc) INNER JOIN accompagnateur ON inscrit.fk_id_accompagnateur = accompagnateur.id_accompagnateur");
// execution de la requete
$requete->execute(["fk_id_accompagnateur"=>$id_rdc]);
$requete = null; */


if($choix_enfant == "oui"){
    $nombreEnfant = isset($_POST['nb_enfant']) ? intval($_POST['nb_enfant']) : 0;
    for ($i = 1; $i <= $nombreEnfant; $i++) {
        // Récupération des données postées pour chaque enfant
        $dte_naissance_enfant = $_POST["dte_naissance" . $i];
        $nom_enfant = $_POST["nom_enfant" . $i];
        // Préparation de la requête
        $requete = $mysqlConnection->prepare("INSERT INTO enfant(id_enfant, dte_naissance_enfant, nom_enfant) VALUES (:id_enfant, :dte_naissance_enfant, :nom_enfant)");

        

        // Assignation des valeurs pour l'insertion
        $requete->bindValue(':id_enfant', $id_enfant);
        $requete->bindValue(':dte_naissance_enfant', $dte_naissance_enfant);
        $requete->bindValue(':nom_enfant', $nom_enfant);

        // Exécution de la requête
        $requete->execute();
    }
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO enfant(id_enfant,dte_naissance_enfant,nom_enfant) VALUES (:id_enfant,:dte_naissance_enfant,:nom_enfant)");
    // execution de la requete
    $requete->execute(["id_enfant"=>$id_enfant,"dte_naissance_enfant"=>$_POST["dte_naissance_enfant"],"nom_enfant"=>$_POST["nom_enfant"]]);
    $requete = null;

    
}







$_SESSION["success"]="Première page du formulaire complétée";
$mysqlConnection = null;
header("location:index.php?route=creer2");
?>