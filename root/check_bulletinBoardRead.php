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
    $sql = mq("select * from bulletinBoard where idxNum='".$bno."'"); /* 받아온 idxNum값을 선택 */
    $board = $sql->fetch_array();
?>

<div id='writepass'>
    <form action="" method="post">
        <p>비밀번호<input type="password" name="passwordCheck" /> <input type="submit" value="확인" /> <input type="cancel" value="취소" /> </p>
    </form>
</div>

<?php
    session_start();
    // admin 로그인 세션 있을때
    if(isset($_SESSION['userId'])){
        if($_SESSION['userId'] == 'admin@naver.com') {?>
            <script type="text/javascript">
                location.replace("./bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"]; ?>");
            </script> <?php
        }
    }
    else {
        $bpw = $board['password'];

        if(isset($_POST['passwordCheck'])) { //만약 password_check POST값이 있다면
            $pwk = $_POST['passwordCheck']; // $pwk변수에 POST값으로 받은 password_check 을 넣습니다.
            if(password_verify($pwk,$bpw)) { //다시 if문으로 DB의 password와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
                $pwk == $bpw;
                ?>
                <!-- pwk와 bpw값이 같으면 bulletinBoardRead.php로 전송 -->
                <script type="text/javascript">
                    location.replace("./bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"]; ?>");
                </script>
                <?php
            } else { ?>
                <!--- 아니면 비밀번호가 틀리다는 메시지 표시 -->
                <script type="text/javascript">
                    alert('비밀번호가 틀립니다');
                    location.replace("./bulletinBoard.php?page=<?php echo $board["idxNum"]; ?>");
                </script>
                <?php
            }
        }
    }?>