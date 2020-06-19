<?php

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
            <div class="welcome-area">
                <div class="container">
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

                    <a class="image-prev" id="imagePrev">&#10094;</a>
                    <a class="image-next" id="imageNext">&#10095;</a>

                    <div class="slide">
                        <span class="slide" id="firstSlide"></span>
                        <span class="slide" id="secondSlide"></span>
                        <span class="slide" id="thirdSlide"></span>
                        <span class="slide" id="forthSlide"></span>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area">
            <div class="sns">
                <div class="item" id="facebook"><i class="fab fa-facebook-square"></i></div>
                <div class="item" id="google"><i class="fab fa-google-plus"></i></div>
                <div class="item" id="instagram"><i class="fab fa-instagram"></i></div>
            </div>
            <div class="info">
                <p>Copyright © 2020 LGL Corp. All rights reserved.</p>
            </div>
        </footer>

        <div id="portfolioModal" class="modal"b>
            <span class="close" id="modalClose">&times;</span>
            <div class="container">
                <img id="modalImage">
                <div id="modalMain" class="modal-main"></div>
                <div id="modalSub" class="modal-sub"></div>
                <div id="modalText" class="modal-text"></div>
            </div>
        </div>

        <script src="../js/myPortfolioWeb.js"></script>
    </body>
</html>