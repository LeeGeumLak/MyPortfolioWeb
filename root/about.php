<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyPortfolioWeb</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

        <!-- icon -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Heebo|Noto+Sans+KR" rel="stylesheet">

        <!-- css파일 가져오기 -->
        <link rel="stylesheet" href="../css/style.css" />
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <header class="header-area navbar-fade" id="header">
            <nav class="navbar">
                <a class="navbar-brand" id="navbarBrand">금락's portfolio</a>
                <a class="navbar-toggler" id="toggleBtn"><i class="fa fa-bars"></i></a>
                <div class="navbar-menu" id="menu">
                    <div class="nav-item"><a class="nav-link" id="navbarAbout">about</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarService">service</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarPortfolio">portfolio</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarContact">contact</a></div>
                </div>
            </nav>
        </header>

        <!--  간단한 소개 및 신상정보, 연락처 등을 표시  -->
        <div class="section-container">
            <div class="about-area" id="about">
                <div class="title">
                    ABOUT
                </div>
                <div class="picture">
                    <img src="../img/imgSlider1.jpg">
                    <div class="name">이금락</div>
                </div>
                <div class="text">
                    <div class="intro">
                        안녕하세요. ~~ 자기 소개 ~~ 문의하실게 있으면 언제든 연락 주세요.
                    </div>
                    <ul>
                        <li>
                            <div class="info">
                                <i class="far fa-calendar-alt"></i> 30st March, 1994
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-phone"></i> +82 10-1234-5678
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-envelope"></i> ekdma4105@naver.com
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fas fa-home"></i> 4-gil, Mokdongnam-ro, Yangcheon-gu, Seoul, Republic of Korea
                            </div>
                        </li>
                    </ul>
                    <div class="sns">
                        <a>
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a>
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <a>
                            <i class="fab fa-instagram"></i>
                        </a>
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