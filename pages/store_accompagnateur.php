<?php
if (isset($_POST["name_acc"])==false || empty($_POST["name_acc"]) || isset($_POST["pwd_acc"])==false || empty($_POST["pwd_acc"])){
    $_SESSION["error"]="Le NOM Prénom et le mot de passe sont obligatoires";
    header("location:index.php?route=creer_accompagnateur");
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
$requete = $mysqlConnection->prepare('INSERT INTO accompagnateur(name_acc,pwd_acc) values(:name_acc,:pwd_acc)');
//execution de la requete
$requete->execute( ["name_acc"=>$_POST["name_acc"],"pwd_acc"=>$_POST["pwd_acc"]]);
$mysqlConnection = null;
$requete = null;
$_SESSION["success"]="Accompagnateur crée avec succès";
   
header("location:index.php?route=creer_accompagnateur");
}
?>