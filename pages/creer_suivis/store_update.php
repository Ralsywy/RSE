<?php
// création de le lien entre serv web et serv bd
$mysqlConnection = new PDO(
    'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
    USER,
    PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);
$id = $_GET["id"];

////    SUPPRESSION ANCIENNES INFORMATIONS    ////
// CAP EMPLOI //
$requete = $mysqlConnection->prepare("UPDATE cap_emploi SET dte_inscription_cap = :dte_inscription_cap,nom_referent_cap = :nom_referent_cap,
dte_realisation_cap = :dte_realisation_cap,commentaire_cap=:commentaire_cap
WHERE id_cap_emploi = '$id'");
//execution de la requete
$requete->execute(["dte_inscription_cap"=>NULL,"nom_referent_cap"=>NULL,"dte_realisation_cap"=>NULL,"commentaire_cap"=>NULL]);
$requete = null;

// CMA //
$requete = $mysqlConnection->prepare("UPDATE cma SET dte_inscription_cma = :dte_inscription_cma,nom_referent_cma = :nom_referent_cma,
dte_realisation_cma = :dte_realisation_cma,commentaire_cma=:commentaire_cma
WHERE id_cma = '$id'");
//execution de la requete
$requete->execute(["dte_inscription_cma"=>NULL,"nom_referent_cma"=>NULL,"dte_realisation_cma"=>NULL,"commentaire_cma"=>NULL]);
$requete = null;

// FILES //
$requete = $mysqlConnection->prepare("UPDATE files SET names = :names,file_url = :file_url,
dte_travailler_cv = :dte_travailler_cv
WHERE id_files = '$id'");
//execution de la requete
$requete->execute(["names"=>NULL,"file_url"=>NULL,"dte_travailler_cv"=>NULL]);
$requete = null;

// INSCRIT //
$requete = $mysqlConnection->prepare("UPDATE inscrit SET statut = :statut,dte_contact = :dte_contact,
nb_demarche = :nb_demarche,origine_contact = :origine_contact,inscrit_rdc = :inscrit_rdc,civilite = :civilite,nom = :nom,
prenom = :prenom,dte_naissance = :dte_naissance,nationalite = :nationalite,adresse = :adresse,code_postal = :code_postal,
ville = :ville,telephone = :telephone,email = :email,situation_perso = :situation_perso,enfant_charge = :enfant_charge,nb_enfant = :nb_enfant,
nature_revenus = :nature_revenus,autre_revenus = :autre_revenus,cv_oui_non = :cv_oui_non,
inscrit_pole_emploi = :inscrit_pole_emploi,inscrit_mission_local = :inscrit_mission_local,inscrit_cap_emploi = :inscrit_cap_emploi,
inscrit_soelis = :inscrit_soelis,inscrit_cma = :inscrit_cma,vehicule_dispo = :vehicule_dispo,achat_prevu = :achat_prevu,emploi_pre_occupe = :emploi_pre_occupe,
permis_voiture = :permis_voiture,
reconversion = :reconversion,form_pro = :form_pro,form_type = :form_type,reprise = :reprise,form_prevue = :form_prevue,form_qual = :form_qual,
form_dipl = :form_dipl,metier_souhaite = :metier_souhaite,secteur_activite = :secteur_activite,secteur_geo = :secteur_geo,form_continue = :form_continue,
form_nom = :form_nom,form_date = :form_date,form_duree = :form_duree,moment_journee = :moment_journee,cap_metier = :cap_metier,
benevole_rdc = :benevole_rdc,nom_diplome = :nom_diplome,nb_annee_scolarisation = :nb_annee_scolarisation,niveau_diplome = :niveau_diplome,
atelier_fr = :atelier_fr,nom_etudes = :nom_etudes,nom_diplome_autre = :nom_diplome_autre,info_comp = :info_comp,bep_metier = :bep_metier,
bac_metier = :bac_metier,bac2_metier = :bac2_metier,licence_metier = :licence_metier,master_metier = :master_metier,master2_metier = :master2_metier,
date_vehicule = :date_vehicule,autre_langue = :autre_langue,if_autre = :if_autre
WHERE id_inscrit = '$id'");
//execution de la requete
$requete->execute(["statut"=>NULL,"dte_contact"=>NULL,"nb_demarche"=>NULL,"origine_contact"=>NULL,"inscrit_rdc"=>NULL,"civilite"=>NULL,
"nom"=>NULL,"prenom"=>NULL,"dte_naissance"=>NULL,"nationalite"=>NULL,"adresse"=>NULL,"code_postal"=>NULL,"ville"=>NULL,"telephone"=>NULL,
"email"=>NULL,"situation_perso"=>NULL,"enfant_charge"=>NULL,"nb_enfant"=>NULL,"nature_revenus"=>NULL,"autre_revenus"=>NULL,"cv_oui_non"=>NULL,
"inscrit_pole_emploi"=>NULL,"inscrit_mission_local"=>NULL,"inscrit_cap_emploi"=>NULL,
"inscrit_soelis"=>NULL,"inscrit_cma"=>NULL,"vehicule_dispo"=>NULL,"achat_prevu"=>NULL,"emploi_pre_occupe"=>NULL,"permis_voiture"=>NULL,
"reconversion"=>NULL,"form_pro"=>NULL,"form_type"=>NULL,"reprise"=>NULL,"form_prevue"=>NULL,"form_qual"=>NULL,"form_dipl"=>NULL,"metier_souhaite"=>NULL,
"secteur_activite"=>NULL,"secteur_geo"=>NULL,"form_continue"=>NULL,"form_nom"=>NULL,"form_date"=>NULL,"form_duree"=>NULL,
"moment_journee"=>NULL,"cap_metier"=>NULL,"benevole_rdc"=>NULL,"nom_diplome"=>NULL,"nb_annee_scolarisation"=>NULL,"niveau_diplome"=>NULL,
"atelier_fr"=>NULL,"nom_etudes"=>NULL,"nom_diplome_autre"=>NULL,"info_comp"=>NULL,"bep_metier"=>NULL,"bac_metier"=>NULL,"bac2_metier"=>NULL,
"licence_metier"=>NULL,"master_metier"=>NULL,"master2_metier"=>NULL,"date_vehicule"=>NULL,"autre_langue"=>NULL,"if_autre"=>NULL]);
$requete = null;

// LANGUE ANGLAISE //
$requete = $mysqlConnection->prepare("UPDATE langue_anglaise SET langue_en_parlee = :langue_en_parlee,langue_en_ecrite = :langue_en_ecrite,
langue_en_lue = :langue_en_lue
WHERE id_langue_anglaise = '$id'");
//execution de la requete
$requete->execute(["langue_en_parlee"=>NULL,"langue_en_ecrite"=>NULL,"langue_en_lue"=>NULL]);
$requete = null;

// LANGUE FRANCAISE //
$requete = $mysqlConnection->prepare("UPDATE langue_francaise SET langue_fr_parlee = :langue_fr_parlee,langue_fr_ecrite = :langue_fr_ecrite,
langue_fr_lue = :langue_fr_lue
WHERE id_langue_francaise = '$id'");
//execution de la requete
$requete->execute(["langue_fr_parlee"=>NULL,"langue_fr_ecrite"=>NULL,"langue_fr_lue"=>NULL]);
$requete = null;

// MISSION LOCALE //
$requete = $mysqlConnection->prepare("UPDATE mission_locale SET dte_inscription_mission = :dte_inscription_mission,nom_referent_mission = :nom_referent_mission,
dte_realisation_mission = :dte_realisation_mission,commentaire_mission=:commentaire_mission
WHERE id_mission_locale = '$id'");
//execution de la requete
$requete->execute(["dte_inscription_mission"=>NULL,"nom_referent_mission"=>NULL,"dte_realisation_mission"=>NULL,"commentaire_mission"=>NULL]);
$requete = null;

// PERMIS //
$requete = $mysqlConnection->prepare("UPDATE permis_conduire SET moto = :moto,auto = :auto,
transport = :transport
WHERE fk_id_inscrit_permis = '$id'");
//execution de la requete
$requete->execute(["moto"=>NULL,"auto"=>NULL,"transport"=>NULL]);
$requete = null;

// POLE EMPLOI //
$requete = $mysqlConnection->prepare("UPDATE pole_emploi SET dte_inscription = :dte_inscription,nom_referent = :nom_referent,
dte_realisation_pole = :dte_realisation_pole,commentaire_pole=:commentaire_pole
WHERE id_pole_emploi = '$id'");
//execution de la requete
$requete->execute(["dte_inscription"=>NULL,"nom_referent"=>NULL,"dte_realisation_pole"=>NULL,"commentaire_pole"=>NULL]);
$requete = null;

// RDC //
$requete = $mysqlConnection->prepare("UPDATE rdc SET numero = :numero,centre = :centre,
commentaire_inscrit = :commentaire_inscrit,jour=:jour,dte_realisation_rdc=:dte_realisation_rdc
WHERE id_rdc = '$id'");
//execution de la requete
$requete->execute(["numero"=>NULL,"centre"=>NULL,"commentaire_inscrit"=>NULL,"jour"=>NULL,"dte_realisation_rdc"=>NULL]);
$requete = null;

// POLE EMPLOI //
$requete = $mysqlConnection->prepare("UPDATE soelis SET dte_inscription_soelis = :dte_inscription_soelis,nom_referent_soelis = :nom_referent_soelis,
dte_realisation_soelis = :dte_realisation_soelis,commentaire_soelis=:commentaire_soelis
WHERE id_soelis = '$id'");
//execution de la requete
$requete->execute(["dte_inscription_soelis"=>NULL,"nom_referent_soelis"=>NULL,"dte_realisation_soelis"=>NULL,"commentaire_soelis"=>NULL]);
$requete = null;




$mysqlConnection = null;
?>