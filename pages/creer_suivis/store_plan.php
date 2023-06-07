<?php

if (isset($_POST["action_menee"])==false || empty($_POST["action_menee"]) || isset($_POST["echeance"])==false || empty($_POST["echeance"])){
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
    $requete = $mysqlConnection->prepare('INSERT INTO plan_action(action_menee,echeance) values(:action_menee,:echeance)');
    //execution de la requete
    $requete->execute( ["action_menee"=>$_POST["action_menee"],"echeance"=>$_POST["echeance"]]);
    $mysqlConnection = null;
    $requete = null;

   
    header("location:index.php?route=creer2");
}
?>