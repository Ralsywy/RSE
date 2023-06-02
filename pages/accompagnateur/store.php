<?php

if (isset($_POST["name_acc"])==false || empty($_POST["name_acc"]) || isset($_POST["pwd_acc"])==false || empty($_POST["pwd_acc"])){
    $_SESSION["error"]="NOM Prénom et mot de passe obligatoires";
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

    //création du nom de login
    $nom = $_POST["name_acc"];
    $compteur = 0;
    $max=strlen($nom);
    $lenom = "";
    $i=0;
    
    while($nom[$i] != " ")
    {
        $i++;
        $compteur = $compteur + 1;
    }
    
    for($s=0; $s < $compteur; $s++)
    {
        $lenom = $lenom . $nom[$s];
    }

    $compteur = $compteur + 1;
    $login = strtolower($nom[$compteur].$lenom);
    
// ordre de mission
$requete = $mysqlConnection->prepare('INSERT INTO accompagnateur(login,name_acc,pwd_acc) values(:login,:name_acc,:pwd_acc)');
//execution de la requete
$requete->execute( ["login"=>$login,"name_acc"=>$_POST["name_acc"],"pwd_acc"=>$_POST["pwd_acc"]]);
$_SESSION["success"]="Accompagnateur crée avec succès";
$mysqlConnection = null;
$requete = null;

   
header("location:index.php?route=creer_accompagnateur");
}
?>