<?php

if (isset($_POST["action_menee"])==false || empty($_POST["action_menee"]) || isset($_POST["objectif"])==false || empty($_POST["objectif"]) || isset($_POST["moyen_oeuvre"])==false || empty($_POST["moyen_oeuvre"] || isset($_POST["echeance"])==false || empty($_POST["echeance"]))){
    $_SESSION["error"]="Tout les champs sont obligatoires";
    header("location:index.php?route=creer2");
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

    // ordre de mission
    $requete = $mysqlConnection->prepare('INSERT INTO plan_action(action_menee,objectif,moyen_oeuvre,echeance) values(:action_menee,:objectif,:moyen_oeuvre,:echeance)');
    //execution de la requete
    $requete->execute( ["action_menee"=>$_POST["action_menee"],"objectif"=>$_POST["objectif"],"moyen_oeuvre"=>$_POST["moyen_oeuvre"],"echeance"=>$_POST["echeance"]]);
    $requete = null;

   
    header("location:index.php?route=creer2&id=".$_GET["id"]);
}
?>