<?php
session_start();
if(isset($_SESSION['auth'])) {
?>
<html>

<head>
<!-- DEBUT HEADER -->
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>R.S.E</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/style.css'>
    <script src='main.js'></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- FIN HEADER -->

<!-- DEBUT NAVBAR -->
<header>
<nav class="navbar navbar-expand-lg" style="background-color: #ff7dc8;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/rdc.png" width="50" height="50">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
      <?php 
          if(isset($_SESSION["login"])){
            ?>
            <li class="nav-item">
          <a class="nav-link" href="index.php?route=list_suivis"><span class="nav_msg">Liste des suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=creer_suivis"><span class="nav_msg">Créer un suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=creer_accompagnateur"><span class="nav_msg">Gérer un accompagnateur</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=logout"><span class="nav_msg">Se déconnecter</span></a>
        </li>
        <?php } else {?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?route=login"><span class="nav_msg">Page d'accueil</span></a>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>
</header>


<!-- FIN NAVBAR -->
</head>

<body>
<?php
// BASE DE DONNEES
include("config/database.php");

// ERREURS
if (isset($_SESSION["error"])){
  ?>
  <div class="alert alert-danger" role="alert">
    <?php 
      echo $_SESSION["error"];
      unset($_SESSION["error"]);
    ?>
  </div>

  <?php
}
if(isset($_GET["route"])){
switch ($_GET["route"]){
  case "login":
    include("pages/login.php");
      break;
  case "list_suivis":
      include("pages/list_suivis.php");
      break;
  case "creer_suivis":
      include("pages/creer_suivis.php");
      break;
  case "creer_accompagnateur":
      include("pages/creer_accompagnateur.php");
      break;
  case "check_login":
    include("pages/check_login.php");
    break;
  case "logout":
    include("pages/logout.php");
    break;

  }}
?>
</body>
</html>
<?php
} else {
  ?>
  <head>
<!-- DEBUT HEADER -->
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>R.S.E</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/style.css'>
    <script src='main.js'></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- FIN HEADER -->

<!-- DEBUT NAVBAR -->
<header>
<nav class="navbar navbar-expand-lg" style="background-color: #ff7dc8;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/rdc.png" width="50" height="50">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?route=login"><span class="nav_msg">Page d'accueil</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=list_suivis"><span class="nav_msg">Liste des suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=creer_suivis"><span class="nav_msg">Créer un suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=creer_accompagnateur"><span class="nav_msg">Gérer un accompagnateur</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<!-- FIN NAVBAR -->
</head>
<?php
    include("pages/login.php");
}
?>