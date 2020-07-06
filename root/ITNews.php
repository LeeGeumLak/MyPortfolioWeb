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

    <!-- IT에 관련된 뉴스 크롤링하여 무한 스크롤링으로 표시 -->
    <div class="section-container">
        <div class="projects-area" id="projects" style="background-color: #f9f9ff">
            <div class="title">
                IT NEWS
            </div>
        </div>



    </div>


    <div style="position: fixed; bottom: 100px; right: -100px; cursor: pointer; color: #ffffff;">
        <a href="#"><img style="width: 30%; height: 30%" src="../img/top.png" title="TOP"></a>
    </div>

    <?php include './footer.php'?>

    <script src="../js/myPortfolioWeb.js"></script>

    <script type="text/javascript">

    </script>

    </body>
</html>