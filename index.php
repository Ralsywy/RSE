<?php
session_start();
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

<!-- LOGIN -->
<?php 
if(isset($_SESSION["login"])){}
  else { ?>

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
                <input type="password" id="password" name="password" required>
                <label>Mot de passe</label>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox"> Se souvenir
                </label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>
 <?php } ?>

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
<div class="pied_page">
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid roww -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>
<style>
  .pied_page{
    z-index: -1;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
  }
</style>

</html>