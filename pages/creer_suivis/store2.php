<?php

if (isset($_POST["info_comp"])==false && empty($_POST["info_comp"]) && isset($_POST["echeance"])==false && empty($_POST["echeance"])){
    $_SESSION["error"]="Remplissez au moins un champs";
    header("location:index.php?route=creer2&id=".$_GET["id"]);
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

    $id = $_GET["id"];
    $type_formation = $_POST["type_formation"];

    ////    INFORMATIONS COMPLEMENTAIRES    ////

    if(isset($_POST["info_comp"])){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET info_comp = :info_comp WHERE id_inscrit = '$id'");
        // execution de la requete
        $requete->execute(["info_comp"=>$_POST["info_comp"]]);
        $requete = null;
    }

    ////     SUPP     //// 
    // ordre de mission
    $requete = $mysqlConnection->prepare("UPDATE resultat SET poste_occupe = :poste_occupe,poste_occupe_cdd = :poste_occupe_cdd,
    duree_hebdo_cdd = :duree_hebdo_cdd,nom_societe_cdd=:nom_societe_cdd,emploi_aide_cdd=:emploi_aide_cdd,type_form_after=:type_form_after,
    nom_form_qual=:nom_form_qual,nom_form_dipl=:nom_form_dipl,nom_stage=:nom_stage,duree_stage=:duree_stage,nom_org_stage=:nom_org_stage,
    abandon=:abandon,non_retour=:non_retour,autre=:autre,duree_form_dipl=:duree_form_dipl,duree_form_qual=:duree_form_qual,duree_hebdo=:duree_hebdo,
    nom_societe=:nom_societe,emploi_aide=:emploi_aide,type_formation=:type_formation,explication=:explication
    WHERE id_resultat = '$id'");
    //execution de la requete
    $requete->execute(["poste_occupe"=>NULL,"poste_occupe_cdd"=>NULL,"duree_hebdo_cdd"=>NULL,"nom_societe_cdd"=>NULL,"emploi_aide_cdd"=>NULL,
    "type_form_after"=>NULL,"nom_form_qual"=>NULL,"nom_form_dipl"=>NULL,"nom_stage"=>NULL,"duree_stage"=>NULL,"nom_org_stage"=>NULL,
    "abandon"=>NULL,"non_retour"=>NULL,"autre"=>NULL,"duree_form_dipl"=>NULL,"duree_form_qual"=>NULL,"duree_hebdo"=>NULL,"nom_societe"=>NULL,
    "emploi_aide"=>NULL,"type_formation"=>NULL,"explication"=>NULL]);
    $requete = null;

    ////    SITUATION PRO APRES   ////
    if($type_formation == "rien"){

    }
    else
    {
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE resultat SET type_formation = :type_formation WHERE id_resultat = '$id'");
        // execution de la requete
        $requete->execute(["type_formation"=>$_POST["type_formation"]]);
        $requete = null;

        if($type_formation == "cdi"){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE resultat SET poste_occupe = :poste_occupe, duree_hebdo = :duree_hebdo, nom_societe = :nom_societe,emploi_aide = :emploi_aide WHERE id_resultat = '$id'");
        // execution de la requete
        $requete->execute(["poste_occupe"=>$_POST["poste_occupe"],"duree_hebdo"=>$_POST["duree_hebdo"],"nom_societe"=>$_POST["nom_societe"],"emploi_aide"=>$_POST["emploi_aide"]]);
        $requete = null;
        }
        else{
            if($type_formation == "cdd"){
                // ordre de mission
                $requete = $mysqlConnection->prepare("UPDATE resultat SET poste_occupe_cdd = :poste_occupe_cdd, duree_hebdo_cdd = :duree_hebdo_cdd, nom_societe_cdd = :nom_societe_cdd,emploi_aide_cdd = :emploi_aide_cdd WHERE id_resultat = '$id'");
                // execution de la requete
                $requete->execute(["poste_occupe_cdd"=>$_POST["poste_occupe_cdd"],"duree_hebdo_cdd"=>$_POST["duree_hebdo_cdd"],"nom_societe_cdd"=>$_POST["nom_societe_cdd"],"emploi_aide_cdd"=>$_POST["emploi_aide_cdd"]]);
                $requete = null;
            }
            else{
                if($type_formation == "formation"){
                    // ordre de mission
                    $requete = $mysqlConnection->prepare("UPDATE resultat SET type_form_after = :type_form_after WHERE id_resultat = '$id'");
                    // execution de la requete
                    $requete->execute(["type_form_after"=>$_POST["type_form_after"]]);
                    $requete = null;
                    $type_form_after = $_POST["type_form_after"];
                    if($type_form_after == "qualifiante1"){
                        // ordre de mission
                        $requete = $mysqlConnection->prepare("UPDATE resultat SET nom_form_qual = :nom_form_qual,duree_form_qual=:duree_form_qual WHERE id_resultat = '$id'");
                        // execution de la requete
                        $requete->execute(["nom_form_qual"=>$_POST["nom_form_qual"],"duree_form_qual"=>$_POST["duree_form_qual"]]);
                        $requete = null;
                    }
                    else{
                        if($type_form_after == "diplomante1"){
                        // ordre de mission
                        $requete = $mysqlConnection->prepare("UPDATE resultat SET nom_form_dipl = :nom_form_dipl,duree_form_dipl=:duree_form_dipl WHERE id_resultat = '$id'");
                        // execution de la requete
                        $requete->execute(["nom_form_dipl"=>$_POST["nom_form_dipl"],"duree_form_dipl"=>$_POST["duree_form_dipl"]]);
                        $requete = null;
                        }
                    }
                }
                else{
                    if($type_formation == "stage"){
                        // ordre de mission
                        $requete = $mysqlConnection->prepare("UPDATE resultat SET nom_stage = :nom_stage,duree_stage=:duree_stage,nom_org_stage=:nom_org_stage WHERE id_resultat = '$id'");
                        // execution de la requete
                        $requete->execute(["nom_stage"=>$_POST["nom_stage"],"duree_stage"=>$_POST["duree_stage"],"nom_org_stage"=>$_POST["nom_org_stage"]]);
                        $requete = null;
                    }
                    else{
                        if($type_formation == "abandon"){
                            // ordre de mission
                            $requete = $mysqlConnection->prepare("UPDATE resultat SET abandon = :abandon WHERE id_resultat = '$id'");
                            // execution de la requete
                            $requete->execute(["abandon"=>$_POST["abandon"]]);
                            $requete = null;
                        }
                        else{
                            if($type_formation == "non_retour"){
                                // ordre de mission
                                $requete = $mysqlConnection->prepare("UPDATE resultat SET non_retour = :non_retour WHERE id_resultat = '$id'");
                                // execution de la requete
                                $requete->execute(["non_retour"=>$_POST["non_retour"]]);
                                $requete = null;
                            }
                            else{
                                if($type_formation == "autre_s"){
                                    // ordre de mission
                                    $requete = $mysqlConnection->prepare("UPDATE resultat SET autre = :autre WHERE id_resultat = '$id'");
                                    // execution de la requete
                                    $requete->execute(["autre"=>$_POST["autre"]]);
                                    $requete = null;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    


    header("location:index.php?route=creer2&id=".$_GET["id"]);
}
?>