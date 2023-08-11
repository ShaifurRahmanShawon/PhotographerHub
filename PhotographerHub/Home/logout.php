<?php
session_start();
unset($_SESSION["name"]);
unset($_SESSION["email"]);
unset($_SESSION["type"]);
session_destroy();
header("Location:/Group 7/index.php");
?>