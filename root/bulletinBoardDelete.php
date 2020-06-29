<?php
    include "../DBConnect.php";

    $bno = $_GET['idxNum'];
    $sql = mq("delete from bulletinBoard where idxNum='$bno';");
?>

<!--<script type="text/javascript">
    alert("삭제되었습니다.");
</script>-->

<meta http-equiv="refresh" content="0 url=./bulletinBoard.php" />