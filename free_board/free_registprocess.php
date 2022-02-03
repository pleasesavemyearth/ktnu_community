<?php
require "../util/dbconfig.php";
require "../util/loginchk.php";
if($chk_login) {
$user=$_SESSION['user'];
$title=$_POST['title'];
$contents=$_POST['contents'];

$stmt=$conn->prepare("INSERT INTO free_board(users_id, title, contents) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $users_id, $title, $contents);
$stmt->execute();
// $stmt->close();
$conn->close();
header('Location: ../free_board/free_list.php');
} else {
    echo "<script>alert('로그인이 필요합니다.')</script>";
    $conn->close();
    header('Location: ../home.php');
}
?>