<?php
    session_start();
    /*//로그인 세션 없을때, 로그인 페이지로 이동
    if(!isset($_SESSION['userId'])){
        alert('방송 시청은 로그인을 해야 가능합니다.');
        echo("<script>location.href='./signIn.php';</script>");
    //로그인 세션 있을때, 방송 페이지 접근
    } else {
        // do nothing
    }*/
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
    <!--  최상단 네비게이션바     -->
    <?php include './topPart.php'?>

    <!--  방송 화면을 넣을 예정  -->
    <div class="section-container">
        <div class="about-area" id="about">
            <div class="title">
                BROADCAST
            </div>


        </div>
    </div>

    <?php include './footer.php'?>


    <script src="../js/myPortfolioWeb.js"></script>
    </body>
</html>