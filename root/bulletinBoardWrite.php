<!doctype html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <div id="board_write">
            <h1><a href="/"></a></h1>
            <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="bulletinBoardWrite_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <h1>제목 : </h1>
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <h1>작성자 : </h1>
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="password" id="upassword"  placeholder="비밀번호" required />
                    </div>
                    <div id="in_lock">
                        <input type="checkbox" value="1" name="lockpost"/>수정/삭제시 비밀번호를 입력해야합니다.
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
    </body>
</html>