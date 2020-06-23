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
        $lock_post = '1';
    } else {
        $lock_post = '0';
    }

    $file = $_FILES['uploadFile']['fileName'];
    $o_name = $_FILES['uploadFile']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['uploadFile']['name']);
    $folder = "../upload/".$filename;
    move_uploaded_file($file, $folder);

    // auto_increment 값 초기화
    $sql_InitIncrement = mq("alter table bulletinBoard auto_increment =1");

    if($username && $userpassword && $title && $content){
        $sql = mq("insert into bulletinBoard (name,password,title,content,writeDate,lock_post) values('".$username."','".$userpassword."','".$title."','".$content."','".$date."','".$lock_post."','".$o_name."')");

        echo "<script>
        alert('글쓰기 완료되었습니다.');
        location.href='./bulletinBoard.php';</script>";
    }else{
        echo "<script>
        alert('글쓰기에 실패했습니다.');
        history.back();</script>";
    }
?>