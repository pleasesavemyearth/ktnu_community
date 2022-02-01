<?php
require_once './util/utility.php';
require_once './util/loginchk.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ktnu-people</title>
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
            <a href="./home.php">홈</a>
                <div class="dropdown">
                    <button class="dropbtn">커뮤니티</button>
                    <div class="dropdown-content">
                        <a href="../free_board/free_list.php">자유게시판</a>
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
            <?php
        }
        ?>

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
        <a href="https://ko-kr.facebook.com/knutpr/" target="_blank"><img src="./img/facebook_icon.PNG"></a>
        <a href="https://www.instagram.com/best_knut/?hl=ko" target="_blank"><img src="./img/insta_icon.PNG"></a>

        <!---------- content ---------->
        <!-- new_section  -->
        <!-- article -->
        <span>
        <br>최신글
        <hr style="width:200px">
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        </span>

        <!-- hit_best_section -->
        <!-- article -->
        <span>
        조회수 BEST
        <hr style="width:200px">
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        </span>

        <!-- thumb_up_best_section -->
        <!-- article -->
        <span>
        추천수 BEST
        <hr style="width:200px">
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        </span>

        <!-- free_section -->
        <!-- article -->
        <span>
        자유게시판
        <hr style="width:200px">
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        </span>

        <!-- secret_section -->
        <!-- article -->
        <span>
        익명게시판
        <hr style="width:200px">
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        글내용1<br>
        </span>


      <!---------- footer ---------->

      <script src='./js/join.js'></script>
</body>
</html>



<!--
    해야할 것
    

    ------------------------------------------------------------------
    수정사항 

    1. nav에 dropbtn은 button class로 두었고 css적용에 따라 클릭시 바로 이동은 안됨 a태그로 바꾸거나, css를 dropbtn hover 시 커서가 클릭으로 바꾸거 해서 링크이동하게 하거나.
    
    2. 회원가입, id/pw찾기 를 label로 두어야? a태그로만 두어야?
        sapn으로 둔 다음 a태그 두어야?

    3. 회원가입을 a태그로 만들 고 js실행되게 하고싶음

    ------------------------------------------------------------------
    정리
    
    1. input type button 과 button type button 의 차이

-->