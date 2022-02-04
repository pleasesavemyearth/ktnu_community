<?php
require "../util/dbconfig.php";

$id=$_GET['id'];
$sql="DELETE FROM free_board WHERE id = ".$id;
$conn->query($sql);

$conn->close();
header('Location: ./free_list.php');
echo "<script>alert('게시글이 삭제되었습니다.')</script>";
// script문 뜨는 방법,,,,뭘까
?>