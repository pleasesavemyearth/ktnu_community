<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS users";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS users(
id INT(6) NOT NULL AUTO_INCREMENT,
users_id VARCHAR(20) NOT NULL,
users_pwd VARCHAR(256) NOT NULL,
email VARCHAR(50) NOT NULL,
users_realname VARCHAR(20) NOT NULL,
users_nickname VARCHAR(20) NOT NULL,
users_department VARCHAR(20) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

if($conn->query($sql) === TRUE) {
    echo "<script>alert('tbl users created successfully')</script>";
} else {
    echo "<script>alert('error creating tbl users')</script>";
}

echo "<a href='../comment/app_initiate.php'>tbl users를 생성했습니다. 넘어가면 tbl comment을 생성합니다.</a>";
?>