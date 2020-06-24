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

        <!--   사용가능한 언어 및 플랫폼 및 설명 리스트  -->
        <div class="section-container">
            <div class="skills-area" id="skills">
                <div class="title">
                    SKILLS
                </div>

                <div class="container">

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-html5"></i></span></div>
                        <div class="skills">HTML</div>
                        <div class="content">HTML에 대한 설명 및 자신의 숙련 정도 설명</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-css3"></i></span></div>
                        <div class="skills">CSS</div>
                        <div class="content">CSS에 대한 설명 및 자신의 숙련 정도 설명</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-js-square"></i></span></div>
                        <div class="skills">JAVASCRIPT</div>
                        <div class="content">자바스크립트에 대한 설명 및 자신의 숙련 정도 설명</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-java"></i></span></div>
                        <div class="skills">JAVA</div>
                        <div class="content">자바에 대한 설명 및 자신의 숙련 정도 설명</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-android"></i></span></div>
                        <div class="skills">ANDROID</div>
                        <div class="content">안드로이드에 대한 설명 및 자신의 숙련 정도 설명</div>
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