<?php
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

// ordre de mission
$requete = $mysqlConnection->prepare('SELECT * FROM accompagnateur where login = :login and password=:password');
//execution de la requete
$requete->execute(["login"=>$_POST["login"],"password"=>($_POST["password"])]);
$accompagnateur = $requete->fetch();
if ($accompagnateur){
  
    $_SESSION["auth"]=1;
    $_SESSION["login"]=$_POST["login"];
    header("location:index.php?route=list_suivis");
  
}
else
{
    $_SESSION["error"]="identifiant de connexion incorrect";
    header("location:index.php?route=login");
   
}

?>