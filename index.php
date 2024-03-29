<?php
session_start();
?>
<html>

<head>
<!-- DEBUT HEADER -->
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>S.R.E</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/style.css'>
    <script src='javascript/constante.js'></script>
    <script src='javascript/script.js'></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/db7501469c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vicopo-vanilla.min.js"></script>
    <script src="javascript/zipcode.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/print.css" media="print">

    
<!-- FIN HEADER -->

<!-- DEBUT NAVBAR -->
<header>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      
      <img src="img/rdc.png" width="50" height="50">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
      <?php 
          if(isset($_SESSION["login"]))
          {?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Liste des inscrits
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?route=list_suivis">En cours</a></li>
                <li><a class="dropdown-item" href="index.php?route=list_terminee">Terminé</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=creer_suivis"><span class="nav_msg">Créer un suivi</span></a>
            </li>
            <?php
            if (isset($_SESSION["is_admin"])){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=creer_accompagnateur"><span class="nav_msg">Gérer un accompagnateur</span></a>
            </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=logout"><span class="nav_msg">Se déconnecter</span></a>
            </li>
            <?php } else {?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><span class="nav_msg">Se connecter</span></a>
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
date_default_timezone_set('Europe/Paris');
?>

<!-- bouton retourner en haut -->
<a href="#" class="btn_top" id="btn_top"><i class="fa-solid fa-circle-chevron-up"></i></a>

<!-- LOGIN -->
<?php 
if(isset($_SESSION["login"])){}
else { 
  ?><div class="alert_login">
    <?php
      $_SESSION["success"]="Nom d'utilisateur = première lettre du prénom + nom de famille complet (ex: DUPONT Pierre = pdupont)";?>
    </div>
<div class="wrapper">
    <div class="form-box login">
        <h2>Connexion</h2>
        <form action="index.php?route=check_login" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                <input type="text" id="login" name="login" required>
                <label>Nom d'utilisateur</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="pwd_acc" name="pwd_acc" required>
                <label>Mot de passe</label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>
 <?php } ?>


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

// SUCCES
if (isset($_SESSION["success"])){
    ?>
    <div class="alert alert-success" role="alert">
      <?php 
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
      ?>
    </div>
    <?php
  }

if(isset($_GET["route"])){
switch ($_GET["route"]){
  case "list_suivis":
      include("pages/lister_suivis/liste.php");
      break;
  case "creer_suivis":
      include("pages/creer_suivis/creer.php");
      break;
  case "creer_accompagnateur":
      include("pages/accompagnateur/creer.php");
      break;
  case "check_login":
    include("pages/auth/check_login.php");
    break;
  case "logout":
    include("pages/auth/logout.php");
    break;
  case "store_accompagnateur":
    include("pages/accompagnateur/store.php");
    break;
  case "supp_accompagnateur":
    include("pages/accompagnateur/supprimer.php");
    break;
  case "list_terminee":
    include("pages/lister_suivis/liste_termine.php");
    break;
  case "edit_statut":
    include("pages/lister_suivis/terminer.php");
    break;
  case "edit_reprendre":
    include("pages/lister_suivis/reprendre.php");
    break;
  case "supp_inscrit":
    include("pages/lister_suivis/supp_inscrit.php");
    break;
  case "store_rdv":
    include("pages/creer_suivis/store_rdv.php");
    break;
  case "store_plan":
    include("pages/creer_suivis/store_plan.php");
    break;
  case "delete_rdv":
    include("pages/creer_suivis/delete_rdv.php");
    break;
  case "delete_plan_action":
    include("pages/creer_suivis/delete_plan_action.php");
    break;
  case "creer2":
    include("pages/creer_suivis/creer2.php");
    break;
  case "store_inscrit":
    include("pages/creer_suivis/store.php");
    break;
  case "store_inscrit2":
    include("pages/creer_suivis/store2.php");
    break;
  case "update":
    include("pages/creer_suivis/update.php");
    break;
  case "store_update":
    include("pages/creer_suivis/store_update.php");
    break;
  case "affichage":
    include("pages/creer_suivis/affichage.php");
    break;
  }}
?>

</body>

</html>