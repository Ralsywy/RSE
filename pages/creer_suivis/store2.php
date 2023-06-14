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

    if(isset($_POST["info_comp"])){
        // ordre de mission
        $requete = $mysqlConnection->prepare("UPDATE inscrit SET info_comp = :info_comp WHERE id_inscrit = '$id'");
        // execution de la requete
        $requete->execute(["info_comp"=>$_POST["info_comp"]]);
        $requete = null;
    }
   
    header("location:index.php?route=creer2&id=".$_GET["id"]);
}
?>