<meta charset="utf-8" />
<?php
    include '../DBConnect.php';

    //Post로 받은 데이터 가져오기
    $userId = $_POST['userId'];
    $nickName = $_POST['nickName'];
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    $sql = mq("INSERT INTO user (userId, nickName, userPassword, createDate, loginDate) VALUES ('$userId', '$nickName', '$userPassword', now(), now());");

    if ($sql == TRUE) {
        echo "<script type='text/javascript'>alert('회원가입이 완료됐습니다.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('회원가입에 실패했습니다.');</script>";
    }

    $db->close();

    echo("<script>location.replace('./signIn.php');</script>");
?>


