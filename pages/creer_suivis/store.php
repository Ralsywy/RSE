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
$accompagnateur = $_POST['accompagnateur'];
$civilite = $_POST['civilite'];
$nature_revenus = $_POST['nature_revenus'];
$inscrit_pole_emploi = $_POST['inscrit_pole_emploi'];
$inscrit_mission_local = $_POST['inscrit_mission_local'];
$inscrit_cap_emploi = $_POST['inscrit_cap_emploi'];
$inscrit_soelis = $_POST['inscrit_soelis'];

// ordre de mission
$requete = $mysqlConnection->prepare("INSERT INTO inscrit(dte_contact,origine_contact,inscrit_rdc,enfant_charge,fk_id_accompagnateur,civilite,
nom,prenom,dte_naissance,nationalite,adresse,code_postal,ville,telephone,email,situation_perso,nature_revenus,inscrit_pole_emploi,
inscrit_mission_local,inscrit_cap_emploi)
VALUES (:dte_contact,:origine_contact,:inscrit_rdc,:enfant_charge,:fk_id_accompagnateur,:civilite,:nom,:prenom,:dte_naissance,:nationalite,:adresse,
:code_postal,:ville,:telephone,:email,:situation_perso,:nature_revenus,:inscrit_pole_emploi,:inscrit_mission_local,:inscrit_cap_emploi)");
// execution de la requete
$requete->execute(["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"],
"inscrit_rdc"=>$_POST["inscrit_rdc"],"enfant_charge"=>$_POST["enfant_charge"],"fk_id_accompagnateur"=>$accompagnateur,"civilite"=>$_POST["civilite"],
"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"dte_naissance"=>$_POST["dte_naissance"],"nationalite"=>$_POST["nationalite"],
"adresse"=>$_POST["adresse"],"code_postal"=>$_POST["code_postal"],"ville"=>$_POST["ville"],"telephone"=>$_POST["telephone"],
"email"=>$_POST["email"],"situation_perso"=>$_POST["situation_perso"],"nature_revenus"=>$_POST["nature_revenus"],
"inscrit_pole_emploi"=>$_POST["inscrit_pole_emploi"],"inscrit_mission_local"=>$_POST["inscrit_mission_local"],"inscrit_cap_emploi"=>$_POST["inscrit_cap_emploi"]]);
$requete = null;

$last_id = $mysqlConnection->lastInsertId();
$id_rdc = $last_id;


    
/* RESTOS DU COEUR */
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


/* ENFANTS */
if($choix_enfant == "oui"){
    $nombreEnfant = isset($_POST['nb_enfant']) ? intval($_POST['nb_enfant']) : 0;
    for ($i = 1; $i <= $nombreEnfant; $i++) {
        // Récupération des données postées pour chaque enfant
        $dte_naissance_enfant = $_POST["dte_naissance" . $i];
        $nom_enfant = $_POST["nom_enfant" . $i];
        // Préparation de la requête
        $requete = $mysqlConnection->prepare("INSERT INTO enfant(nom_enfant,dte_naissance_enfant,fk_id_inscrit_enfant) VALUES (:nom_enfant,:dte_naissance_enfant,:fk_id_inscrit_enfant)");
        $requete->execute(["nom_enfant"=>$nom_enfant,"dte_naissance_enfant"=>$dte_naissance_enfant,"fk_id_inscrit_enfant"=>$id_rdc]);
        $requete = null;
    }
    // Préparation de la requête
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET nb_enfant = :nb_enfant WHERE id_inscrit = '$id_rdc'");
    $requete->execute(["nb_enfant"=>$_POST["nb_enfant"]]);
    $requete = null;
}
else{
    
}

/* AUTRE REVENUS */
if($nature_revenus == "autre"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET autre_revenus = :autre_revenus WHERE id_inscrit = '$id_rdc'");
    // execution de la requete
    $requete->execute(["autre_revenus"=>$_POST["autre_revenus"]]);
    $requete = null;
}

