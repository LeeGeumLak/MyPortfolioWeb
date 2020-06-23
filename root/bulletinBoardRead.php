<?php
    include "../DBConnect.php"; /* db load */
?>

<!doctype html>
    <head>
        <?php include './header.php'?>
        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>
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
            <div>
                파일 : <a href="../upload/<?php echo $board['file'];?>" type="text/html" download><?php echo $board['file']; ?></a>
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

        <!--- 댓글 불러오기 -->
        <div class="comment_view">
            <h3>댓글목록</h3>
            <?php
            $sql_comment = mq("select * from comment where bulletinNum='".$bno."' order by idxNum desc");
            while($comment = $sql_comment->fetch_array()){
                ?>
                <div class="dap_lo">
                    <div><b><?php echo $comment['name'];?></b></div>
                    <div class="dap_to comment_edit"><?php echo nl2br("$comment[content]"); ?></div>
                    <div class="comment_me dap_to"><?php echo $comment['writeDate']; ?></div>
                    <div class="comment_me comment_menu">
                        <a class="dat_edit_bt" href="#">수정</a>
                        <a class="dat_delete_bt" href="#">삭제</a>
                    </div>
                    <!-- 댓글 수정 폼 dialog -->
                    <div class="dat_edit">
                        <form method="post" action="commentModify_ok.php">
                            <input type="hidden" name="rno" value="<?php echo $comment['idxNum']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                            <input type="password" name="password" class="dap_sm" placeholder="비밀번호" />
                            <textarea name="content" class="dap_edit_t"><?php echo $comment['content']; ?></textarea>
                            <input type="submit" value="수정하기" class="comment_modify_btn">
                        </form>
                    </div>
                    <!-- 댓글 삭제 비밀번호 확인 -->
                    <div class='dat_delete'>
                        <form action="commentDelete.php" method="post">
                            <input type="hidden" name="rno" value="<?php echo $comment['idxNum']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                            <p>비밀번호<input type="password" name="password" /> <input type="submit" value="확인"></p>
                        </form>
                    </div>
                </div>
            <?php } ?>

            <!--- 댓글 입력 폼 -->
            <div class="dap_ins">
                <form action="comment_ok.php?idxNum=<?php echo $bno; ?>" method="post">
                    <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
                    <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
                    <div style="margin-top:10px; ">
                        <textarea name="content" class="comment_content" id="comment_content" ></textarea>
                        <button id="comment_bt" class="comment_btn">댓글</button>
                    </div>
                </form>
            </div>
        </div><!--- 댓글 불러오기 끝 -->

        <div id="foot_box"></div>

        </div>
    </body>
</html>