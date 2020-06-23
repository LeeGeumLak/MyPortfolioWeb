<?php
    include "../DBConnect.php";
?>
<!doctype html>
    <head>
        <?php include './header.php'?>
    </head>
    <body>
    <div id="board_area">
        <?php
            /* 검색 변수 */
            $catagory = $_GET['catgo'];
            $searchKeyword = $_GET['search'];
        ?>

        <h1><?php echo $catagory; ?>에서 '<?php echo $searchKeyword; ?>'검색결과</h1>
        <h4 style="margin-top:30px;"><a href="/">홈으로</a></h4>
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
            $sql_bulletinBoard = mq("select * from bulletinBoard where $catagory like '%$searchKeyword%' order by idxNum desc");
            while($board = $sql_bulletinBoard->fetch_array()){

                $title = $board["title"];
                if(strlen($title)>30) {
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
                $sql_comment = mq("select * from comment where bulletinNum='".$board['idxNum']."'");
                $comment_count = mysqli_num_rows($sql_comment);
                ?>
                <tbody>
                    <tr>
                        <td width="70"><?php echo $board['idxNum']; ?></td>
                        <td width="500">
                            <?php
                            $lockimg = "<img src='../img/lock.png' alt='lock' title='lock' with='20' height='20' />";

                            if($board['lock_post']=="1") {
                                ?><a href='./check_bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"];?>'><?php echo $title, $lockimg;
                            } else{ ?>
                                <?php
                                    $boardTime = $board['writeDate']; //$boardTime변수에 board['writeDate']값을 넣음

                                    date_default_timezone_set("Asia/Seoul");
                                    $timeNow = date('Y-m-d H:i:s'); //$timenow변수에 현재 시간 Y-M-D를 넣음

                                    if($boardTime == $timeNow) {
                                        $img = "<img src='../img/new.png' alt='new' title='new' />";
                                    } else {
                                        $img ="";
                                    }
                                ?>
                                <a href='./bulletinBoardRead.php?idx=<?php echo $board["idxNum"]; ?>'>
                                    <span style="background:yellow;"><?php echo $title; }?></span>
                                    <span class="re_ct">[<?php echo $comment_count;?>]<?php echo $img; ?> </span></a>
                        </td>

                        <td width="120"><?php echo $board['name']?></td>
                        <td width="100"><?php echo $board['date']?></td>
                        <td width="100"><?php echo $board['hit']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

        <div id="search_box_bottom">
            <form action="./searchResult.php" method="get">
                <select name="catgo">
                    <option value="title">제목</option>
                    <option value="name">작성자</option>
                    <option value="content">내용</option>
                </select>
                <input type="text" name="search" size="40" required="required"/> <button>검색</button>
            </form>
        </div>
    </div>
    </body>
</html>