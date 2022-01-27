<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS secret_board";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS secret_board(
id INT(6) NOT NULL AUTO_INCREMENT,
title VARCHAR(50) NOT NULL,
contents TEXT NOT NULL,
reg_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
last_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
hit INT(6) NOT NULL,
thump_up INT(6) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

if($conn->query($sql) === TRUE) {
    echo "<script>alert('secret_board tbl created successfully')</script>";
} else {
    echo "<script>alert('error creating secret_board tbl')</script>";
}

echo "<a href='../course_board/app_initiate.php'>secret_board tbl를 생성했습니다. 넘어가면 course_board tbl을 생성합니다.</a>";
?>