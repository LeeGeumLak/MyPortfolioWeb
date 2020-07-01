<?php
    include "../DBConnect.php";
    $rno = $_POST['rno'];

    console.log("commentDelete : comment table에서 값 가져오기 전");

    //comment 테이블에서 idxNum가 rno변수에 저장된 값을 찾음
    $sql_comment = mq("select * from comment where idxNum='".$rno."'");
    $comment = $sql_comment->fetch_array();

    $bno = $_POST['b_no'];

    console.log("commentDelete : 게시판 table에서 값 가져오기 전");

    //bulletinBoard 테이블에서 idxNum가 bno변수에 저장된 값을 찾음
    $sql_bulletinBoard = mq("select * from board where idxNum='".$bno."'");
    $board = $sql_bulletinBoard->fetch_array();

    $pwk = $_POST['password'];
    $bpw = $comment['password'];

console.log("commentDelete : 비밀번호 비교하기 전");

if(password_verify($pwk, $bpw)) {
    $sql = mq("delete from comment where idxNum='".$rno."'"); ?>
    <?php console.log("commentDelete : 댓글 삭제한 후");?>

    <!--<script type="text/javascript">
        alert('댓글이 삭제되었습니다.');
        location.replace("./bulletinBoardRead.php?idxNum=<?php /*echo $board["idxNum"];*/?>");
    </script>-->

    <?php
} else{ ?>
    <script type="text/javascript">
        alert('비밀번호가 틀립니다'); history.back();
    </script>
<?php } ?>