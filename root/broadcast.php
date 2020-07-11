<!--세션확인하기-->
<?php
    session_start();
    //로그인 세션 없을때, 로그인 페이지로 이동
    if(!isset($_SESSION['userId'])) { ?>
        <script type="text/javascript">
            alert('방송 시청은 로그인을 해야 가능합니다.');
        </script>
        <?php
        echo("<script>location.href='./signIn.php';</script>");
    //로그인 세션 있을때, 방송 페이지 접근
    } else {
        // 접근한 유저의 닉네임 가져오기
        $sql = mq("select nickName from userInfo where userId='".$_SESSION['userId']."'");
        $nickName = $sql->fetch_array();
        // 유저 닉네임 == $nickName['nickName']
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--  방송 화면을 넣을 예정  -->
        <div class="section-container" style="max-width: 1300px">
            <div class="about-area" id="about" style="background-color: #f9f9ff">
                <div class="title">
                    BROADCAST
                </div>

                <div class="app__wrap">
                    <div id="info" class="app__info"></div>
                    <div id="chatWindow" class="app__window"></div>
                    <div class="app__input__wrap">
                        <input id="chatInput" type="text" class="app__input" autofocus placeholder="대화를 입력해주세요.">
                        <button id="chatMessageSendBtn" class="app__button">전송</button>
                    </div>
                </div>

            </div>
        </div>

        <?php
            if($_SESSION['userId'] == 'admin@naver.com') {?>
                <div style="position: fixed; bottom: 100px; right: -300px; color: #ffffff;">
                    <a href="#"><img style="width: 30%; height: 30%; cursor: pointer" src="../img/broadcast.png" title="방송하기"></a>
                </div>
                <?php
            }
        ?>

        <?php include './footer.php'?>

        <script src="../js/myPortfolioWeb.js"></script>
        <script src="../js/broadcast.js"></script>
        <script src="/socket.io/socket.io.js"></script>

    </body>
</html>