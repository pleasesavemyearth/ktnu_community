<?php
require "../util/dbconfig.php";

$sql = "use " .$dbname;
$conn->query($sql);

// create tbl
$sql = "DROP TABLE IF EXISTS free_board"; 
$conn->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS free_board (
    id INT(6) NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    contents TEXT NOT NULL,
    users_id VARCHAR(50) NOT NULL,
    reg_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    hit INT(6) NOT NULL,
    thump_up INT(6) NOT NULL, 
    PRIMARY KEY(`id`) 
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
    
if($conn->query($sql) === TRUE) {
    echo "<script>alert('free_board tbl created successfully')</script>";
} else {
    echo "<script>alert('error creating free_board tbl')</script>";
}

echo "<a href='../secret_board/app_initiate.php'>free_board tbl를 생성했습니다. 넘어가면 secret_board tbl을 생성합니다.</a>";
?>

<!--
    db연결 - 사용자계정 생성 - tbl 생성 시 한꺼번에 한 파일내에 있으면
    테이블 생성전인 drop table 부터 에러난다
    그럴 때엔 아래 코드를 이용해 명시적으로 db를 사용한다는 쿼리를 쓴다
    $sql = "use " .$dbname;
    $conn->query($sql);
-->
