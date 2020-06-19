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

        <!--  포트폴리오 카테고리화 시켜서 리스트 및 클릭시 창 팝업  -->
        <div class="section-container">
            <div class="portfolio-area" id="portfolio">
                <div class="title">PORTFOLIO</div>
                <div class="filter">
                    <ul class="list">
                        <li class="listItem active" id="all">All</li>
                        <li class="listItem" id="html_css_javascript">HTML/CSS/JAVASCRIPT</li>
                        <li class="listItem" id="java">JAVA</li>
                        <li class="listItem" id="android">ANDROID</li>
                    </ul>
                </div>
                <div class="container">
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider2.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider3.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider4.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider2.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider3.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider3.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
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