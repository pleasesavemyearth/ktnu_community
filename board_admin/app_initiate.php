<?php
require "../util/dbconfig.php";

$sql = "use " .$dbname;
$conn->query($sql);

// create tbl
$sql = "DROP TABLE IF EXISTS board_admin"; 
$conn->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS board_admin (
    id INT(6) NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(20) NOT NULL,
    PRIMARY KEY(`id`) 
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

// 게시판 관리자 정보를 읽어오는 함수
// function setup(){
//     global $connect, $id;

//     if(!$id) Error("게시판의 ID를 지정하셔야 합니다. 예 : list.php?id=test");
//     $sql = "SELECT * FROM board_admin WHERE id='$id' ";
//     $result = mysql_query($query, $connect);
//     $data = mysql_fetch_array($result);

//     return $data;
//  }
    
if($conn->query($sql) === TRUE) {
    echo "<script>alert('board_admin tbl created successfully')</script>";
} else {
    echo "<script>alert('error creating board_admin tbl')</script>";
}

echo "<a href='../home.php'>board_admin tbl를 생성했습니다. 홈 화면으로 넘어갑니다.</a>";
?>