/* POLE EMPLOI */
if($inscrit_pole_emploi == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO pole_emploi(id_pole_emploi,dte_inscription,nom_referent) VALUES (:id_pole_emploi,:dte_inscription,:nom_referent)");
    // execution de la requete
    $requete->execute(["id_pole_emploi"=>$id_rdc,"dte_inscription"=>$_POST["dte_inscription"],"nom_referent"=>$_POST["nom_referent"]]);
    $requete = null;
}
else{
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO pole_emploi(id_pole_emploi,dte_realisation_pole) VALUES (:id_pole_emploi,:dte_realisation_pole)");
    // execution de la requete
    $requete->execute(["id_pole_emploi"=>$id_rdc,"dte_realisation_pole"=>$_POST["dte_realisation_pole"]]);
    $requete = null;
}

/* SOLEIS */
if($inscrit_soelis == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO soelis(id_soelis,dte_inscription_soelis) VALUES (:id_soelis,:dte_inscription_soelis)");
    // execution de la requete
    $requete->execute(["id_soelis"=>$id_rdc,"dte_inscription_soelis"=>$_POST["dte_inscription_soelis"]]);
    $requete = null;
}
else{
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO pole_emploi(id_pole_emploi,dte_realisation_pole) VALUES (:id_pole_emploi,:dte_realisation_pole)");
    // execution de la requete
    $requete->execute(["id_pole_emploi"=>$id_rdc,"dte_realisation_pole"=>$_POST["dte_realisation_pole"]]);
    $requete = null;
}

/* MISSION LOCALE */
if($inscrit_mission_local == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO mission_locale(id_mission_locale,dte_inscription_mission,nom_referent_mission) VALUES (:id_mission_locale,:dte_inscription_mission,:nom_referent_mission)");
    // execution de la requete
    $requete->execute(["id_mission_locale"=>$id_rdc,"dte_inscription_mission"=>$_POST["dte_inscription_mission"],"nom_referent_mission"=>$_POST["nom_referent_mission"]]);
    $requete = null;
}
else{
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO mission_locale(id_mission_locale,dte_realisation_mission) VALUES (:id_mission_locale,:dte_realisation_mission)");
    // execution de la requete
    $requete->execute(["id_mission_locale"=>$id_rdc,"dte_realisation_mission"=>$_POST["dte_realisation_mission"]]);
    $requete = null;
}

/* CAP */
if($inscrit_cap_emploi == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO cap_emploi(id_cap_emploi,dte_inscription_cap,nom_referent_cap) VALUES (:id_cap_emploi,:dte_inscription_cap,:nom_referent_cap)");
    // execution de la requete
    $requete->execute(["id_cap_emploi"=>$id_rdc,"dte_inscription_cap"=>$_POST["dte_inscription_cap"],"nom_referent_cap"=>$_POST["nom_referent_cap"]]);
    $requete = null;
}
else{
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO cap_emploi(id_cap_emploi,dte_realisation_cap) VALUES (:id_cap_emploi,:dte_realisation_cap)");
    // execution de la requete
    $requete->execute(["id_cap_emploi"=>$id_rdc,"dte_realisation_cap"=>$_POST["dte_realisation_cap"]]);
    $requete = null;
}

/* PERMIS CONDUIRE */
$permis_voiture = $_POST['permis_voiture'];
if($permis_voiture == "motos1"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO permis_conduire(moto,fk_id_inscrit_permis) VALUES (:moto,:fk_id_inscrit_permis)");
    // execution de la requete
    $requete->execute(["moto"=>$_POST["moto"],"fk_id_inscrit_permis"=>$id_rdc]);
    $requete = null;
}
else{
    if($permis_voiture == "auto1"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO permis_conduire(auto,fk_id_inscrit_permis) VALUES (:auto,:fk_id_inscrit_permis)");
    // execution de la requete
    $requete->execute(["auto"=>$_POST["auto"],"fk_id_inscrit_permis"=>$id_rdc]);
    $requete = null;
    }
    else{
        if($permis_voiture == "march1"){
            // ordre de mission
            $requete = $mysqlConnection->prepare("INSERT INTO permis_conduire(marchandise,fk_id_inscrit_permis) VALUES (:marchandise,:fk_id_inscrit_permis)");
            // execution de la requete
            $requete->execute(["marchandise"=>$_POST["marchandise"],"fk_id_inscrit_permis"=>$id_rdc]);
            $requete = null;
        }
    }
}





// upload


$chemin_pdf = $_FILES['pdfFile']['tmp_name'];
$chemin_pdfdef = 'cv/'









$_SESSION["success"]="Première page du formulaire complétée";
$mysqlConnection = null;
header("location:index.php?route=creer2");
?>