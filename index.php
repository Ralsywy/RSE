<?php
session_start();
if(isset($_SESSION['auth'])) {
?>
<html>

<head>
<!-- DEBUT HEADER -->
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/style.css'>
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
          <a class="nav-link" href="index.php"><span class="nav_msg">Liste des suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="creer_suivis.php"><span class="nav_msg">Créer un suivis</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="creer_accompagnateur.php"><span class="nav_msg">Gérer un accompagnateur</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<!-- FIN NAVBAR -->
</head>

<body>
<?php
if(isset($_GET["route"])){

              
switch ($_GET["route"]){
  case "login":
    include("pages/login.php");
    break;
  }}
?>
</body>
</html>
<?php
} else {
    include("pages/login.php");
}
?>