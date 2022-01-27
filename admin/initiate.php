<?php
require "../util/dbconfig.php";

// create user
// 0. 만약 같은 사용자 계정이 있으면 삭제
$sql = "DROP USER IF EXISTS ".$dbname;
$conn->query($sql);

// 1. 만들고자 하는 이름으로 애플리케이션용 계정생성
$sql = "CREATE USER IF NOT EXISTS '" . $dbname . "'@'%' IDENTIFIED BY '" . $dbname . "'";
$conn->query($sql);

// 2. 생성된 계정 리소스 제한
$sql = "GRANT USAGE ON *.* TO '" .$dbname. "'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";
$conn->query($sql);

// 3. create DB
$sql = "DROP DATABASE IF EXISTS " .$dbname;
$conn->query($sql);
$sql = "CREATE DATABASE IF NOT EXISTS " .$dbname;
if($conn->query($sql) === TRUE) {
    echo "<script>alert('DB created successfully')</script>";
} else {
    echo "<script>alert('error creating DB')</script>";
}

// 4. 생성된 계정에 특정 데이터베이스에 대한 궈한 부여
$sql = "GRANT ALL PRIVILEGES ON `" .$dbname. "`.* TO '" .$dbname. "'@'%'; "; 
$conn->query($sql);

echo "<a href='../free_board/app_initiate.php'>사용자 계정과 ktnu DB를 생성했습니다. 넘어가면 free_board tbl을 생성합니다.</a>";
?>


<!--
    primary key(`id`) 에서 ` ` 이거 안붙이면 생성 안됨 

    dbconfig에서 server연결을 하고, admin/initiate에서 사용자 계정과 db를 생성한다. 이때 dbconfig에서 conn->close로 닫아버리면 initiate에서 실행을 못하기 때문에 열어줘야 한다.
-->