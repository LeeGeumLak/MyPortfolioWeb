<?php
    include "../DBConnect.php";
?>
<!doctype html>
    <head>
        <?php include './header.php'?>
    </head>
    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <div id="board_area" style="background-color: #f9f9ff">
            <?php
                /* 검색 변수 */
                $catagory = $_GET['catgo'];
                $searchKeyword = $_GET['search'];
            ?>

            <h1 style="font-size: 20px; margin-top: 20px">
                <?php echo $catagory; ?>에서 '<?php echo $searchKeyword; ?>' 검색결과
            </h1>
            <h4 style="margin-top:30px;"><a href="./bulletinBoard.php">홈으로</a></h4>
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
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $sql = mq("select * from bulletinBoard where $catagory like '%$searchKeyword%' order by idxNum desc");
                $rowNum = mysqli_num_rows($sql); // 총 게시판 글 수
                $list = 5; // 한 페이지에 보여줄 개수

                $paginationCnt = 5; // 하나의 pagination 당 보여줄 페이지의 개수
                $paginationNum = ceil($page/$paginationCnt);
                $paginationStart = (($paginationNum-1) * $paginationCnt) + 1; // 한 pagination 시작
                $paginationEnd = $paginationStart + $paginationCnt - 1; // 한 pagination 끝
                $totalPage = ceil($rowNum / $list); // 페이징한 페이지의 총 개수

                // 한 pagination의 끝 번호가 totalPage 보다 클 때, 끝 번호를 지정할 수 있다.
                //(총 페이지 개수로)
                if($paginationEnd > $totalPage) {
                    $paginationEnd = $totalPage;
                }

                // pagination 의 총 개수
                $totalPagination = ceil($totalPage / $paginationCnt);
                $startNum = ($page - 1) * $list;

                $sql_bulletinBoard = mq("select * from bulletinBoard where $catagory like '%$searchKeyword%' order by idxNum desc limit $startNum, $list");
                while($board = $sql_bulletinBoard->fetch_array()){
                    //title변수에 DB에서 가져온 title을 선택
                    $title = $board["title"];
                    if(strlen($title)>30) {
                        //title이 30을 넘어서면 생략(...)표시
                        $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }

                    // 댓글의 개수 카운트
                    $sql_comment = mq("select * from comment where bulletinNum='".$board['idxNum']."'");
                    $comment_count = mysqli_num_rows($sql_comment);
                    ?>
                    <tbody>
                        <tr>
                            <td width="70"><?php echo $board['idxNum']; ?></td>
                            <td width="500">
                                <?php
                                $lockimg = "<img src='../img/lock.png' alt='lock' title='lock' style='width: 20px; height: 20px'/>";
                                if($board['lock_post']=="1") { ?>
                                    <a href='./check_bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"];?>'><?php echo $title, $lockimg;
                                } else{
                                    /*$boardTime = $board['writeDate']; //$boardTime변수에 board['writeDate']값을 넣음

                                    date_default_timezone_set("Asia/Seoul");
                                    $timeNow = date('Y-m-d H:i:s'); //$timenow변수에 현재 시간 Y-M-D를 넣음
                                    if($boardTime == $timeNow) {
                                        $img = "<img src='../img/new.png' alt='new' title='new' />";
                                    } else {
                                        $img ="";
                                    }*/ ?>
                                    <a href='./bulletinBoardRead.php?idxNum=<?php echo $board["idxNum"]; ?>'>
                                    <span style="background:yellow;"><?php echo $title; }?></span>
                                    <span class="re_ct">[<?php echo $comment_count;?>]<?php /*echo $img; */?> </span></a>
                            </td>

                            <td width="120"><?php echo $board['name']?></td>
                            <td width="100"><?php echo $board['writeDate']?></td>
                            <td width="100"><?php echo $board['hitNum']; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>

            <!---페이징 넘버 --->
            <div id="page_num">
                <ul>
                    <?php
                    if($page <= 1) {
                        // 현재 page가 가장 처음 페이지이면, '처음' 글자에 빨간색 표시
                        echo "<li class='fo_re'>처음</li>";
                    } else{
                        // 현재 page가 가장 처음 페이지가 아니면, '처음' 글자에 가장 처음 페이지로 갈 수 있게 링크
                        echo "<li><a href='?catgo=$catagory&search=$searchKeyword&page=1'>처음</a></li>";
                    }

                    if($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값

                    } else {
                        $pre = $page - 1; //pre 변수에 page-1을 해준다(이전 페이지로 이동할 수 있도록)
                        // '이전' 글자에 pre 변수를 링크. '이전' 버튼을 클릭시, 현재 페이지 -1
                        echo "<li><a href='?catgo=$catagory&search=$searchKeyword&page=$pre'>이전</a></li>";
                    }

                    //for문 반복문을 한 pagination 시작부터 마지막까지 반복
                    for($i=$paginationStart; $i<=$paginationEnd; $i++){
                        if($page == $i){
                            echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                        }else{
                            echo "<li><a href='?catgo=$catagory&search=$searchKeyword&page=$i'>[$i]</a></li>"; //아니라면 아무런 표시 X
                        }
                    }

                    if($paginationNum >= $totalPagination) {
                        // 현재 pagination 이 총 개수보다 크거나 같으면,
                    } else { //만약 현재 pagination 이 총 개수보다 작으면,
                        $next = $page + 1; //next변수에 page + 1을 해준다.
                        echo "<li><a href='?catgo=$catagory&search=$searchKeyword&page=$next'>다음</a></li>"; // '다음' 글자에 next 변수를 링크. '다음' 버튼 클릭시, 현재 페이지 + 1
                    }

                    if($page >= $totalPage){ // 현재 페이지가 마지막이면
                        echo "<li class='fo_re'>마지막</li>"; // '마지막' 글자에 긁은 빨간색을 적용한다.
                    } else{ // 마지막 페이지가 아니면
                        echo "<li><a href='?catgo=$catagory&search=$searchKeyword&page=$totalPage'>마지막</a></li>"; // '마지막' 글자에 totalPage를 링크.
                    }
                    ?>
                </ul>
            </div>

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

        <?php include './footer.php'?>

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>
    </body>
</html>