<?php
require "../util/dbconfig.php";

$users_id=$_POST['users_id'];
$users_pwd=$_POST['users_pwd'];
$email=$_POST['email'];
$users_realname=$_POST['users_realname'];
$users_nickname=$_POST['users_nickname'];
$users_department=$_POST['users_department'];

$sql="SELECT users_id FROM users WHERE users_id= '".$users_id."'";
$result=$conn->query($sql);
if($result->num_rows>0) {
    echo "<script>alert('ID가 이미 존재합니다.')</script>";
} else {
    $stmt=$conn->prepare("INSERT INTO users(users_id, users_pwd,email, users_realname, users_nickname, users_department) VALUES(?, sha2(?,256), ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $users_id, $users_pwd, $email, $users_realname, $users_nickname, $users_department);
    $stmt->execute();
}

$conn->close();

echo "<script>alert('회원가입 되었습니다.')</script>";
header('Location: ../home.php');
?>
<!-- 
    문제
    1. 이미 존재하는 id를 가입시킬 시, 가입은 안되지만 알림창이 안뜸
    2. 회원가입 완료 후, 알림창 뜨게하려는데 안됨
-->