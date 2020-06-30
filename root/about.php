<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--  간단한 소개 및 신상정보, 연락처 등을 표시  -->
        <div class="section-container">
            <div class="about-area" id="about" style="background-color: #f9f9ff">
                <div class="title">
                    ABOUT
                </div>
                <div class="picture">
                    <img src="../img/lglProfileImg.jpg">
                    <div class="name">이 금 락</div>
                </div>
                <div class="text">
                    <div class="intro">
                        안녕하세요. 성장중인 개발자 이금락입니다.<br>문의하실게 있으면 언제든 연락 주세요.
                    </div>
                    <ul>
                        <li>
                            <div class="info">
                                <i class="far fa-calendar-alt"></i> 1994년 3월 30일
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-phone"></i> +82 10-3670-8702
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-envelope"></i> ekdma4105@naver.com
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-home"></i> 서울시 양천구 목동남로4길 6-23
                            </div>
                        </li>
                    </ul>
                    <div class="sns">
                        <a href="https://github.com/LeeGeumLak">
                            <i class="fab fa-github" style="font-size:30px"></i>
                        </a>
                        <a href="https://web.facebook.com/profile.php?id=100004703770704">
                            <i class="fab fa-facebook-square" style="font-size:30px"></i>
                        </a>
                        <a href="https://www.instagram.com/geumlak_lee/">
                            <i class="fab fa-instagram" style="font-size:30px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php include './footer.php'?>

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