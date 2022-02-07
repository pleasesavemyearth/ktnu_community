<?php
require_once './util/utility.php';
require_once './util/loginchk.php';
require './util/dbconfig.php';
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
                        <a href="../secret_board/secret_list.php">익명게시판</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">정보</button>
                    <div class="dropdown-content">
                        <a href="../course_board/course_list.php">강의정보</a>
                        <a href="../circle_board/circle_list.php">동아리</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">안내</button>
                    <div class="dropdown-content">
                        <a href="../notice_board/notice_list.php">공지사항</a>
                        <a href="../help_board/help_list.php">문의사항/건의</a>
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
        <!-- 공지사항의 글 최신 기준으로 5개만 제목만 불러옴 -->
        <div class="notice_aritcle">
            <br>공지사항
            <hr style="width:200px">
        <?php
        $sql="SELECT id, title FROM notice_board ORDER BY id DESC LIMIT 5";
        $resultset=$conn->query($sql);
        while($row=$resultset->fetch_array()) {
        ?>

        <td><a href="./notice_board/notice_detailview.php?id=<?=$row['id']?>"><?=$row['title']?></a></td><br> 
        <?php 
            } 
        ?>
        </div>

        <!-- 외부 이미지 링크 -->
        <a href="https://ko-kr.facebook.com/knutpr/" target="_blank"><img src="./img/facebook_icon.PNG"></a>
        <a href="https://www.instagram.com/best_knut/?hl=ko" target="_blank"><img src="./img/insta_icon.PNG"></a>

        <!---------- content ---------->
        <!-- new_section  -->
        <!-- article -->
        <span>
        <br><br>최신글
        <hr style="width:200px">
        <?php
        $sql="SELECT id, title, reg_time FROM free_board UNION ALL
              SELECT id, title, reg_time FROM secret_board UNION ALL
              SELECT id, title, reg_time FROM course_board UNION ALL
              SELECT id, title, reg_time FROM circle_board UNION ALL
              SELECT id, title, reg_time FROM notice_board UNION ALL
              SELECT id, title, reg_time FROM help_board ORDER BY reg_time DESC LIMIT 10"; // 글 수정시엔 last_time 컬럼을 따로 넣었기 때문에 수정 필요
        $resultset=$conn->query($sql);
        while($row=$resultset->fetch_array()) {
        ?>

        <td><?=$row['title']?></td><br> 
        <?php 
            } 
        ?>
        </span>

        <!-- hit_best_section -->
        <!-- article -->
        <span>
        <br>조회수 BEST
        <hr style="width:200px">
        <?php
        $sql="SELECT id, title, hit FROM free_board UNION ALL
              SELECT id, title, hit FROM secret_board UNION ALL
              SELECT id, title, hit FROM course_board UNION ALL
              SELECT id, title, hit FROM circle_board UNION ALL
              SELECT id, title, hit FROM notice_board UNION ALL
              SELECT id, title, hit FROM help_board ORDER BY hit DESC LIMIT 10"; // a태그 걸려면 어떻게..?
        $resultset=$conn->query($sql);
        while($row=$resultset->fetch_array()) {
        ?>

        <td><?=$row['title']?></td><br> 
        <?php 
            } 
        ?>
        </span>

        <!-- thumb_up_best_section -->
        <!-- article -->
        <span>
        <br>추천수 BEST
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
        <br>자유게시판
        <hr style="width:200px">
        <?php
        $sql="SELECT id, title FROM free_board ORDER BY id DESC LIMIT 5";
        $resultset=$conn->query($sql);
        while($row=$resultset->fetch_array()) {
        ?>
        <td><a href="./free_board/free_detailview.php?id=<?=$row['id']?>"><?=$row['title']?></a></td><br>
        <?php 
            }
        ?>
        </span>

        <!-- secret_section -->
        <!-- article -->
        <span>
        <br>익명게시판
        <hr style="width:200px">
        <?php
        $sql="SELECT id, title FROM secret_board ORDER BY id DESC LIMIT 5";
        $resultset=$conn->query($sql);
        while($row=$resultset->fetch_array()) {
        ?>
        <td><a href="./secret_board/secret_detailview.php?id=<?=$row['id']?>"><?=$row['title']?></a></td><br>
        <?php 
            }
        ?>
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

    ------------------------------------------------------------------
    오답노트

    1. home.php 메인화면 공지사항 article에 글 불러오는 sql문 작성 시, select id, title from notice_board 로 작성 즉, 해당하는 id의 글로 이동해야 하기 때문에 id값도 select해줬어야 했는데 id를 안써서 에러났었음


-->