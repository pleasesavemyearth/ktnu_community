<?php
// require "../util/dbconfig.php";

session_start();
unset($_SESSION['users_id']);
// unset($_SESSION['userip']);
// setcookie("users_id","");
// setcookie("users_pwd","");
header("Location: ../home.php");
?>