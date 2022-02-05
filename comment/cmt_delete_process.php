<?php
require "../util/dbconfig.php";

$cmt_id=$_GET['cmt_id'];
$board_id=$_GET['board_id'];

$sql="DELETE FROM comment WHERE cmt_id=".$cmt_id;
$conn->query($sql);

$conn->close();

// header('Location: ../free_board/free_detailview.php?id='.$board_id); 
header('Location: ../free_board/free_list.php'); 
?>

<!-- 
    detailview에서 삭제button에 댓글러id값&게시글id값 까지 지정해주지 않으면 변수를 찾지 못하는 에러가 뜬다 
    : 삭제할 댓글을 찾는 주소가, 어떤 게시글에 달린 어떤 댓글인지 명시해줘야 하기 때문
    
    명시 후 삭제버튼 클릭시 활성화가 안되어서 소스코드를 봤더니 undef9ined variable $cmt_id 라고 나왔다.
    이는 변수 cmt_id를 선언하지 않았기 때문

    ★ 문제 :
    현재 주석처리한 header로 설정하면, 댓글 삭제 시 본글로 돌아와야 하는데
    detailview의 conn->query($sql) 에서 오류가 나서 페이지가 안돔, 그러나 댓글 삭제는 됨.
-->