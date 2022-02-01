<?php
// require "../util/dbconfig.php";

session_start();
unset($_SESSION['users_id']);
//
header("Location: ../home.php");
?>