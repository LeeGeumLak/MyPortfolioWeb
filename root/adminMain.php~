<?php
    session_start();
    if(isset($_SESSION['userId'])){
        if(!($_SESSION['userId'] == 'admin@naver.com')) {?>
            <script type="text/javascript">
                alert("관리자만 접근할 수 있습니다.");
                history.back();
            </script> <?php
        }
    }
    else {?>
        <script type="text/javascript">
            alert("관리자만 접근할 수 있습니다.");
            history.back();
        </script> <?php
    }
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>



        <?php
            include './footer.php'
        ?>

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>

        <script type="text/javascript">

        </script>
    </body>
</html>