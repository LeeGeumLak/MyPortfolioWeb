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
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                // bulletinBoard 테이블에서 idxNum를 기준으로 내림차순해서 5개까지 표시
                $sql = mq("select * from bulletinBoard");
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

                $sql_bulletinBoard = mq("select * from bulletinBoard order by idxNum desc limit $startNum, $list");

                while($board = $sql_bulletinBoard->fetch_array()) {
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

            <!---페이징 넘버 --->
            <div id="page_num">
                <ul>
                    <?php
                    if($page <= 1) {
                        // 현재 page가 가장 처음 페이지이면, '처음' 글자에 빨간색 표시
                        echo "<li class='fo_re'>처음</li>";
                    } else{
                        // 현재 page가 가장 처음 페이지가 아니면, '처음' 글자에 가장 처음 페이지로 갈 수 있게 링크
                        echo "<li><a href='?page=1'>처음</a></li>";
                    }

                    if($page > 1) {
                        $pre = $page - 1; //pre 변수에 page-1을 해준다(이전 페이지로 이동할 수 있도록)
                        echo "<li><a href='?page=$pre'>이전</a></li>"; // '이전' 글자에 pre 변수를 링크. '이전' 버튼을 클릭시, 현재 페이지 -1
                    }

                    //for문 반복문을 한 pagination 시작부터 마지막까지 반복
                    for($i=$paginationStart; $i<=$paginationEnd; $i++){
                        if($page == $i){
                            echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                        }else{
                            echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 아무런 표시 X
                        }
                    }

                    if($paginationNum < $totalPagination){ //만약 현재 pagination 이 총 개수보다 작으면,
                        $next = $page + 1; //next변수에 page + 1을 해준다.
                        echo "<li><a href='?page=$next'>다음</a></li>"; // '다음' 글자에 next 변수를 링크. '다음' 버튼 클릭시, 현재 페이지 + 1
                    }

                    if($page >= $totalPage){ // 현재 페이지가 마지막이면
                        echo "<li class='fo_re'>마지막</li>"; // '마지막' 글자에 긁은 빨간색을 적용한다.
                    } else{ // 마지막 페이지가 아니면
                        echo "<li><a href='?page=$totalPage'>마지막</a></li>"; // '마지막' 글자에 totalPage를 링크.
                    }
                    ?>
                </ul>
            </div>

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