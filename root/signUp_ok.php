<meta charset="utf-8" />
<?php
    include '../DBConnect.php';

    //Post로 받은 데이터 가져오기
    $userId = $_POST['userId'];
    $nickName = $_POST['nickName'];
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    // auto_increment 값 초기화
    $sql_InitIncrement = mq("alter table userInfo auto_increment =1");

    if($userId && $nickName && $userPassword) {
        $sql = mq("insert into userInfo (userId, nickName, userPassword, createDate, loginDate) values ('".$userId."', '".$nickName."', '".$userPassword."', now(), now())");
        echo "<script>alert('회원가입이 완료됐습니다.');</script>";
    }
    else {
        echo "<script>alert('회원가입에 실패했습니다.');</script>";
        echo "<script>location.replace('./signIn.php');</script>";
    }

?>


