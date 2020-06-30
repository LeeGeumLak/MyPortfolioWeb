<!--- 게시글 수정 -->
<?php
    include "../DBConnect.php"; /* db load */
?>

<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
        $("#writepass").dialog({
            modal:true,
            title:'비밀글입니다.',
            width:400,
        });
    });
</script>
<?php
    $bno = $_GET['idxNum']; /* bno함수에 idx값을 받아와 넣음*/
    $sql = mq("select * from bulletinBoard where idxNum='$bno';"); /* 받아온 idxNum값을 선택 */
    $board = $sql->fetch_array();
?>

<!doctype html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
    <!--  최상단 네비게이션바     -->
    <?php include './topPart.php'?>

    <div id='writepass'>
        <form action="" method="post">
            <p>비밀번호<input type="password" name="passwordCheck" /> <input type="submit" value="확인" /></p>
        </form>
    </div>

    <?php
        $bpw = $board['password'];

        if(isset($_POST['passwordCheck'])) { //만약 password_check POST값이 있다면
            $pwk = $_POST['passwordCheck']; // $pwk변수에 POST값으로 받은 password_check 을 넣습니다.
            if(password_verify($pwk,$bpw)) { //다시 if문으로 DB의 password와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
                //pwk와 bpw값이 같으면 board_write 진행
                $pwk == $bpw;
            } else { ?>
                <!--- 아니면 비밀번호가 틀리다는 메시지 표시 -->
                <script type="text/javascript">
                    alert('비밀번호가 틀립니다');
                    history.back();
                </script>
                <?php
            }
        }
    ?>

    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
        <div id="write_area">
            <form action="bulletinBoardModify_ok.php?idxNum=<?php echo $bno; ?>" method="post">
                <div id="in_title">
                    <h1>제목 : </h1>
                    <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_name">
                    <h1>작성자 : </h1>
                    <textarea name="name" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100" required><?php echo $board['name']; ?></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_content">
                    <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                </div>
                <div id="in_pw">
                    <input type="password" name="password" id="upassword"  placeholder="비밀번호" required />
                </div>
                <div class="bt_se">
                    <button type="submit">글 작성</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>