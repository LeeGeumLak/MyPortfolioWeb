<?php
    include "../DBConnect.php";

    //각 변수에 write.php에서 input name값들을 저장한다
    $username = $_POST['name'];
    $userpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    date_default_timezone_set("Asia/Seoul");
    $date = date('Y-m-d H:i:s');

    if(issest($_POST['lockpost'])) {
        $lo_post = '1';
    } else {
        $lo_post = '0';
    }

    if($username && $userpassword && $title && $content){
        $sql = mq("insert into bulletinBoard (name,password,title,content,writeDate,lock_post) values('".$username."','".$userpassword."','".$title."','".$content."','".$date."','".$lo_post."')");

        echo "<script>
        alert('글쓰기 완료되었습니다.');
        location.href='./bulletinBoard.php';</script>";
    }else{
        echo "<script>
        alert('글쓰기에 실패했습니다.');
        history.back();</script>";
    }
?>