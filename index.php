<?php
session_start();
if(isset($_SESSION['auth'])) {
?>
<html>
<head>
<?php
include("header.php")
?>
<?php
include("navbar_full.php")
?>
</head>
<body>


</body>
</html>
<?php
} else {
    include("login.php");
}
?>