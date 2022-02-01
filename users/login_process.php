<?php
session_start(); // 로그인 성공시 세션관리 위해 추가
require "../util/dbconfig.php";

$users_id=$_POST['users_id'];
$users_pwd=$_POST['users_pwd'];
// $userip = get_client_ip();

$stmt=$conn->prepare("SELECT * FROM users WHERE users_id = ? and users_pwd = sha2(?,256)");
$stmt->bind_param("ss", $users_id, $users_pwd);
$stmt->execute();
$result=$stmt->get_result();
$row=mysqli_fetch_array($result);

if(!empty($row['users_id'])) {
    echo "<script>alert('로그인에 성공했습니다.')</script>";
    echo "<script>alert('세션을 생성했습니다.')</script>";
    $_SESSION['users_id']=$users_id;
    $conn->close();
    header('Location: ../home.php');
} else {
    echo "<script>alert('로그인에 실패했습니다.')</script>";
    $conn->close();
    header('Location: ../home.php');
}


// if (!empty($row['users_id'])) {
//     echo "<script>alert('로그인에 성공했습니다.')</script>";
//     echo "<script>alert('세션을 생성했습니다.')</script>";
//     if(isset($_REQUEST['chkbox'])) {
//         $a = setcookie('users_id', $users_id, time() + 60);
//         $b = setcookie('users_pwd', $users_pwd, time() + 60);
//     }

// // 세션 변수 등록
// $_SESSION['users_id']=$users_id;
// $_SESSION['userip']=$userip;

// $conn->close();
// header('Location: ../home.php');

// } else {
//     $conn->close();
//     echo "<script>alert('로그인에 실패했습니다.')</script>";
//     header('Location: ../home.php');
// }
?>


<!-- 
    문제 :
    1. get_client_ip 함수 사용 불가
    2. 로그인 성공 및 실패시 alert창 뜨지 않음

    정리 :
    session_start() 함수는 세션 아이디가 이미 존재하는지 확인하고, 존재하지 않으면 새로운 아이디를 생성
    세션 아이디 = 웹 서버에 의해 무작위로 만들어진 숫자

    세션 아이디는 세션이 유지되는 동안 클라이언트 측에 저장됨
    웹 서버는 클라이언트로부터 받아온 세션 아이디를 가지고 해당 아이디에 대응되는 세션 변수에 접근함
 -->