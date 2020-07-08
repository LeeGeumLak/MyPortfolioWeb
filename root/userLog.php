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

        $ip = $_SERVER["REMOTE_ADDR"];
        $previousUrl = $_SERVER['HTTP_REFERER'];

        //현재 url 가져오기
        $httpHost = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
        $currentUrl = 'https://' . $httpHost . $requestUri;

        /*//들어온 ip의 국가 가져오기
        $key = "2020070816443623534404";
        $data_format = "json";
        $url = "http://whois.kisa.or.kr/openapi/ipascc.jsp?query=$ip&key=$key&answer=$data_format";

        $ch = curl_init();                                              //curl 초기화
        curl_setopt($ch, CURLOPT_URL, $url);                      //URL 지정하기
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     //요청 결과를 문자열로 반환
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);       //connection timeout 10초
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    //원격 서버의 인증서가 유효한지 검사 안함

        $data = curl_exec($ch);

        $decodeJsonData = json_decode($data, true);
        $country = $decodeJsonData['whois']['countryCode'];
        curl_close($ch);*/

        $details = json_decode(file_get_contents("http://ipinfo.io/"));
        $country = $details->country;

        echo "<script> console.log('country :  ".$country."') </script>";

        // auto_increment 값 초기화
        $sql_autoIncrement = mq("alter table userLog auto_increment =1");

        date_default_timezone_set("Asia/Seoul");
        $date = date('Y-m-d H:i:s');

        $sql = mq("INSERT INTO userLog(userId, ip, country, previousUrl, currentUrl, accessDate) 
                VALUES ('".$userId."', '".$ip."', '".$country."', '".$previousUrl."', '".$currentUrl."', '".$date."' )");

    //}
?>