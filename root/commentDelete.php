<?php
    include "../DBConnect.php";

    ?><script type="text/javascript">
        alert('1');
    </script><?php

    $rno = $_POST['rno'];

    //comment 테이블에서 idxNum가 rno변수에 저장된 값을 찾음
    $sql_comment = mq("select * from comment where idxNum='".$rno."'");
    $comment = $sql_comment->fetch_array();

    $bno = $_POST['b_no'];

    ?><script type="text/javascript">
        alert('2');
    </script><?php

    //bulletinBoard 테이블에서 idxNum가 bno변수에 저장된 값을 찾음
    $sql_bulletinBoard = mq("select * from board where idxNum='".$bno."'");
    $board = $sql_bulletinBoard->fetch_array();

    $pwk = $_POST['password'];
    $bpw = $comment['password'];

    ?><script type="text/javascript">
        alert('3');
    </script><?php

if(password_verify($pwk, $bpw)) {
    ?><script type="text/javascript">
        alert('3');
    </script><?php

    $sql = mq("delete from comment where idxNum='".$rno."'"); ?>
    <script type="text/javascript">
        alert('댓글이 삭제되었습니다.');
        location.replace("./bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"];?>");
    </script>
    <?php
} else{ ?>
    <script type="text/javascript">
        alert('비밀번호가 틀립니다'); history.back();
    </script>
<?php } ?>


