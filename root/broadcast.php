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

        <style>
            .j-message {
                margin-bottom:50px;
            }
            .j-footer {
                width: 100%;
                height: 50px;
                position: fixed;
                bottom: 0;
                background-color:white;
                border-top:1px solid black;
            }
            table {
                height: 100%;
            }
        </style>
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

                <div class="j-message">

                </div>
                <div class="j-footer">

                    <table>
                        <tr>
                            <td width="100%">
                                <input id="message-input" class="form-control" type="text">
                            </td>
                            <td width="20%">
                                <button id="message-button" class="btn btn-default" type="submit">SEND</button>
                            </td>
                        </tr>
                    </table>

                </div>

                <script type="text/javascript" src="http://cdn.socket.io/socket.io-1.4.0.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <script>
                    var serverURL = 'https://lglportfolioweb.tk/broadcast.php';

                    var name = <? echo $nickName['nickName']; ?> ;
                    var room = '100';

                    var socket = null;

                    function writeMessage(type, name, message) {
                        var html = '<div>{MESSAGE}</div>';

                        var printName = '';
                        if(type === 'me') {
                            printName = name + ' : ';
                        }

                        html = html.replace('{MESSAGE}', printName + message);

                        $(html).appendTo('.j-message');
                        $('body').stop();
                        $('body').animate({scrollTop:$('body').height()}, 500);

                    }

                    function sender(text) {
                        socket.emit('user', {
                            name : name,
                            message : text
                        });
                        writeMessage('me', name, text);
                    }

                    $(document).ready(function() {
                        socket = io.connect(serverURL);

                        socket.on('connection', function(data) {
                            console.log('connect');
                            if(data.type === 'connected') {
                                socket.emit('connection', {
                                    type : 'join',
                                    name : name,
                                    room : room
                                });
                            }
                        });
                        socket.on('system', function(data) {
                            writeMessage('system', 'system', data.message);
                        });

                        socket.on('message', function(data) {
                            writeMessage('other', data.name, data.message);
                        });

                        $('#message-button').click(function() {

                            var $input = $('#message-input');

                            var msg = $input.val();
                            sender(msg);
                            $input.val('');
                            $input.focus();
                        });

                        $('#message-input').on('keypress', function(e) {

                            if(e.keyCode === 13) {

                                var $input = $('#message-input');

                                var msg = $input.val();
                                sender(msg);
                                $input.val('');
                                $input.focus();
                            }
                        });
                    });
                </script>
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