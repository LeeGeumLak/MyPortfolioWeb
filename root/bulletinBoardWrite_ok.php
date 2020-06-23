<?php
    include "../DBConnect.php";

    //각 변수에 write.php에서 input name값들을 저장한다
    $username = $_POST['name'];
    $userpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    if($username && $userpassword && $title && $content){
        $sql = mq("insert into bulletinBoard (name,pw,title,content,writeDate) values('".$username."','".$$userpassword."','".$title."','".$content."','".$date."')");

        echo "<script>
        alert('글쓰기 완료되었습니다.');
        location.href='/';</script>";
    }else{
        echo "<script>
        alert('글쓰기에 실패했습니다.');
        history.back();</script>";
    }
?>