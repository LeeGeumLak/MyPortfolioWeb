<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--  메인화면에 표시될 이미지 슬라이더   -->
        <!--  자신의 사진이나 관심있는 분야 사진 등을 표시  -->
        <div class="section-container">
            <div class="main-area">
                <div class="container">

                    <div class="title">
                        환영합니다.<br>개발자 이금락의 포트폴리오 입니다.
                    </div>

                    <div class="image-slide fade">
                        <img src="../img/imgSlider1.jpg">
                        <div class="numbertext"></div>
                    </div>
                    <div class="image-slide fade">
                        <img src="../img/imgSlider2.jpg">
                        <div class="numbertext"></div>
                    </div>
                    <div class="image-slide fade">
                        <img src="../img/imgSlider3.jpg">
                        <div class="numbertext"></div>
                    </div>
                    <div class="image-slide fade">
                        <img src="../img/imgSlider4.jpg">
                        <div class="numbertext"></div>
                    </div>
                    <div class="image-slide fade">
                        <img src="../img/imgSlider5.jpg">
                        <div class="numbertext"></div>
                    </div>
                    <div class="image-slide fade">
                        <img src="../img/imgSlider6.jpg">
                        <div class="numbertext"></div>
                    </div>

                    <a class="image-prev" id="imagePrev">&#10094;</a>
                    <a class="image-next" id="imageNext">&#10095;</a>

                    <div class="slide">
                        <span class="slide" id="firstSlide"></span>
                        <span class="slide" id="secondSlide"></span>
                        <span class="slide" id="thirdSlide"></span>
                        <span class="slide" id="forthSlide"></span>
                        <span class="slide" id="fifthSlide"></span>
                        <span class="slide" id="sixthSlide"></span>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include './footer.php'
        ?>

        <div id="portfolioModal" class="modal"b>
            <span class="close" id="modalClose">&times;</span>
            <div class="container">
                <img id="modalImage">
                <div id="modalMain" class="modal-main"></div>
                <div id="modalSub" class="modal-sub"></div>
                <div id="modalText" class="modal-text"></div>
            </div>
        </div>

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>

    </body>
</html>