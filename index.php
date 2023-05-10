<?php
session_start();
if(isset($_SESSION['auth'])) {
?>
<html>
<head>
<?php
include("header.php")
?>
</head>
<body>
<?php
include("navbar_full.php")
?>

</body>
</html>
<?php
} else {
    include("login.php");
}
?>