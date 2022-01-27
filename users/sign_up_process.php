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

header('Location: ../home.php');
?>