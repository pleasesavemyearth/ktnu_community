<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS help_board";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS help_board(
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
    echo "<script>alert('tbl help_board created successfully')</script>";
} else {
    echo "<script>alert('error creating tbl help_board')</script>";
}

echo "<a href='../users/app_initiate.php'>tbl help_board를 생성했습니다. 넘어가면 tbl users를 생성합니다.</a>";
?>