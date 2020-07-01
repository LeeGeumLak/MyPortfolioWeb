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
            $bno = $_GET['idxNum']; /* bno함수에 idxNum 값을 받아와 넣음*/
            $hit = mysqli_fetch_array(mq("select * from bulletinBoard where idxNum ='".$bno."'"));
            $hit = $hit['hitNum'] + 1;
            $fet = mq("update bulletinBoard set hitNum = '".$hit."' where idxNum = '".$bno."'");
            $sql = mq("select * from bulletinBoard where idxNum='".$bno."'"); /* 받아온 idxNum값을 선택 */
            $board = $sql->fetch_array();
        ?>

        <div style="background-color: #f9f9ff; width: 1000px">
            <!-- 글 불러오기 -->
            <div id="board_read">
                <h2 style="font-size: 50px"><br><?php echo $board['title'];?></h2>
                <div id="user_info">
                    <?php echo $board['name']; ?>    ( <?php echo $board['writeDate']; ?> / 조회 : <?php echo $board['hitNum']; ?> )
                    <div id="bo_line"></div>
                </div>
                <div id="bo_content" style="font-size: 40px">
                    <?php echo nl2br("$board[content]"); ?>
                    <div id="bo_line"></div>
                </div>
                <div style="font-size: 18px; margin-top: 30px">
                    파일 : <a href="../upload/<?php echo $board['file'];?>" type="text/html" download><?php echo $board['file']; ?></a>
                </div>
                <!-- 목록, 수정, 삭제 -->
                <div id="bo_ser">
                    <ul>
                        <li><a href="./bulletinBoard.php" style="font-size: 18px">[목록으로]</a></li>
                        <!--<li><a href="./bulletinBoardModify.php?idxNum=<?php /*echo $board['idxNum']; */?>" style="font-size: 18px">[수정]</a></li>
                        <li><a href="./bulletinBoardDelete.php?idxNum=<?php /*echo $board['idxNum']; */?>" style="font-size: 18px">[삭제]</a></li>-->
                        <li>
                            <div class="dap_lo">
                                <div class="comment_me comment_menu " style="text-align: right">
                                    <a class="dat_edit_bt" href="#" style="font-size: 18px">[수정]</a>
                                    <a class="dat_delete_bt" href="#" style="font-size: 18px">[삭제]</a>
                                </div>
                                <!-- 댓글 수정 폼 dialog -->
                                <div class="dat_edit">
                                    <form method="post" action="bulletinBoardModify.php?idxNum=<?php echo $board['idxNum']; ?>">
                                        <input type="hidden" name="rno" value="<?php echo $comment['idxNum']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                                        <input type="password" name="password" class="dap_sm" placeholder="비밀번호" />
                                        <textarea name="content" class="dap_edit_t"><?php echo $comment['content']; ?></textarea>
                                        <input type="submit" value="수정하기" class="comment_modify_btn">
                                    </form>
                                </div>
                                <!-- 댓글 삭제 비밀번호 확인 -->
                                <div class="dat_delete">
                                    <form action="bulletinBoardDelete.php?idxNum=<?php echo $board['idxNum']; ?>" method="post">
                                        <input type="hidden" name="rno" value="<?php echo $comment['idxNum']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                                        <p>비밀번호<input type="password" name="password" /><input type="submit" value="확인"></p>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--- 댓글 입력 폼 -->
            <div class="dap_ins">
                <form action="comment_ok.php?idxNum=<?php echo $bno; ?>" method="post">
                    <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" style="font-size: 17px" placeholder="아이디">
                    <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" style="font-size: 17px" placeholder="비밀번호">
                    <div style="margin-top:10px; font-size: 17px">
                        <textarea name="content" class="comment_content" id="comment_content"></textarea>
                        <button id="comment_bt" class="comment_btn">댓글</button>
                    </div>
                </form>
            </div>

            <!--- 댓글 불러오기 -->
            <div class="comment_view">
                <h3 style="font-size: 30px">댓글목록</h3>
                <?php
                $sql_comment = mq("select * from comment where bulletinNum='".$bno."' order by idxNum asc");
                while($comment = $sql_comment->fetch_array()){
                    ?>
                    <div class="dap_lo">
                        <div><b style="font-size: 17px"><?php echo $comment['name'];?></b></div>
                        <div class="dap_to comment_edit" style="font-size: 20px"><?php echo nl2br("$comment[content]"); ?></div>
                        <div class="comment_me dap_to" style="text-align: right; font-size: 17px"><?php echo $comment['writeDate']; ?></div>
                        <div class="comment_me comment_menu " style="text-align: right">
                            <a class="dat_edit_bt" href="#" style="font-size: 17px">수정</a>
                            <a class="dat_delete_bt" href="#" style="font-size: 17px">삭제</a>
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
                        <div class="dat_delete">
                            <form action="commentDelete.php" method="post">
                                <input type="hidden" name="rno" value="<?php echo $comment['idxNum']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                                <p>비밀번호<input type="password" name="password" /><input type="submit" value="확인"></p>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div id="foot_box"></div>

        <?php include './footer.php'?>

        </div>
    </body>
</html>