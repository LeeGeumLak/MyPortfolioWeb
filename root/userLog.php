<?php
    //쿠키가 존재하지 않는다면
    //if(!isset($_COOKIE['user_log_cookie'])){
        //쿠키생성
        //setcookie('user_log_cookie', true, time() + 60*30);

        //userLog정보 insert
        include '../DBConnect.php';

        //Post로 받은 데이터 가져오기
        session_start();
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        } else {
            $userId = '';
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $previousUrl = $_SERVER['HTTP_REFERER'];

        //현재 url 가져오기
        $httpHost = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
        $currentUrl = 'https://' . $httpHost . $requestUri;

        //들어온 ip의 국가 가져오기
        $key = "2020070616035390754922";
        $data_format = "json";
        $url = "http://whois.kisa.or.kr/openapi/ipascc.jsp?query=".$ip."&key=".$key."&answer=".$data_format."";

        echo "<script>console.log( '1' );</script>";

        $ch = curl_init();                                              //curl 초기화
echo "<script>console.log( '2' );</script>";

        curl_setopt($ch, CURLOPT_URL, $url);                      //URL 지정하기
echo "<script>console.log( '3' );</script>";

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     //요청 결과를 문자열로 반환
echo "<script>console.log( '4' );</script>";

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);       //connection timeout 10초
echo "<script>console.log( '5' );</script>";

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    //원격 서버의 인증서가 유효한지 검사 안함
echo "<script>console.log( '6' );</script>";

        $data = curl_exec($ch);
echo "<script>console.log( '7' );</script>";

        $decodeJsonData = json_decode($data, true);
echo "<script>console.log( '8' );</script>";

$country = $decodeJsonData['whois']['countryCode'];
echo "<script>console.log( '9' );</script>";

        curl_close($ch);

        echo "<script>console.log( '0' );</script>";

        // auto_increment 값 초기화
        $sql_autoIncrement = mq("alter table userLog auto_increment =1");

        echo "<script>console.log( '1' );</script>";

        $sql = mq("INSERT INTO userLog (userId, ip, country, previousUrl, currentUrl, accessDate) 
                VALUES (".$userId.", ".$ip.", ".$country.", ".$previousUrl.", ".$currentUrl.", now())");

        echo "<script>console.log( '2' );</script>";
    //}
?>