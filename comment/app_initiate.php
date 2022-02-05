<?php
require "../util/dbconfig.php";

$sql="DROP TABLE IF EXISTS comment";
$conn->query($sql);

$sql="CREATE TABLE IF NOT EXISTS comment(
    cmt_id INT(6) NOT NULL AUTO_INCREMENT,
    board_id INT(6) NOT NULL,
    users_id VARCHAR(50) NOT NULL,
    cmt_contents VARCHAR(600) NOT NULL,
    cmt_reg_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cmt_last_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`cmt_id`),
    FOREIGN KEY(`board_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

if($conn->query($sql) === TRUE) {
    echo "<script>alert('tbl comment created successfully')</script>";
} else {
    echo "<script>alert('error creating tbl comment')</script>";
}

$conn->close();

echo "<a href='../home.php'>tbl comment를 생성했습니다. 넘어가면 home으로 이동합니다.</a>";
?>

<!-- 
    FOREIGN KEY(`board_id`) REFERENCES users(`id`)
    comment tbl의 board_id는 users테이블의 id를 참조 

    Cascade : 부모 데이터 삭제 시 자식 데이터도 삭제 
-->