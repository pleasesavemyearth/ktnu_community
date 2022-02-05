<?php
require "../util/dbconfig.php";
require "../util/loginchk.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <!---------- header ---------->
        <!-- logo -->
        <a href="#"><img src="../img/cat.jpg" width="150" height="70"></a>

        <!-- link -->
        <div class="link">
            <li><a href="#">한국교통대학교</a></li>
            <li><a href="#">도서관</a></li>
            <li><a href="#">통합정보시스템</a></li>
            <li><a href="#">수강신청</a></li>
            <li><a href="#">e-campus</a></li>
        </div>

        <!-- nav -->
        <div class="navbar">
            <a href="../home.php">홈</a>
                <div class="dropdown">
                    <button class="dropbtn">커뮤니티</button>
                    <div class="dropdown-content">
                        <a href="./free_board/free_list.php">자유게시판</a>
                        <a href="#">익명게시판</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">정보</button>
                    <div class="dropdown-content">
                        <a href="#">강의정보</a>
                        <a href="#">동아리</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">안내</button>
                    <div class="dropdown-content">
                        <a href="#">공지사항</a>
                        <a href="#">문의사항/건의</a>
                    </div>
                </div>
        </div>

      <!----------- main ---------->
      <!---------- aside ---------->  
      <!-- login -->
        <?php
        if(!$chk_login) { 
        ?>
        <form action="./users/login_process.php" method="post">
            <div class="login_container">
                <div class="login">
                    <input type="text" placeholder="아이디" name="users_id" required>
                </div>
                <div class="login">
                    <input type="password" placeholder="비밀번호" name="users_pwd" required>
                </div>
                <button type="submit">로그인</button> <!-- 로그인 버튼 옆으로 가는법 ? -->
            </div>
        </form>

            <div class="container">
                <div class="root" id="modal_opne_btn">
                    <span><button type="button">회원가입</button></span> <!-- 회원가입 a태그로 대체 안되나 -->
                </div>
                    <span>&nbsp;|&nbsp;</span>
                    <span><a href="#">ID/PW 찾기</a></span>
            </div>
            
            <?php
        } else {
            ?>
            <div class=login_welcome>
            <?=$_SESSION['users_id'];?> 님 환영합니다.
            <button type="button" value="logout" onclick="location.href='../users/logout_process.php'">로그아웃</button>
            </div>


        <!-- join modal -->
        <div id="modal">

        <div class="modal_content">
        <form action="./users/join_process.php" method="post">
            <div class="join_container">
                <h1>회원가입</h1>
                <div class="join_row">
                    <label>ID</label>
                    <input type="text" name="users_id" required>
                </div>
                <div class="join_row">
                    <label>Password</label>
                    <input type="password" name="users_pwd" required>
                </div>
                <div class="join_row">    
                    <label>이메일</label>
                    <input type="text" name="email" required>
                </div>
                <div class="join_row">
                    <label>이름</label>
                    <input type="text" name="users_realname" required>
                </div>
                <div class="join_row">
                    <label>닉네임</label>
                    <input type="text" name="users_nickname" required>
                </div>
                <div class="join_row">
                    <label>학과</label>
                    <input type="text" name="users_department" required>
                </div>
                <div class="clearfix">
                    <button type="submit" class="join_btn">회원가입</button>
                </div>
            </div>
        </form>
        <button type="button" id="modal_close_btn">닫기</button>
        </div>
        
        <div class="modal_layer"></div>
        </div>


        <!-- article -->
        <div class="notice_aritcle">
            공지사항
            <hr style="width:200px">
            글내용1<br>
            글내용1<br>
            글내용1<br>
            글내용1<br>
            글내용1
        </div>

        <!-- 외부 이미지 링크 -->
        <a href="https://ko-kr.facebook.com/knutpr/" target="_blank"><img src="../img/facebook_icon.PNG"></a>
        <a href="https://www.instagram.com/best_knut/?hl=ko" target="_blank"><img src="../img/insta_icon.PNG"></a>

        <!---------- content ---------->
        <!-- regist_form -->
        <h1>자유게시판</h1>
        <form action="./free_registprocess.php" method="post">
        <!-- <input type="text" name="users_id" value="<?=$users_id?>"/> 이 구문 오류나는데 없어도 글 등록은 된다..?-->
        <input type="text" name="title" placeholder="제목을 입력해주세요." required><br>
        <textarea name="contents" rows="10" cols="50" required></textarea><br>
        <input type="submit" value="등록">
        <button type="button" value="cancle" onclick="location.href='./free_list.php'">취소</button>
        </form>

      <!---------- footer ---------->
      <?php
        }
      ?>
      <script src='./js/join.js'></script>
</body>
</html>

<!-- 
    문제 :
    undefined variable $users_id
    post방식으로 free_registprocess.php 로 넘겨주는데,
    users_id, title, contents 값들을 넘겨줄것이다.
    그런데 users_id 변수가 정의되지 않음
    -> loginchk if문 문제 ? registprocess.php를 만들지않아서?
    로그인이 성공했으면 로그인한 사용자의 id가 떠야 하는데..
-->