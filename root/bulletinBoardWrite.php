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

        <div id="board_write" style="background-color: #f9f9ff; height: 750px">
            <h1><a href="/"></a></h1>
            <div id="write_area">
                <form action="bulletinBoardWrite_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <?php
                        session_start();

                        if(isset($_SESSION['userId'])) {
                            $sql = mq("select nickName from userInfo where userId='".$_SESSION['userId']."'");
                            $nickName = $sql->fetch_array(); ?>
                            <textarea name="name" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100" required><?php echo $nickName['nickName'] ?></textarea>
                            <?php
                        } else { ?>
                            <textarea name="name" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100" required></textarea>
                        <?php
                        } ?>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="password" id="upassword"  placeholder="비밀번호" required />
                    </div>
                    <div id="in_lock">
                        <input type="checkbox" value="1" name="lockpost"/>해당 글을 잠급니다.
                    </div>
                    <div id="in_file">
                        <input type="file" value="1" name="uploadFile"/>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include './footer.php'?>

    </body>
</html>