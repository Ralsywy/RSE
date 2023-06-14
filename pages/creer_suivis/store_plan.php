<?php

if (isset($_POST["action_menee"])==false || empty($_POST["action_menee"]) || isset($_POST["echeance"])==false || empty($_POST["echeance"])){
    $_SESSION["error"]="La date et le champs ";
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

    // ordre de mission
    $requete = $mysqlConnection->prepare('INSERT INTO plan_action(action_menee,echeance,fk_id_inscrit_plan) values(:action_menee,:echeance,:fk_id_inscrit_plan)');
    //execution de la requete
    $requete->execute(["action_menee"=>$_POST["action_menee"],"echeance"=>$_POST["echeance"],"fk_id_inscrit_plan"=>$_GET["id"]]);
    $requete = null;

   
    header("location:index.php?route=creer2&id=".$_GET["id"]);
}
?>