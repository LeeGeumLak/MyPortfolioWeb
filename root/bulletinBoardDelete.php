<?php
    include "../DBConnect.php";

    $bno = $_GET['idxNum'];

    // 삭제하는 게시판에 달린 댓글 삭제
    $sql_comment = mq("delete from comment where bulletinNum='$bno';");

    // 게시판 글 삭제
    $sql_bulletinBoard = mq("delete from bulletinBoard where idxNum='$bno';");

    // auto_increment 값 초기화
    $sql_InitIncrement = mq("alter table bulletinBoard auto_increment =1");
?>

<!--<script type="text/javascript">
    alert("삭제되었습니다.");
</script>-->

<meta http-equiv="refresh" content="0 url=./bulletinBoard.php" />