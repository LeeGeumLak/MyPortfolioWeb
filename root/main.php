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

        <!--  유저로그를 db에 저장하는 파일  -->
        <?php include './userLog.php' ?>

        <!--  메인화면에 표시될 텍스트 타이퍼 -->
        <div class="typer" id="h">
            <h1 class="typer-text" style="text-align: center">환영합니다. 개발자 이금락의 포트폴리오입니다.</h1>
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

        <script type="text/javascript">
            let typingBool = false;
            let typingIdx=0;
            let typingTxt = $(".typer-text").text(); // 타이핑될 텍스트를 가져온다
            typingTxt=typingTxt.split(""); // 한글자씩 자른다.
            if(typingBool==false){ // 타이핑이 진행되지 않았다면
                typingBool=true;

                let tyInt = setInterval(typing,100); // 반복동작
            }

            function typing(){
                if(typingIdx<typingTxt.length){ // 타이핑될 텍스트 길이만큼 반복
                    $(".typer-text").append(typingTxt[typingIdx]); // 한글자씩 이어준다.
                    typingIdx++;
                } else{
                    clearInterval(tyInt); //끝나면 반복종료
                }
            }
        </script>
    </body>
</html>