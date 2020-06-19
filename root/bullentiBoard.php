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

        <!--  소통할 수 있는 게시판   -->
        <div class="section-container">
            <div class="bulletinBoard-area" id="bulletinBoard">
                <div class="title">Bullentin Board</div>

                <div class="container">
                    <div id="data-container"></div>
                    <div id="pagination"></div>
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

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>

    </body>
</html>