<?php

if (isset($_POST["context"])==false || empty($_POST["context"]) || isset($_POST["rdv"])==false || empty($_POST["rdv"])){
    $_SESSION["error"]="La date et le champs sont obligatoires";
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
    $requete = $mysqlConnection->prepare('INSERT INTO rdv(context,rdv,fk_id_inscrit_rdv) values(:context,:rdv,:fk_id_inscrit_rdv)');
    //execution de la requete
    $requete->execute(["context"=>$_POST["context"],"rdv"=>$_POST["rdv"],"fk_id_inscrit_rdv"=>$_GET["id"]]);
    $requete = null;

   
    header("location:index.php?route=creer2&id=".$_GET["id"]);
}
?>