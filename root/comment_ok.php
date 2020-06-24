<?php
    include "../DBConnect.php";

    $bno = $_GET['idxNum'];
    $userpassword = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);

    if($bno && $_POST['dat_user'] && $userpassword && $_POST['content']){
        $sql = mq("insert into comment (bulletinNum, name, password, content) values ('".$bno."','".$_POST['dat_user']."','".$userpassword."','".$_POST['content']."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
            location.href='./bulletinBoardRead.php?idxNum=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
            history.back();</script>";
    }
?>