<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS course_board";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS course_board(
id INT(6) NOT NULL AUTO_INCREMENT,
title VARCHAR(50) NOT NULL,
contents TEXT NOT NULL,
user VARCHAR(50) NOT NULL,
reg_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
last_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
hit INT(6) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

if($conn->query($sql) === TRUE) {
    echo "<script>alert('course_board tbl created successfully')</script>";
} else {
    echo "<script>alert('error creating course_board tbl')</script>";
}

echo "<a href='../circle_board/app_initiate.php'>course_board tbl를 생성했습니다. 넘어가면 circle_board tbl를 생성합니다.</a>";
?>