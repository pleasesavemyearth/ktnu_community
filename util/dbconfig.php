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
    echo"<script>alert('DB connection failed')</script>";
}
echo "<script>alert('DB connected successfully')</script>";
?>

