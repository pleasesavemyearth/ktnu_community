<?php
require "../util/dbconfig.php";
require "../util/loginchk.php";

$users_id=$_SESSION['users_id'];
$board_id=$_POST['board_id'];
$cmt_contents=$_POST['cmt_contents'];

$stmt=$conn->prepare("INSERT INTO comment(users_id, board_id, cmt_contents) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $users_id, $board_id, $cmt_contents);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: ../free_board/free_detailview.php?id='.$board_id);
?>

<!-- require loginchk를 연결안해줘서 전역변수 users_id를 넣어도
규정되지 않은 변수라는 에러가 남 -->