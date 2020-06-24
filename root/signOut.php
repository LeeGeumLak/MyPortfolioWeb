<?php
    session_start();
    echo $_SESSION['sessionUserId'].'님 로그아웃 하겠습니다.';
    unset($_SESSION['sessionUserId']);

    if($_SESSION['sessionUserId'] == null){
        echo '로그아웃 완료';
    }
?>