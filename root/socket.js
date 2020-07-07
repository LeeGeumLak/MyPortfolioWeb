var app = require('express')(); // express라는 모듈을 요청하여 http객체에 담아 핸들링
var http = require('http').createServer(app); // 서버 생성 및 제어
var io = require('socket.io')(http); // http에 socket.io 인스턴스로 초기화

app.get('./broadcast.php', function(req, res){
    // path의 파일을 읽고 해당 내용을 클라이언트로 전송
    res.sendFile(__dirname + '/broadcast.php');
});

// connect event
io.on('connection', function(socket){
    console.log('user connected');

    // disconnect event
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });

    // 메세지 받기
    socket.on('chat message', function(msg){
        console.log('message: ' + msg);

        // 브로드 캐스팅
        io.emit('chat message', msg);
    });
});

http.listen(3000, function(){ // http 서버가 포트 3000에서 수신 대기
    console.log('listening on *:3000');
});