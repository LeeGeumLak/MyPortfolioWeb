<!--세션확인하기-->
<?php
    /*session_start();
    //로그인 세션 없을때, 로그인 페이지로 이동
    if(!isset($_SESSION['userId'])) { */?><!--
        <script type="text/javascript">
            alert('방송 시청은 로그인을 해야 가능합니다.');
        </script>
        --><?php
/*        echo("<script>location.href='./signIn.php';</script>");
    //로그인 세션 있을때, 방송 페이지 접근
    } else {
        // 접근한 유저의 닉네임 가져오기
        $sql = mq("select nickName from userInfo where userId='".$_SESSION['userId']."'");
        $nickName = $sql->fetch_array();
        // 유저 닉네임 == $nickName['nickName']
    }*/
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>

        <style>
            #container {
                width: 400px;
                height: 400px;
                border: 1px solid black;
                background: ivory;
            }
            #chatView {
                height: 90%;
                overflow-y: scroll;
            }
            #chatForm {
                height: 10%;
                border-top: 1px solid black;
                text-align: center;
            }
            #msg {
                width: 80%;
                height: 32px;
                border-radius: 8px;
            }
            #send {
                width: 16%;
                height: 34px;
                border-radius: 50px;
                background: black;
                color: white;
            }
            .msgLine {
                margin: 15px;
            }
            .msgBox {
                border: 1px solid black;
                background: skyblue;
                padding: 2px 5px;
                border-radius: 10px;
            }
        </style>

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

                <div id="chatView"></div>
                <form id="chatForm" onsubmit="return false">
                    <input type="text" id="msg">
                    <input type="submit" id="send" value="전송">
                </form>
            </div>
        </div>

        <?php
/*            if($_SESSION['userId'] == 'admin@naver.com') {*/?><!--
                <div style="position: fixed; bottom: 100px; right: -300px; color: #ffffff;">
                    <a href="#"><img style="width: 30%; height: 30%; cursor: pointer" src="../img/broadcast.png" title="방송하기"></a>
                </div>
                --><?php
/*            }
        */?>

        <?php include './footer.php'?>

        <script src="../js/myPortfolioWeb.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/socket.io/socket.io.js"></script>

        <script>
            var socket = io();

            var chatView = document.getElementById('chatView');
            var chatForm = document.getElementById('chatForm');

            chatForm.addEventListener('submit', function() {
                var msg = $('#msg');

                if (msg.val() == '') {
                    return;

                } else {
                    socket.emit('SEND', msg.val());

                    var msgLine = $('<div class="msgLine">');
                    var msgBox = $('<div class="msgBox">');

                    msgBox.append(msg.val());
                    msgBox.css('display', 'inline-block');

                    msgLine.css('text-align', 'right');
                    msgLine.append(msgBox);

                    $('#chatView').append(msgLine);

                    msg.val('');
                    chatView.scrollTop = chatView.scrollHeight;
                }
            });

            socket.on('SEND', function(msg) {
                var msgLine = $('<div class="msgLine">');
                var msgBox = $('<div class="msgBox">');

                msgBox.append(msg);
                msgBox.css('display', 'inline-block');

                msgLine.append(msgBox);
                $('#chatView').append(msgLine);

                chatView.scrollTop = chatView.scrollHeight;
            });
        </script>


    </body>
</html>