<?php
/* 
MySQL에 연결
MySQL DB 의 data 에 접근하려면 서버에 연결해야 함
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ktnu";

// connect server
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    echo"<script>alert('connection failed')</script>";
}
echo "<script>alert('connected successfully')</script>";

// create DB
$sql = "DROP DATABASE IF EXISTS " .$dbname;
$conn->query($sql);

$sql = "CREATE DATABASE IF NOT EXISTS " .$dbname;
if($conn->query($sql) === TRUE) {
    echo "<script>alert('DB created successfully')</script>";
} else {
    echo "<script>alert('error creating DB')</script>";
}

// create tbl
$sql = "DROP TABLE IF EXISTS free_board"; 
$conn->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS free_board";

$conn->close();
?>