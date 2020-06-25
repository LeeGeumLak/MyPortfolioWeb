<?php
    include '../DBConnect.php';

    //Post로 받은 데이터 가져오기
    $nickName = $_POST['nickName'];

    $sql = "SELECT COUNT(*) FROM userInfo WHERE nickName = '$nickName'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    echo(json_encode(array("result" => $row["COUNT(*)"])));

    $db->close();
?>