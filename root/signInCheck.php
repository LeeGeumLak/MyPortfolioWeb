<?php
    include '../DBConnect.php';
    include '../password.php';

    header("Content-Type: application/json");
    $method = $_SERVER['REQUEST_METHOD'];
    $userId = "";
    $userPassword = "";

    // 로그인 과정은 post 방식으로 진행
    //자바스크립트 객체 또는 serialize() 로 전달
    if($method == "POST") {
        $userId = $_POST['userId'];
        $userPassword = $_POST['userPassword'];

        $sql = mq("SELECT * FROM userInfo WHERE userId =='".$userId."')");
        //$result = $db->query($sql);

        //해당하는 아이디가 존재할경우
        if ($sql->num_rows == 1) {
            //각행 1개씩 꺼내기
            while ($row = $sql->fetch_assoc()) {
                //로그인 성공(패스워드 일치)
                if (password_verify($userPassword, $row['userPassword'])) {
                    //session 설정
                    session_start();
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['nickName'] = $row['nickName'];
                    echo(json_encode(array("result" => true, 'userId' => $_SESSION['userId'])));
                //로그인 실패(패스워드 불일치)
                } else {
                    echo(json_encode(array("result" => false)));
                }
            }
            //해당하는 아이디가 아예 없을 경우
        } else {
            echo(json_encode(array("result" => false)));
        }
    } else {
        console.log("signInCheck.php :: 로그인 체크 오류(POST 방식이 아님)");
        echo(json_encode(array("result" => false)));
    }
?>
