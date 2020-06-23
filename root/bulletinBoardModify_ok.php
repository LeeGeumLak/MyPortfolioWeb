<?php
    include "../DBConnect.php";

    $bno = $_GET['idxNum'];
    $username = $_POST['name'];
    $userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = mq("update bulletinBoard set name='".$username."',pw='".$userpw."',title='".$title."',content='".$content."' where idxNum='".$bno."'");
?>

<script type="text/javascript"> alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=./bulletinBoardRead.php?idx=<?php echo $bno; ?>">