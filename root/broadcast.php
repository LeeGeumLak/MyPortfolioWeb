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
        // do nothing
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>

        <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
        <script src="node_modules/socket.io-client/dist/socket.io.js"></script>
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="https://unpkg.com/video.js/dist/video.js"></script>
        <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>

        <style>
            #container {
                width: 400px;
                border: 1px dotted #000;
                padding: 10px;
                height: 328px;
            }
            #chatBox {
                border: 1px solid #000;
                width: 400px;
                height: 300px;
                margin-bottom: 5px;
            }
            #chat li {
                padding: 5px 0px;
            }
            #name {
                width: 78px;
            }
            #msg {
                width: 256px;
            }
        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>
        <script type="text/javascript">
            window.onload = function(){
                var socket = io.connect();
                if(socket != null && socket != undefined){
                    var welcome = document.createElement('li');
                    welcome.innerHTML = '<system> Start Chatting';
                    document.getElementById('chat').appendChild(welcome);

                    socket.on('rMsg', function(data){
                        var li = document.createElement('li');
                        li.innerHTML = data.name + ' : ' + data.msg;
                        document.getElementById('chat').appendChild(li);
                    });

                    document.getElementById('submit').onclick = function(){
                        var val = document.getElementById('msg').value;
                        var name = document.getElementById('name').value;
                        socket.emit('sMsg', {
                            name : name,
                            msg : val
                        });
                        document.getElementById('msg').value = '';
                    };

                }
            };
        </script>

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

                <div id="container">
                    <div id="chatBox">
                        <ul id="chat"></ul>
                    </div>
                    <input type="text" id="name"/>
                    <input type="text" id="msg"/>
                    <button id="submit">Chat</button>
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
    </body>
</html>