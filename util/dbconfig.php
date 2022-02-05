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
// if($conn->connect_error) {
//     echo"<script>alert('DB connection failed')</script>";
// }
// echo "<script>alert('DB connected successfully')</script>";
// ?>

<!--
    문제 :
    db생성 및 tbl생성 시 에러발생, 코드 수정 했으나 다시 확인하기

-->