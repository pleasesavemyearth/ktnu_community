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
      <!-- header -->
        <!-- logo -->
        <a href="#"><img src="../img/cat.jpg" width="150" height="70"></a>

        <!-- link -->
        <div class="link">
            <a href="#">한국교통대학교</a>
            <a href="#">도서관</a>
            <a href="#">통합정보시스템</a>
            <a href="#">수강신청</a>
            <a href="#">e-campus</a>
        </div>

        <!-- nav -->
        <div class="navbar">
            <a href="./home.php">홈</a>
                <div class="dropdown">
                    <button class="dropbtn">커뮤니티</button>
                    <div class="dropdown-content">
                        <a href="#">자유게시판</a>
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

      <!-- main -->
        <!-- login -->
        <form action="./users/login_process.php" method="post">
            <div class="container">
                <input type="text" placeholder="아이디" name="users_id" required>
                <input type="password" placeholder="비밀번호" name="users_pwd" required>
                <button type="submit">로그인</button>
                <label>
                    <input type="checkbox" name="remember">로그인 유지</label>
                </label>
            </div>
            <div class="container">
                <span><a href="#">회원가입</a></span>
                <span>&nbsp;|&nbsp;</span>
                <span><a href="#">ID/PW 찾기</a></span>
            </div>
        </form>

        <!-- 회원가입 modal -->

        <div id="id01" class="modal">
        
        <form action="./users/sign_up_process.php" method="post">
            <div class="container">
                <h1>회원가입</h1>
                <label>ID</label>
                <input type="text" name="users_id" required>
                <label>Password</label>
                <input type="password" name="users_pwd" required>
                <label>이메일</label>
                <input type="text" name="email" required>
                <label>이름</label>
                <input type="text" name="users_realname" required>
                <label>닉네임</label>
                <input type="text" name="users_nickname" required>
                <label>학과</label>
                <input type="text" name="users_department" required>
            </div>
            <div class="clearfix">
                <button type="submit" class="signupbtn">회원가입</button>
            </div>
        </form>

        </div>
        
        <!-- new_section  -->
        <!-- article -->

        <!-- hit_best_section -->
        <!-- article -->

        <!-- thumb_up_best_section -->
        <!-- article -->

        <!-- free_section -->
        <!-- article -->

        <!-- secret_section -->
        <!-- article -->

        <!-- aside -->
        <!-- article -->
        <!-- 외부 이미지 링크 -->

      <!-- footer -->

</body>
</html>

<!--
    해야할 것
    회원가입 창 modal 하기

    ------------------------------------------------------------------

    1. nav에 dropbtn은 button class로 두었고 css적용에 따라 클릭시 바로 이동은 안됨 a태그로 바꾸거나, css를 dropbtn hover 시 커서가 클릭으로 바꾸거 해서 링크이동하게 하거나.
    
    2. 회원가입, id/pw찾기 를 label로 두어야? a태그로만 두어야?
        sapn으로 둔 다음 a태그 두어야?
-->