<?php
    include "../DBConnect.php";
    $rno = $_POST['rno'];//댓글번호

    //comment 테이블에서 idx가 rno변수에 저장된 값을 찾음
    $sql = mq("select * from comment where idxNum='".$rno."'");
    $comment = $sql->fetch_array();

    $bno = $_POST['b_no']; //게시글 번호

    //bulletinBoard 테이블에서 idxNum가 bno변수에 저장된 값을 찾음
    $sql_bulletinBoard = mq("select * from bulletinBoard where idxNum='".$bno."'");
    $board = $sql_bulletinBoard->fetch_array();

    $pwk = $_POST['password'];
    $bpw = $comment['password'];

    if(password_verify($pwk, $bpw)) {
        //comment 테이블의 idxNum가 rno변수에 저장된 값의 content를 선택해서 값 저장
        $sql_comment = mq("update comment set content='" . $_POST['content'] . "' where idxNum = '" . $rno . "'");
        ?>
        <script type="text/javascript">
            // alert('수정되었습니다.');
            location.replace("./bulletinBoardRead.php?idxNum=<?php echo $bno; ?>");
        </script>
        <?php
    } else { ?>
        <script type="text/javascript">
            alert('비밀번호가 틀립니다'); history.back();
        </script>
    <?php } ?>
