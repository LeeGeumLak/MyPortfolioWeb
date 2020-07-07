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

        <script src="../node_modules/socket.io-client/dist/socket.io.js"></script>
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-auto offset-2">
                            <input type="text" id="name"><?php echo $nickName['nickName'] ?><br>
                            <textarea rows="20" cols="40" id="chatRoom"></textarea><br>
                            <input type="text" class="col-9" id="chatInput">
                            <input type="button" class="btn btn-sm btn-info" value="보내기" onclick="sendMsg()">
                        </div>
                        <!-- 접속자 명단 -->
                        <div class="col col-lg-2">
                            <label for="userlist">접속자 목록</label>
                            <div id="userlist" class="bg-white" style="height: 400px; border:1px solid black; overflow: auto"></div>
                        </div>
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

        <script type="text/javascript">
            // 소켓을 연결
            const socket = io.connect(':3000');

            // 서버에서 전달한 데이터가 있을 때 실행되는 이벤트 리스너
            //receiveMessage 이벤트를 전달받으면 msg.comment를 클라이언트 콘솔에 출력+chatRoom(textarea)에 누적 출럭
            socket.on('receiveMessage', function (msg) {
                console.log(msg.comment)
                $('#chatRoom').append(msg.comment);
                // TODO: 스크롤 자동으로 내려가도록 하기
                // $('#chatRoom').scrollTop($('#chatRoom')[0].scrollHeight);
            });
            // 새로 접속한 유저에게 user+n 의 새 이름을 배정한다
            socket.on('changeName', function(name){
                let userName = name;
                console.log('name: ', userName);
                $('#name').val(userName);

            });

            let userList = [];
            socket.on('update', function(users){
                userList = users;
                console.log('userList: ', userList);
                // 업데이트를 하기 전 중첩을 방지하기 위해서 이미 출력되어있던 텍스트를 지운다
                $('#userlist').empty();
                for(let i=0; i < userList.length; i++){
                    $('#userlist').append(userList[i].name +'</br>')
                }
            });

            // 보내기 버튼의 클릭이벤트. 소켓의 데이터를 보낸다.
            // comment라는 변수에 input태그(채팅입력창)값을 담아서 전송한 뒤 입력창 내용은 지운다
            function sendMsg() {
                socket.emit('sendMessage', { comment: $('#chatInput').val() });
                console.log(comment);
                $('#chatInput').empty();
                $('#chatInput').focus();
            }
        </script>
    </body>
</html>