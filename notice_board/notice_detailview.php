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
                        <a href="./free_list.php">자유게시판</a>
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
        <div class="left_content">
            커뮤니티
            <hr style="width:200px">
            자유게시판<br>
            익명게시판
        </div>

        <!-- 외부 이미지 링크 -->
        <a href="https://ko-kr.facebook.com/knutpr/" target="_blank"><img src="../img/facebook_icon.PNG"></a>
        <a href="https://www.instagram.com/best_knut/?hl=ko" target="_blank"><img src="../img/insta_icon.PNG"></a>

        <!---------- content ---------->
        <h1>익명게시판</h1>
        <hr width="50%">

        <!-- 본문 -->
        <?php
            $id = $_GET['id'];
            
            // hit update
            $sql="UPDATE notice_board SET hit=hit+1 WHERE id = ".$id;
            $conn->query($sql);

            $sql="SELECT title, users_id, reg_time, hit, contents FROM notice_board WHERE id = ".$id;
            $result=$conn->query($sql);
            $row=$result->fetch_array();
        ?>
        <section>
            <div class="view_content_wrap">
                <div class="title_head">
                    <h4 class="title_word">
                        <span class="title"><?=$row['title']?></span>
                    </h4>
                </div>

                <div class="writer_head">
                    <div class="frame_left">
                        <span class="users_nickname"><?=$row['users_id']?></span>
                        <span class="date"><?=$row['reg_time']?></span>
                    </div>
                    <div class="frame_right">
                        <span class="hit">조회 <?=$row['hit']?></span>
                    </div>
                </div>
                <hr width="50%">

                <div class="inner_contents">
                    <?=$row['contents']?>
                </div>

                <hr width="50%">
                <div class="view_clear">
                    <button type="button" onclick="location.href='./notice_update.php?id=<?=$id?>'">수정</button>
                    <button type="button" onclick="location.href='./notice_deleteprocess.php?id=<?=$id?>'">삭제</button>
                    <button type="button" onclick="location.href='./notice_list.php'">목록</button>
                </div>
            </div>

        <!-- 댓글 리스트 -->
        <?php
        $sql="SELECT * FROM comment WHERE board_id=".$id;
        $result=$conn->query($sql);
        while($row=$result->fetch_array()) {
            $cmt_id=$row['cmt_id'];
        ?>
            <div class="view_comment">
                <div class="cmt_info">
                    <h4><span class="users_nickname"><?=$row['users_id']?></span></h4>
                </div>

                <div class="cmt_text_box">
                    <p class="cmt_word"><?=$row['cmt_contents']?></p>
                </div>

                <div class="frame">
                    <span class="date"><?=$row['cmt_reg_time']?></span>
                    <div class="cmt_clear">
                        <button type="button" onclick="location.href='../comment/cmt_update_process.php?id=<?=$id?>'">수정</button>
                        <button type="button" onclick="location.href='../comment/cmt_delete_process.php?id=<?=$id?>&cmt_id=<?=$cmt_id?>'">삭제</button>
                    </div>
                </div>
            </div>
        <hr width="50%">
        <?php
        }
        ?>

        <!-- 댓글 입력 -->
        <form action="../comment/cmt_regist_process.php" method="post">
            <input type="hidden" name="board_id" value="<?=$id?>">
            <div class="cmt_write_box">
                <div class="cmt_inner_text">
                    <textarea name="cmt_contents" cols="100" rows="5" maxlength="400"></textarea>
                </div>

                <div class="cmt_clear">
                    <div class="frame_right">
                        <!-- <button type="button" onclick="location.href='../comment/cmt_regist_process.php'">등록</button> method가 post법이 아니라서 ? 그럼 이건 못쓰는 건가-->
                        <input type="submit" value="등록">
                    </div>
                </div>
            </div>
        </form>
        </section>

      <!---------- footer ---------->
      <?php
        }
        ?>
      <script src='./js/join.js'></script>
</body>
</html>

<!-- 
    댓글이 한개씩만 나오는 경우 -> 반복문 지정 안해줫기 때문..;;
-->