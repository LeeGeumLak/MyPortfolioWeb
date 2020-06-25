<?php
    include '../DBConnect.php';

    //Post로 받은 데이터 가져오기
    $userId = $_POST['userId'];

    $sql = "SELECT COUNT(*) FROM user WHERE userID = '{$userId}'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    echo(json_encode(array("result" => $row["COUNT(*)"])));

    $db->close();
?>