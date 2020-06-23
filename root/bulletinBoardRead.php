<?php
    include "../DBConnect.php"; /* db load */
?>

<!doctype html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <?php
            $bno = $_GET['idxNum']; /* bno함수에 idx값을 받아와 넣음*/
            $hit = mysqli_fetch_array(mq("select * from bulletinBoard where idxNum ='".$bno."'"));
            $hit = $hit['hitNum'] + 1;
            $fet = mq("update bulletinBoard set hitNum = '".$hit."' where idxNum = '".$bno."'");
            $sql = mq("select * from bulletinBoard where idxNum='".$bno."'"); /* 받아온 idxNum값을 선택 */
            $board = $sql->fetch_array();
        ?>
        <!-- 글 불러오기 -->
        <div id="board_read">
            <h2><?php echo $board['title']; ?></h2>
            <div id="user_info">
                <?php echo $board['name']; ?> <?php echo $board['writeDate']; ?> 조회:<?php echo $board['hitNum']; ?>
                <div id="bo_line"></div>
            </div>
            <div id="bo_content">
                <?php echo nl2br("$board[content]"); ?>
            </div>
            <!-- 목록, 수정, 삭제 -->
            <div id="bo_ser">
                <ul>
                    <li><a href="/">[목록으로]</a></li>
                    <li><a href="./bulletinBoardModify.php?idx=<?php echo $board['idxNum']; ?>">[수정]</a></li>
                    <li><a href="./bulletinBoardDelete.php?idx=<?php echo $board['idxNum']; ?>">[삭제]</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>