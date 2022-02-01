<?php
session_start();

if(isset($_SESSION['users_id'])) { // users_id에 세션이 존재하면
    $chk_login=TRUE; // 로그인 성공
} else {
    $chk_login=FALSE; // 그렇지않으면 로그인 실패
}
?>

