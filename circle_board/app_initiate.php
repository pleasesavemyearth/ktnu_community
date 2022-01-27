<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS circle_board";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS circle_board(
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
    echo "<script>alert('tbl circle_board created successfully')</script>";
} else {
    echo "<script>alert('error creating circle_board tbl')</script>";
}

echo "<a href='../notice_board/app_initiate.php'>tbl circle_board를 생성했습니다. 넘어가면 tbl notice_board를 생성합니다.</a>"
?>