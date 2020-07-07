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
        <script src="https://unpkg.com/video.js/dist/video.js"></script>
        <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>

        <style>
            .chat{position:relative;border:1px solid #ddd;height:500px;}
            .chat form{position:absolute;bottom:0;left:0;width:100%;padding:10px;box-sizing:border-box;}
            .chat form input[type="text"]{border:0;padding:0 15px;height:35px;line-height:35px;width:calc(100% - 140px);box-sizing:border-box;outline:none;border-bottom:1px solid #ddd;}
            .chat form button{border:1px solid #ddd;background-color:#fff;color:#333;width:100px;height:35px;line-height:33px;margin-left:20px;}
            #messages{height:calc(500px - 58px);overflow-y:scroll;}
            #messages li{}
        </style>

        <script src="../node_modules/socket.io/lib/socket.js"></script>
        <script>
            var socket = io();
        </script>

        <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
        <script>
            $(function () {
                var socket = io();

                $('form').submit(function(e){
                    e.preventDefault(); // prevents page reloading ( 페이지 새로고침 막기 )
                    socket.emit('chat message', $('#m').val()); // "chat message"라는 이벤트 생성
                    $('#m').val(''); // 보낸 메세지 초기화
                    return false;
                });

                socket.on('chat message', function(msg){
                    var tag = "<li>" + msg + "</li>";
                    $('#messages').append(tag);
                });
            });
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

                <div class="chat">
                    <ul id="messages"></ul>
                    <form action="">
                        <input type="text" id="m" autocomplete="off" placeholder="입력해주세요 :D" /><button>전송</button>
                    </form>
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