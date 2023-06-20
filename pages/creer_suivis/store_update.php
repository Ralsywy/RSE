<?php
// création de le lien entre serv web et serv bd
$mysqlConnection = new PDO(
    'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
    USER,
    PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

$id = $_GET["id"];
$choix_rdc = $_POST['inscrit_rdc'];
$accompagnateur = $_POST['accompagnateur'];
$civilite = $_POST['civilite'];
$nature_revenus = $_POST['nature_revenus'];
$inscrit_pole_emploi = $_POST['inscrit_pole_emploi'];
$inscrit_mission_local = $_POST['inscrit_mission_local'];
$inscrit_cap_emploi = $_POST['inscrit_cap_emploi'];
$inscrit_soelis = $_POST['inscrit_soelis'];
$inscrit_cma = $_POST['inscrit_cma'];
$benevole_rdc = $_POST['benevole_rdc'];
$cv_oui_non = $_POST['cv_oui_non'];
$achat_prevu = $_POST['achat_prevu'];
$nom_diplome = $_POST['nom_diplome'];
$reconversion = $_POST['reconversion'];
$reprise = $_POST['reprise'];
$form_pro = $_POST['form_pro'];
$form_type = $_POST['form_type'];
$if_autre = $_POST['if_autre'];
$permis_voiture = $_POST['permis_voiture'];

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

// ordre de mission
$requete = $mysqlConnection->prepare('SELECT * FROM files WHERE id_files=:id');
//execution de la requete
$requete->execute(["id"=>$_GET["id"]]);
$files = $requete->fetchAll();
$requete = null;

// FILES //
$requete = $mysqlConnection->prepare("UPDATE files SET names = :names,file_url = :file_url,
dte_travailler_cv = :dte_travailler_cv
WHERE id_files = '$id'");
//execution de la requete
$requete->execute(["names"=>NULL,"file_url"=>NULL,"dte_travailler_cv"=>NULL]);
$requete = null;


// INSCRIT //
$requete = $mysqlConnection->prepare("UPDATE inscrit SET dte_contact = :dte_contact,
origine_contact = :origine_contact,inscrit_rdc = :inscrit_rdc,civilite = :civilite,nom = :nom,
prenom = :prenom,dte_naissance = :dte_naissance,adresse = :adresse,code_postal = :code_postal,
ville = :ville,telephone = :telephone,email = :email,situation_perso = :situation_perso,
nature_revenus = :nature_revenus,autre_revenus = :autre_revenus,cv_oui_non = :cv_oui_non,
inscrit_pole_emploi = :inscrit_pole_emploi,inscrit_mission_local = :inscrit_mission_local,inscrit_cap_emploi = :inscrit_cap_emploi,
inscrit_soelis = :inscrit_soelis,inscrit_cma = :inscrit_cma,vehicule_dispo = :vehicule_dispo,achat_prevu = :achat_prevu,emploi_pre_occupe = :emploi_pre_occupe,
permis_voiture = :permis_voiture,
reconversion = :reconversion,form_pro = :form_pro,form_type = :form_type,reprise = :reprise,form_prevue = :form_prevue,form_qual = :form_qual,
form_dipl = :form_dipl,metier_souhaite = :metier_souhaite,secteur_activite = :secteur_activite,secteur_geo = :secteur_geo,form_continue = :form_continue,
form_nom = :form_nom,form_date = :form_date,form_duree = :form_duree,moment_journee = :moment_journee,cap_metier = :cap_metier,
benevole_rdc = :benevole_rdc,nom_diplome = :nom_diplome,nb_annee_scolarisation = :nb_annee_scolarisation,niveau_diplome = :niveau_diplome,
atelier_fr = :atelier_fr,nom_etudes = :nom_etudes,nom_diplome_autre = :nom_diplome_autre,bep_metier = :bep_metier,
bac_metier = :bac_metier,bac2_metier = :bac2_metier,licence_metier = :licence_metier,master_metier = :master_metier,master2_metier = :master2_metier,
date_vehicule = :date_vehicule,autre_langue = :autre_langue,if_autre = :if_autre
WHERE id_inscrit = '$id'");
//execution de la requete
$requete->execute(["dte_contact"=>NULL,"origine_contact"=>NULL,"inscrit_rdc"=>NULL,"civilite"=>NULL,
"nom"=>NULL,"prenom"=>NULL,"dte_naissance"=>NULL,"adresse"=>NULL,"code_postal"=>NULL,"ville"=>NULL,"telephone"=>NULL,
"email"=>NULL,"situation_perso"=>NULL,"nature_revenus"=>NULL,"autre_revenus"=>NULL,"cv_oui_non"=>NULL,
"inscrit_pole_emploi"=>NULL,"inscrit_mission_local"=>NULL,"inscrit_cap_emploi"=>NULL,
"inscrit_soelis"=>NULL,"inscrit_cma"=>NULL,"vehicule_dispo"=>NULL,"achat_prevu"=>NULL,"emploi_pre_occupe"=>NULL,"permis_voiture"=>NULL,
"reconversion"=>NULL,"form_pro"=>NULL,"form_type"=>NULL,"reprise"=>NULL,"form_prevue"=>NULL,"form_qual"=>NULL,"form_dipl"=>NULL,"metier_souhaite"=>NULL,
"secteur_activite"=>NULL,"secteur_geo"=>NULL,"form_continue"=>NULL,"form_nom"=>NULL,"form_date"=>NULL,"form_duree"=>NULL,
"moment_journee"=>NULL,"cap_metier"=>NULL,"benevole_rdc"=>NULL,"nom_diplome"=>NULL,"nb_annee_scolarisation"=>NULL,"niveau_diplome"=>NULL,
"atelier_fr"=>NULL,"nom_etudes"=>NULL,"nom_diplome_autre"=>NULL,"bep_metier"=>NULL,"bac_metier"=>NULL,"bac2_metier"=>NULL,
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
transport = :transport,autre_permis = :autre_permis
WHERE fk_id_inscrit_permis = '$id'");
//execution de la requete
$requete->execute(["moto"=>NULL,"auto"=>NULL,"transport"=>NULL,"autre_permis"=>NULL]);
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

////    FIN SUPPRESSION DES INFORMATIONS    ////




// CAP EMPLOI //
if($inscrit_cap_emploi=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE cap_emploi SET dte_inscription_cap = :dte_inscription_cap, nom_referent_cap=:nom_referent_cap WHERE id_cap_emploi = '$id'");
    // execution de la requete
    $requete->execute(["dte_inscription_cap"=>$_POST["dte_inscription_cap"],"nom_referent_cap"=>$_POST["nom_referent_cap"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE cap_emploi SET dte_realisation_cap = :dte_realisation_cap,commentaire_cap=:commentaire_cap WHERE id_cap_emploi = '$id'");
    // execution de la requete
    $requete->execute(["dte_realisation_cap"=>$_POST["dte_realisation_cap"],"commentaire_cap"=>$_POST["commentaire_cap"]]);
    $requete = null;
}

// CMA //
if($inscrit_cma=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE cma SET dte_inscription_cma = :dte_inscription_cma,nom_referent_cma=:nom_referent_cma WHERE id_cma = '$id'");
    // execution de la requete
    $requete->execute(["dte_inscription_cma"=>$_POST["dte_inscription_cma"],"nom_referent_cma"=>$_POST["nom_referent_cma"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE cma SET dte_realisation_cma = :dte_realisation_cma,commentaire_cma=:commentaire_cma WHERE id_cma = '$id'");
    // execution de la requete
    $requete->execute(["dte_realisation_cma"=>$_POST["dte_realisation_cma"],"commentaire_cma"=>$_POST["commentaire_cma"]]);
    $requete = null;
}
if($cv_oui_non == "oui"){
    // ordre de mission
    if(!empty($_FILES)) {
        $pdfFile = $_POST['pdfFile'];
        $file_name = $_FILES['pdfFile']['name'];
        $file_tmp_name = $_FILES['pdfFile']['tmp_name'];
        $file_dest = 'pages/creer_suivis/pdf/'.$file_name;
        $file_type = $_FILES['pdfFile']['type'];
        $file_extension = strrchr($file_name, ".");

        $extensions_autorisees = array('.pdf', '.PDF');

        if(in_array($file_extension, $extensions_autorisees)) {
            if(move_uploaded_file($file_tmp_name, $file_dest)) {
                $requete = $mysqlConnection->prepare("UPDATE files SET names = :names,file_url=:file_url WHERE id_files = '$id'");
                // execution de la requete
                $requete->execute(["names"=>$file_name,"file_url"=>$file_dest]);
                $requete = null;

                echo 'Fichier envoyé';
            }
        }
    }
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE files SET dte_travailler_cv = :dte_travailler_cv WHERE id_files = '$id'");
    // execution de la requete
    $requete->execute(["dte_travailler_cv"=>$_POST["dte_travailler_cv"]]);
    $requete = null;
}

//// TABLE INSCRIT ////
$requete = $mysqlConnection->prepare("UPDATE inscrit SET dte_contact = :dte_contact,
origine_contact = :origine_contact,inscrit_rdc = :inscrit_rdc,civilite = :civilite,nom = :nom,
prenom = :prenom,dte_naissance = :dte_naissance,adresse = :adresse,code_postal = :code_postal,
ville = :ville,telephone = :telephone,email = :email,situation_perso = :situation_perso,
nature_revenus = :nature_revenus,autre_revenus = :autre_revenus,cv_oui_non = :cv_oui_non,inscrit_pole_emploi = :inscrit_pole_emploi,
inscrit_mission_local = :inscrit_mission_local,inscrit_cap_emploi = :inscrit_cap_emploi,inscrit_soelis = :inscrit_soelis,
inscrit_cma = :inscrit_cma,vehicule_dispo = :vehicule_dispo,achat_prevu = :achat_prevu,emploi_pre_occupe = :emploi_pre_occupe,
permis_voiture = :permis_voiture,reconversion = :reconversion,form_pro = :form_pro,reprise = :reprise,
form_prevue = :form_prevue,metier_souhaite = :metier_souhaite,
secteur_activite = :secteur_activite,secteur_geo = :secteur_geo,
moment_journee = :moment_journee,
benevole_rdc = :benevole_rdc,nom_diplome = :nom_diplome,
atelier_fr = :atelier_fr,
autre_langue = :autre_langue,if_autre = :if_autre
WHERE id_inscrit = '$id'");
//execution de la requete
$requete->execute(["dte_contact"=>$_POST["dte_contact"],
"origine_contact"=>$_POST["origine_contact"],"inscrit_rdc"=>$_POST["inscrit_rdc"],"civilite"=>$_POST["civilite"],"nom"=>$_POST["nom"],
"prenom"=>$_POST["prenom"],"dte_naissance"=>$_POST["dte_naissance"],"adresse"=>$_POST["adresse"],
"code_postal"=>$_POST["code_postal"],"ville"=>$_POST["ville"],"telephone"=>$_POST["telephone"],"email"=>$_POST["email"],
"situation_perso"=>$_POST["situation_perso"],
"nature_revenus"=>$_POST["nature_revenus"],"autre_revenus"=>$_POST["autre_revenus"],"cv_oui_non"=>$_POST["cv_oui_non"],
"inscrit_pole_emploi"=>$_POST["inscrit_pole_emploi"],"inscrit_mission_local"=>$_POST["inscrit_mission_local"],
"inscrit_cap_emploi"=>$_POST["inscrit_cap_emploi"],"inscrit_soelis"=>$_POST["inscrit_soelis"],"inscrit_cma"=>$_POST["inscrit_cma"],
"vehicule_dispo"=>$_POST["vehicule_dispo"],"achat_prevu"=>$_POST["achat_prevu"],"emploi_pre_occupe"=>$_POST["emploi_pre_occupe"],
"permis_voiture"=>$_POST["permis_voiture"],"reconversion"=>$_POST["reconversion"],"form_pro"=>$_POST["form_pro"],
"reprise"=>$_POST["reprise"],"form_prevue"=>$_POST["form_prevue"],
"metier_souhaite"=>$_POST["metier_souhaite"],"secteur_activite"=>$_POST["secteur_activite"],"secteur_geo"=>$_POST["secteur_geo"],
"moment_journee"=>$_POST["moment_journee"],"benevole_rdc"=>$_POST["benevole_rdc"],
"nom_diplome"=>$_POST["nom_diplome"],
"atelier_fr"=>$_POST["atelier_fr"],
"autre_langue"=>$_POST["autre_langue"],"if_autre"=>$_POST["if_autre"]]);
$requete = null;

////    FORMATION PRO    //// 
if($form_pro =="oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_type = :form_type WHERE id_inscrit = '$id'");
    // execution de la requete
    $requete->execute(["form_type"=>$_POST["form_type"]]);
    $requete = null;
    if($form_type == "qualifiante"){
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_qual = :form_qual WHERE id_inscrit = '$id'");
        // execution de la requete
        $requete->execute(["form_qual"=>$_POST["form_qual"]]);
        $requete = null;
    }
    else{
        if($form_type == "diplomante"){
            $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_dipl = :form_dipl WHERE id_inscrit = '$id'");
            // execution de la requete
            $requete->execute(["form_dipl"=>$_POST["form_dipl"]]);
            $requete = null;
        }
    }
}

//// FORMATION PREVUE ////
if($reconversion =="oui"){
    $form_prevue = $_POST['form_prevue'];
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_prevue = :form_prevue WHERE id_inscrit = '$id'");
    // execution de la requete
    $requete->execute(["form_prevue"=>$form_prevue]);
    $requete = null;
    if($form_prevue = "oui"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_nom = :form_nom, form_date = :form_date, form_duree = :form_duree WHERE id_inscrit = '$id'");
        // execution de la requete
        $requete->execute(["form_nom"=>$_POST["form_nom"],"form_date"=>$_POST["form_date"],"form_duree"=>$_POST["form_duree"]]);
        $requete = null;
    }
}

////    REPRISE ETUDES    ////
if($reprise =="oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET nom_etudes = :nom_etudes WHERE id_inscrit = '$id'");
    // execution de la requete
    $requete->execute(["nom_etudes"=>$_POST["nom_etudes"]]);
    $requete = null;
}


// DIPLOME //
if($nom_diplome == "aucun")
{
$requete = $mysqlConnection->prepare("UPDATE inscrit SET nb_annee_scolarisation = :nb_annee_scolarisation,niveau_diplome=:niveau_diplome
WHERE id_inscrit = '$id'");
//execution de la requete
$requete->execute(["nb_annee_scolarisation"=>$_POST["nb_annee_scolarisation"],"niveau_diplome"=>$_POST["niveau_diplome"]]);
$requete = null;
}
else{
    if($nom_diplome == "cap"){
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET cap_metier = :cap_metier WHERE id_inscrit = '$id'");
        //execution de la requete
        $requete->execute(["cap_metier"=>$_POST["cap_metier"]]);
        $requete = null;
    }
    else{
        if($nom_diplome == "bep"){
            $requete = $mysqlConnection->prepare("UPDATE inscrit SET bep_metier = :bep_metier WHERE id_inscrit = '$id'");
            //execution de la requete
            $requete->execute(["bep_metier"=>$_POST["bep_metier"]]);
            $requete = null;
        }
        else{
            if($nom_diplome == "bac"){
                $requete = $mysqlConnection->prepare("UPDATE inscrit SET bac_metier = :bac_metier WHERE id_inscrit = '$id'");
                //execution de la requete
                $requete->execute(["bac_metier"=>$_POST["bac_metier"]]);
                $requete = null;
            }
            else{
                if($nom_diplome == "bac+2"){
                    $requete = $mysqlConnection->prepare("UPDATE inscrit SET bac2_metier = :bac2_metier WHERE id_inscrit = '$id'");
                    //execution de la requete
                    $requete->execute(["bac2_metier"=>$_POST["bac2_metier"]]);
                    $requete = null;
                }
                else{
                    if($nom_diplome == "licence"){
                        $requete = $mysqlConnection->prepare("UPDATE inscrit SET licence_metier = :licence_metier WHERE id_inscrit = '$id'");
                        //execution de la requete
                        $requete->execute(["licence_metier"=>$_POST["licence_metier"]]);
                        $requete = null;
                    }
                    else{
                        if($nom_diplome == "master"){
                            $requete = $mysqlConnection->prepare("UPDATE inscrit SET master_metier = :master_metier WHERE id_inscrit = '$id'");
                            //execution de la requete
                            $requete->execute(["master_metier"=>$_POST["master_metier"]]);
                            $requete = null;
                        }
                        else{
                            if($nom_diplome == "master2"){
                                $requete = $mysqlConnection->prepare("UPDATE inscrit SET master2_metier = :master2_metier WHERE id_inscrit = '$id'");
                                //execution de la requete
                                $requete->execute(["master2_metier"=>$_POST["master2_metier"]]);
                                $requete = null;
                            }
                            else{
                                if($nom_diplome == "autre"){
                                    $requete = $mysqlConnection->prepare("UPDATE inscrit SET nom_diplome_autre = :nom_diplome_autre WHERE id_inscrit = '$id'");
                                    //execution de la requete
                                    $requete->execute(["nom_diplome_autre"=>$_POST["nom_diplome_autre"]]);
                                    $requete = null;
                                }
                                else{
                                    if($nom_diplome == "formation_continue"){
                                        $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_continue = :form_continue WHERE id_inscrit = '$id'");
                                        //execution de la requete
                                        $requete->execute(["form_continue"=>$_POST["form_continue"]]);
                                        $requete = null;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}


// LANGUE EN //
// ordre de mission
$requete = $mysqlConnection->prepare("UPDATE langue_anglaise SET langue_en_parlee = :langue_en_parlee,langue_en_ecrite=:langue_en_ecrite,
langue_en_lue=:langue_en_lue WHERE id_langue_anglaise = '$id'");
// execution de la requete
$requete->execute(["langue_en_parlee"=>$_POST["langue_en_parlee"],"langue_en_ecrite"=>$_POST["langue_en_ecrite"],
"langue_en_lue"=>$_POST["langue_en_lue"]]);
$requete = null;

// LANGUE FR //
// ordre de mission
$requete = $mysqlConnection->prepare("UPDATE langue_francaise SET langue_fr_parlee = :langue_fr_parlee,langue_fr_lue=:langue_fr_lue,
langue_fr_ecrite=:langue_fr_ecrite WHERE id_langue_francaise = '$id'");
// execution de la requete
$requete->execute(["langue_fr_parlee"=>$_POST["langue_fr_parlee"],"langue_fr_lue"=>$_POST["langue_fr_lue"],
"langue_fr_ecrite"=>$_POST["langue_fr_ecrite"]]);
$requete = null;

// mission locale //
if($inscrit_mission_local=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE mission_locale SET dte_inscription_mission = :dte_inscription_mission,nom_referent_mission=:nom_referent_mission WHERE id_mission_locale = '$id'");
    // execution de la requete
    $requete->execute(["dte_inscription_mission"=>$_POST["dte_inscription_mission"],"nom_referent_mission"=>$_POST["nom_referent_mission"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE mission_locale SET dte_realisation_mission = :dte_realisation_mission,commentaire_mission=:commentaire_mission WHERE id_mission_locale = '$id'");
    // execution de la requete
    $requete->execute(["dte_realisation_mission"=>$_POST["dte_realisation_mission"],"commentaire_mission"=>$_POST["commentaire_mission"]]);
    $requete = null;
}

// permis voiture //
if($permis_voiture=="motos1")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE permis_conduire SET moto = :moto,autre_permis = :autre_permis WHERE fk_id_inscrit_permis = '$id'");
    // execution de la requete
    $requete->execute(["moto"=>$_POST["moto"],"autre_permis"=>$_POST["autre_permis"]]);
    $requete = null;
}
else
{
    if($permis_voiture=="auto1")
    {
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE permis_conduire SET auto= :auto,autre_permis = :autre_permis WHERE fk_id_inscrit_permis = '$id'");
        // execution de la requete
        $requete->execute(["auto"=>$_POST["auto"],"autre_permis"=>$_POST["autre_permis"]]);
        $requete = null;
    }
    else{
        if($permis_voiture=="march1"){
            // ordre de mission
            $requete = $mysqlConnection->prepare("UPDATE permis_conduire SET transport = :transport,autre_permis = :autre_permis WHERE fk_id_inscrit_permis = '$id'");
            // execution de la requete
            $requete->execute(["transport"=>$_POST["marchandise"],"autre_permis"=>$_POST["autre_permis"]]);
            $requete = null;
        }
    }
}


// pole emploi //
if($inscrit_pole_emploi=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE pole_emploi SET dte_inscription = :dte_inscription,nom_referent=:nom_referent WHERE id_pole_emploi = '$id'");
    // execution de la requete
    $requete->execute(["dte_inscription"=>$_POST["dte_inscription"],"nom_referent"=>$_POST["nom_referent"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE pole_emploi SET dte_realisation_pole = :dte_realisation_pole,commentaire_pole=:commentaire_pole WHERE id_pole_emploi = '$id'");
    // execution de la requete
    $requete->execute(["dte_realisation_pole"=>$_POST["dte_realisation_pole"],"commentaire_pole"=>$_POST["commentaire_pole"]]);
    $requete = null;
}


// rdc //
if($choix_rdc=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE rdc SET numero = :numero,centre=:centre,jour =:jour WHERE id_rdc = '$id'");
    // execution de la requete
    $requete->execute(["numero"=>$_POST["numero"],"centre"=>$_POST["centre"],"jour"=>$_POST["jour"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE rdc SET commentaire_inscrit = :commentaire_inscrit,dte_realisation_rdc=:dte_realisation_rdc WHERE id_rdc = '$id'");
    // execution de la requete
    $requete->execute(["commentaire_inscrit"=>$_POST["commentaire_inscrit"],"dte_realisation_rdc"=>$_POST["dte_realisation_rdc"]]);
    $requete = null;
}

// soelis //
if($inscrit_soelis=="oui")
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE soelis SET dte_inscription_soelis = :dte_inscription_soelis,nom_referent_soelis=:nom_referent_soelis WHERE id_soelis = '$id'");
    // execution de la requete
    $requete->execute(["dte_inscription_soelis"=>$_POST["dte_inscription_soelis"],"nom_referent_soelis"=>$_POST["nom_referent_soelis"]]);
    $requete = null;
}
else
{
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE soelis SET dte_realisation_soelis = :dte_realisation_soelis,commentaire_soelis=:commentaire_soelis WHERE id_soelis = '$id'");
    // execution de la requete
    $requete->execute(["dte_realisation_soelis"=>$_POST["dte_realisation_soelis"],"commentaire_soelis"=>$_POST["commentaire_soelis"]]);
    $requete = null;
}

if($achat_prevu == "oui"){
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET date_vehicule = :date_vehicule WHERE id_inscrit = '$id'");
    // execution de la requete
    $requete->execute(["date_vehicule"=>$_POST["date_vehicule"]]);
    $requete = null;
}



$mysqlConnection = null;
header("location:index.php?route=affichage&id=".$_GET["id"]);
?>