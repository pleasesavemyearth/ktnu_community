<?php
require "../util/dbconfig.php";

$id=$_POST['id'];
$title=$_POST['title'];
$contents=$_POST['contents'];

$stmt=$conn->prepare("UPDATE free_board SET title=?, contents=? WHERE id=?");
$stmt->bind_param("sss", $title, $contents, $id);
$stmt->execute();

$conn->close();

header('Location: ./free_detailview.php?id='.$id);

?>