<!-- 게시판 삭제 -->
<?php
    include "../DBConnect.php";

    //$bno = $_GET['idxNum'];
    $bno = $_POST['b_no'];
    $sql = mq("select * from bulletinBoard where idxNum='".$bno."';"); /* 받아온 idxNum값을 선택 */
    $board = $sql->fetch_array();

    $pwk = $_POST['password'];
    $bpw = $board['password'];

    if(password_verify($pwk, $bpw)) {
        // 삭제하는 게시판에 달린 댓글 삭제
        $sql_comment = mq("delete from comment where bulletinNum='$bno';");

        // 댓글 auto_increment 값 초기화
        $sql_InitCommentIncrement = mq("alter table comment auto_increment =1");

        // 게시판 글 삭제
        $sql_bulletinBoard = mq("delete from bulletinBoard where idxNum='$bno';");

        // 게시판 auto_increment 값 초기화
        //$sql_InitBoardIncrement = mq("alter table bulletinBoard auto_increment =1");

        ?>

        <meta http-equiv="refresh" content="0 url=./bulletinBoard.php" />
        <?php
    } else{ ?>
        <script type="text/javascript">
            alert('비밀번호가 틀립니다'); history.back();
        </script> <?php
    } ?>

<!--<script type="text/javascript">
    alert("삭제되었습니다.");
</script>-->

