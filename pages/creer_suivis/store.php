<?php
if (isset($_POST["dte_contact"])==false || empty($_POST["dte_contact"]) || isset($_POST["origine_contact"])==false || empty($_POST["origine_contact"])
|| isset($_POST["inscrit_rdc"])==false || empty($_POST["inscrit_rdc"]) || isset($_POST["civilite"])==false || empty($_POST["civilite"])
|| isset($_POST["nom"])==false || empty($_POST["nom"]) || isset($_POST["prenom"])==false || empty($_POST["prenom"])
|| isset($_POST["dte_naissance"])==false || empty($_POST["dte_naissance"]) || isset($_POST["nationalite"])==false || empty($_POST["nationalite"])
|| isset($_POST["adresse"])==false || empty($_POST["adresse"]) || isset($_POST["code_postal"])==false || empty($_POST["code_postal"])
|| isset($_POST["ville"])==false || empty($_POST["ville"]) || isset($_POST["telephone"])==false || empty($_POST["telephone"])
|| isset($_POST["email"])==false || empty($_POST["email"]) || isset($_POST["situation_perso"])==false || empty($_POST["situation_perso"])
|| isset($_POST["nature_revenus"])==false || empty($_POST["nature_revenus"]) || isset($_POST["inscrit_pole_emploi"])==false || empty($_POST["inscrit_pole_emploi"])
|| isset($_POST["inscrit_mission_local"])==false || empty($_POST["inscrit_mission_local"]) || isset($_POST["inscrit_cap_emploi"])==false || empty($_POST["inscrit_cap_emploi"])
|| isset($_POST["benevole_rdc"])==false || empty($_POST["benevole_rdc"]) || isset($_POST["vehicule_dispo"])==false || empty($_POST["vehicule_dispo"])
|| isset($_POST["inscrit_soelis"])==false || empty($_POST["inscrit_soelis"]) || isset($_POST["inscrit_cma"])==false || empty($_POST["inscrit_cma"])
|| isset($_POST["cv_oui_non"])==false || empty($_POST["cv_oui_non"]) || isset($_POST["atelier_fr"])==false || empty($_POST["atelier_fr"])
|| isset($_POST["reprise"])==false || empty($_POST["reprise"]) || isset($_POST["reprise"])==false || empty($_POST["reprise"]))
{
    $_SESSION["error"]="Tout les champs sont obligatoires";
    header("location:index.php?route=creer_suivis");
}
else
{
    // création de le lien entre serv web et serv bd
        $mysqlConnection = new PDO(
            'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    }

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
    $inscrit_cma = $_POST['inscrit_cma'];
    $benevole_rdc = $_POST['benevole_rdc'];
    $cv_oui_non = $_POST['cv_oui_non'];
    $achat_prevu = $_POST['achat_prevu'];
    $nom_diplome = $_POST['nom_diplome'];
    $reconversion = $_POST['reconversion'];
    $reprise = $_POST['reprise'];
    $form_pro = $_POST['form_pro'];
    $form_type = $_POST['form_type'];

    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO inscrit(dte_contact,origine_contact,inscrit_rdc,enfant_charge,fk_id_accompagnateur,civilite,
    nom,prenom,dte_naissance,nationalite,adresse,code_postal,ville,telephone,email,situation_perso,nature_revenus,inscrit_pole_emploi,
    inscrit_mission_local,inscrit_cap_emploi,benevole_rdc,vehicule_dispo,inscrit_soelis,inscrit_cma,cv_oui_non,achat_prevu,nom_diplome,atelier_fr,
    emploi_pre_occupe,organisme_contacte,entreprise_contactee,reconversion,reprise,form_pro,metier_souhaite,secteur_activite,secteur_geo,moment_journee,
    permis_voiture)
    VALUES (:dte_contact,:origine_contact,:inscrit_rdc,:enfant_charge,:fk_id_accompagnateur,:civilite,:nom,:prenom,:dte_naissance,:nationalite,:adresse,
    :code_postal,:ville,:telephone,:email,:situation_perso,:nature_revenus,:inscrit_pole_emploi,:inscrit_mission_local,:inscrit_cap_emploi,:benevole_rdc,
    :vehicule_dispo,:inscrit_soelis,:inscrit_cma,:cv_oui_non,:achat_prevu,:nom_diplome,:atelier_fr,:emploi_pre_occupe,:organisme_contacte,:entreprise_contactee,
    :reconversion,:reprise,:form_pro,:metier_souhaite,:secteur_activite,:secteur_geo,:moment_journee,:permis_voiture)");
    // execution de la requete
    $requete->execute(["dte_contact"=>$_POST["dte_contact"],"origine_contact"=>$_POST["origine_contact"],
    "inscrit_rdc"=>$_POST["inscrit_rdc"],"enfant_charge"=>$_POST["enfant_charge"],"fk_id_accompagnateur"=>$accompagnateur,"civilite"=>$_POST["civilite"],
    "nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"dte_naissance"=>$_POST["dte_naissance"],"nationalite"=>$_POST["nationalite"],
    "adresse"=>$_POST["adresse"],"code_postal"=>$_POST["code_postal"],"ville"=>$_POST["ville"],"telephone"=>$_POST["telephone"],
    "email"=>$_POST["email"],"situation_perso"=>$_POST["situation_perso"],"nature_revenus"=>$_POST["nature_revenus"],
    "inscrit_pole_emploi"=>$_POST["inscrit_pole_emploi"],"inscrit_mission_local"=>$_POST["inscrit_mission_local"],"inscrit_cap_emploi"=>$_POST["inscrit_cap_emploi"],
    "benevole_rdc"=>$benevole_rdc,"vehicule_dispo"=>$_POST["vehicule_dispo"],"inscrit_soelis"=>$_POST["inscrit_soelis"],"inscrit_cma"=>$_POST["inscrit_cma"],
    "cv_oui_non"=>$_POST["cv_oui_non"],"achat_prevu"=>$_POST["achat_prevu"],"nom_diplome"=>$_POST["nom_diplome"],"atelier_fr"=>$_POST["atelier_fr"],
    "emploi_pre_occupe"=>$_POST["emploi_pre_occupe"],"organisme_contacte"=>$_POST["organisme_contacte"],"entreprise_contactee"=>$_POST["entreprise_contactee"],
    "reconversion"=>$_POST["reconversion"],"reprise"=>$_POST["reprise"],"form_pro"=>$_POST["form_pro"],"metier_souhaite"=>$_POST["metier_souhaite"],
    "secteur_activite"=>$_POST["secteur_activite"],"secteur_geo"=>$_POST["secteur_geo"],"moment_journee"=>$_POST["moment_journee"],
    "permis_voiture"=>$_POST["permis_voiture"]]);
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
        $requete = $mysqlConnection->prepare("INSERT INTO soelis(id_soelis,dte_inscription_soelis,nom_referent_soelis) VALUES (:id_soelis,:dte_inscription_soelis,:nom_referent_soelis)");
        // execution de la requete
        $requete->execute(["id_soelis"=>$id_rdc,"dte_inscription_soelis"=>$_POST["dte_inscription_soelis"],"nom_referent_soelis"=>$_POST["nom_referent_soelis"]]);
        $requete = null;
    }
    else{
        // ordre de mission
        $requete = $mysqlConnection->prepare("INSERT INTO soelis(id_soelis,dte_realisation_soelis) VALUES (:id_soelis,:dte_realisation_soelis)");
        // execution de la requete
        $requete->execute(["id_soelis"=>$id_rdc,"dte_realisation_soelis"=>$_POST["dte_realisation_soelis"]]);
        $requete = null;
    }

    /* CMA */
    if($inscrit_cma == "oui"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("INSERT INTO cma(id_cma,dte_inscription_cma,nom_referent_cma) VALUES (:id_cma,:dte_inscription_cma,:nom_referent_cma)");
        // execution de la requete
        $requete->execute(["id_cma"=>$id_rdc,"dte_inscription_cma"=>$_POST["dte_inscription_cma"],"nom_referent_cma"=>$_POST["nom_referent_cma"]]);
        $requete = null;
    }
    else{
        // ordre de mission
        $requete = $mysqlConnection->prepare("INSERT INTO cma(id_cma,dte_realisation_cma) VALUES (:id_cma,:dte_realisation_cma)");
        // execution de la requete
        $requete->execute(["id_cma"=>$id_rdc,"dte_realisation_cma"=>$_POST["dte_realisation_cma"]]);
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

    /* CV */
    if($cv_oui_non == "oui"){
        // ordre de mission
        if(!empty($_FILES)) {
            $file_name = $_FILES['pdfFile']['name'];
            $file_tmp_name = $_FILES['pdfFile']['tmp_name'];
            $file_dest = 'pages/creer_suivis/pdf/'.$file_name;
            $file_type = $_FILES['pdfFile']['type'];
            $file_extension = strrchr($file_name, ".");
    
            $extensions_autorisees = array('.pdf', '.PDF');
    
            if(in_array($file_extension, $extensions_autorisees)) {
                if(move_uploaded_file($file_tmp_name, $file_dest)) {
                    $requete = $mysqlConnection->prepare("INSERT INTO files(id_files, names, file_url) VALUES (:id_files, :names, :file_url)");
                    $requete->execute(["id_files" => $id_rdc, "names" => $file_name, "file_url" => $file_dest]);
                    $requete = null;
                    

                    
    
    
                    echo 'Fichier envoyé';
                }
            }
        }
        $requete = $mysqlConnection->prepare("INSERT INTO cv(id_cv) VALUES (:id_cv)");
        // execution de la requete
        $requete->execute(["id_cv"=>$id_rdc]);
        $requete = null;
    }
    else {
        // ordre de mission
        $requete = $mysqlConnection->prepare("INSERT INTO cv(id_cv,dte_travailler_cv) VALUES (:id_cv,:dte_travailler_cv)");
        // execution de la requete
        $requete->execute(["id_cv"=>$id_rdc,"dte_travailler_cv"=>$_POST["dte_travailler_cv"]]);
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

    ////    FORMATION    ////
    if($nom_diplome =="aucun"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET nb_annee_scolarisation = :nb_annee_scolarisation, niveau_diplome = :niveau_diplome WHERE id_inscrit = '$id_rdc'");
        // execution de la requete
        $requete->execute(["nb_annee_scolarisation"=>$_POST["nb_annee_scolarisation"],"niveau_diplome"=>$_POST["niveau_diplome"]]);
        $requete = null;
    }
    else{
        if($nom_diplome =="cap"){
            // ordre de mission
            $requete = $mysqlConnection->prepare("UPDATE inscrit SET cap_metier = :cap_metier WHERE id_inscrit = '$id_rdc'");
            // execution de la requete
            $requete->execute(["cap_metier"=>$_POST["cap_metier"]]);
            $requete = null;
        }
        else{
            if($nom_diplome =="autre"){
                // ordre de mission
                $requete = $mysqlConnection->prepare("UPDATE inscrit SET nom_diplome_autre = :nom_diplome_autre WHERE id_inscrit = '$id_rdc'");
                // execution de la requete
                $requete->execute(["nom_diplome_autre"=>$_POST["nom_diplome_autre"]]);
                $requete = null;
            }
            else{
                if($nom_diplome =="formation_continue"){
                // ordre de mission
                $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_continue = :form_continue WHERE id_inscrit = '$id_rdc'");
                // execution de la requete
                $requete->execute(["form_continue"=>$_POST["form_continue"]]);
                $requete = null;
                }
            }
        }
    }

    ////    NIVEAUX FRANCAIS    ////
    // ordre de mission
    $requete = $mysqlConnection->prepare("INSERT INTO langue_francaise(id_langue_francaise,langue_fr_parlee,langue_fr_lue,langue_fr_ecrite) VALUES (:id_langue_francaise,:langue_fr_parlee,:langue_fr_lue,:langue_fr_ecrite)");
    // execution de la requete
    $requete->execute(["id_langue_francaise"=>$id_rdc,"langue_fr_parlee"=>$_POST["langue_fr_parlee"],"langue_fr_lue"=>$_POST["langue_fr_lue"],"langue_fr_ecrite"=>$_POST["langue_fr_ecrite"]]);
    $requete = null;

    ////    RECONVERSION PRO    ////
    if($reconversion =="oui"){
        $form_prevue = $_POST['form_prevue'];
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_prevue = :form_prevue WHERE id_inscrit = '$id_rdc'");
        // execution de la requete
        $requete->execute(["form_prevue"=>$form_prevue]);
        $requete = null;
        if($form_prevue = "oui"){
            // ordre de mission
            $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_nom = :form_nom, form_date = :form_date, form_duree = :form_duree WHERE id_inscrit = '$id_rdc'");
            // execution de la requete
            $requete->execute(["form_nom"=>$_POST["form_nom"],"form_date"=>$_POST["form_date"],"form_duree"=>$_POST["form_duree"]]);
            $requete = null;
        }
    }

    ////    REPRISE ETUDES    ////
    if($reprise =="oui"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET nom_etudes = :nom_etudes WHERE id_inscrit = '$id_rdc'");
        // execution de la requete
        $requete->execute(["nom_etudes"=>$_POST["nom_etudes"]]);
        $requete = null;
    }


    ////    FORMATION PRO    //// 
    if($form_pro =="oui"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_type = :form_type WHERE id_inscrit = '$id_rdc'");
        // execution de la requete
        $requete->execute(["form_type"=>$_POST["form_type"]]);
        $requete = null;
        if($form_type == "qualifiante"){
            $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_qual = :form_qual WHERE id_inscrit = '$id_rdc'");
            // execution de la requete
            $requete->execute(["form_qual"=>$_POST["form_qual"]]);
            $requete = null;
        }
        else{
            if($form_type == "diplomante"){
                $requete = $mysqlConnection->prepare("UPDATE inscrit SET form_dipl = :form_dipl WHERE id_inscrit = '$id_rdc'");
                // execution de la requete
                $requete->execute(["form_dipl"=>$_POST["form_dipl"]]);
                $requete = null;
            }
        }
    }

    // Préparation de la requête
    $requete = $mysqlConnection->prepare("UPDATE inscrit SET fk_id_rdc = :fk_id_rdc, fk_id_pole_emploi = :fk_id_pole_emploi, fk_id_mission_locale = :fk_id_mission_locale, fk_id_cap_emploi = :fk_id_cap_emploi, fk_id_cv = :fk_id_cv, fk_id_soelis = :fk_id_soelis, fk_id_cma = :fk_id_cma, fk_id_langue_francaise = :fk_id_langue_francaise, fk_id_files = :fk_id_files WHERE id_inscrit = '$id_rdc'");
    $requete->execute(["fk_id_rdc"=>$id_rdc,"fk_id_pole_emploi"=>$id_rdc,"fk_id_mission_locale"=>$id_rdc,"fk_id_cap_emploi"=>$id_rdc,"fk_id_cv"=>$id_rdc,"fk_id_soelis"=>$id_rdc,"fk_id_cma"=>$id_rdc,"fk_id_langue_francaise"=>$id_rdc,"fk_id_files"=>$id_rdc]);
    $requete = null;


    $_SESSION["success"]="Formulaire complété";


    header("location:index.php?route=list_suivis");

?>