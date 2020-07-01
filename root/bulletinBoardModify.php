<!--- 게시글 수정 -->
<?php
    include "../DBConnect.php"; /* db load */

    //$bno = $_GET['idxNum']; /* bno함수에 idx값을 받아와 넣음*/
    $bno = $_POST['b_no'];
    $sql = mq("select * from bulletinBoard where idxNum='".$bno."';"); /* 받아온 idxNum값을 선택 */
    $board = $sql->fetch_array();

    $pwk = $_POST['password'];
    $bpw = $board['password'];

    if(password_verify($pwk, $bpw)) { ?>
        <!doctype html>
            <head>
                <?php include './header.php'?>
            </head>

            <body>
                <!--  최상단 네비게이션바     -->
                <?php include './topPart.php'?>

                <div id="board_write" style="background-color: #f9f9ff; height: 850px">
                    <div id="write_area">
                        <form action="bulletinBoardModify_ok.php?idxNum=<?php echo $bno; ?>" method="post">
                            <div id="in_title">
                                <h1 style="font-size: 2em">제목 : </h1>
                                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                            </div>
                            <div class="wi_line"></div>
                            <div id="in_name">
                                <h1 style="font-size: 2em">작성자 : </h1>
                                <textarea name="name" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100" required><?php echo $board['name']; ?></textarea>
                            </div>
                            <div class="wi_line"></div>
                            <div id="in_content">
                                <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                            </div>
                            <div id="in_pw">
                                <input type="password" name="password" id="upassword"  placeholder="비밀번호" required/>
                            </div>
                            <div class="bt_se">
                                <button type="submit">글 작성</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php include './footer.php'?>

            </body>
        </html> <?php
    } else{ ?>
        <script type="text/javascript">
            alert('비밀번호가 틀립니다'); history.back();
        </script>
    <?php } ?>