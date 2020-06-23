<?php
    include '../DBConnect.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--  소통할 수 있는 게시판   -->
        <div class="section-container">
            <div class="bulletinBoard-area" id="bulletinBoard">
                <div class="title">Bullentin Board<br>자유롭게 의견을 나누는 공간입니다.</div>
            </div>
        </div>

        <div id="board-area">
            <table class="list-table">
                <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성 날짜</th>
                    <th width="100">조회수</th>
                </tr>
                </thead>

                <?php
                // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                $sql = mq("select * from bulletinBoard order by idxNum desc limit 0,5");
                while($board = $sql->fetch_array()) {
                    //title변수에 DB에서 가져온 title을 선택
                    $title=$board["title"];
                    if(strlen($title)>30) {
                        //title이 30을 넘어서면 생략(...)표시
                        $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }

                    // 댓글의 개수 카운트
                    $sql_comment = mq("select * from comment where bulletinNum='".$board['idxNum']."'"); //comment 테이블에서 bulletinNum이 board의 idxNum와 같은 것을 선택
                    $comment_count = mysqli_num_rows($sql_comment); //num_rows로 정수형태로 출력
                    ?>
                    <tbody>
                        <tr>
                            <td width="70"><?php echo $board['idxNum']; ?></td>
                            <td width="500"><?php
                                $lockimg = "<img src='../img/lock.png' alt='lock' title='lock' with='20' height='20' />";

                                if($board['lock_post']=="1") {
                                    ?><a href='./check_bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"];?>'><?php echo $title, $lockimg;
                                } else{  ?>
                                    <a href='./bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"]; ?>'><?php echo $title;}?><span class="re_ct">[<?php echo $comment_count; ?>]</span></a>
                            </td>

                            <td width="120"><?php echo $board['name']?></td>
                            <td width="100"><?php echo $board['writeDate']?></td>
                            <td width="100"><?php echo $board['hitNum']; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>

            <div id="write_btn">
                <a href="./bulletinBoardWrite.php"><button>글쓰기</button></a>
            </div>
        </div>

        <?php include './footer.php'?>

        <div id="portfolioModal" class="modal"b>
            <span class="close" id="modalClose">&times;</span>
            <div class="container">
                <img id="modalImage">
                <div id="modalMain" class="modal-main"></div>
                <div id="modalSub" class="modal-sub"></div>
                <div id="modalText" class="modal-text"></div>
            </div>
        </div>

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>

    </body>
</html>