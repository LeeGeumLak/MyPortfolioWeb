<?php
    session_start();
    if(isset($_SESSION['userId'])){
        if(!($_SESSION['userId'] == 'admin@naver.com')) {?>
            <script type="text/javascript">
                alert("관리자만 접근할 수 있습니다.");
                location.replace("./main.php");
        </script> <?php
        } else {
            include '../DBConnect.php';
        }
    }
    else {?>
        <script type="text/javascript">
            alert("관리자만 접근할 수 있습니다.");
            location.replace("./main.php");
        </script> <?php
    }
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php include './header.php'?>
    </head>

    <body style="background-image: none">
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--<div class="container_big" style="height: 100%; margin:20px; margin-top: 100px">
            <nav class="side_bar fl">
                <div class="sign">네비게이션</div>
                <ul>
                    <li>
                        <a class="on" href="./adminMain.php">표</a>
                    </li>
                    <li>
                        <a href="./adminGraph.php">그래프</a>
                    </li>
                </ul>
            </nav>
        </div>-->

        <!--  유저의 로그를 볼 수 있는 게시판   -->
        <div class="section-container" style="max-width: 1500px; margin-top: 50px">
            <div class="bulletinBoard-area" id="bulletinBoard" style="width: unset; height: 710px">
                <div id="board_area" style="width: unset">
                    <table class="list-table" style="width: unset">
                        <thead>
                            <tr>
                                <th width="150">번호</th>
                                <th width="300">아이디</th>
                                <th width="300">IP</th>
                                <th width="150">국가</th>
                                <th width="250">이전경로</th>
                                <th width="250">들어온 경로</th>
                                <th width="200">날짜</th>
                            </tr>
                        </thead>

                        <?php
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        // bulletinBoard 테이블에서 idxNum를 기준으로 내림차순해서 5개까지 표시
                        $sql = mq("select * from userLog");
                        $rowNum = mysqli_num_rows($sql); // 총 게시판 글 수
                        $list = 10; // 한 페이지에 보여줄 개수

                        $paginationCnt = 5; // 하나의 pagination 당 보여줄 페이지의 개수
                        $paginationNum = ceil($page / $paginationCnt);
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

                        $sql_userLog = mq("select * from userLog order by idxNum desc limit $startNum, $list");
                        while($userLog = $sql_userLog->fetch_array()) { ?>
                            <tbody>
                                <tr>
                                    <td width="80"><?php echo $userLog['idxNum']; ?></td>
                                    <td width="100"><?php echo $userLog['userId']?></td>
                                    <td width="100"><?php echo $userLog['ip']?></td>
                                    <td width="80"><?php echo $userLog['country']?></td>
                                    <td width="120"><?php echo $userLog['previousUrl']; ?></td>
                                    <td width="120"><?php echo $userLog['currentUrl']; ?></td>
                                    <td width="100"><?php echo $userLog['accessDate']; ?></td>
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

                            if($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값

                            } else {
                                $pre = $page - 1; //pre 변수에 page-1을 해준다(이전 페이지로 이동할 수 있도록)
                                // '이전' 글자에 pre 변수를 링크. '이전' 버튼을 클릭시, 현재 페이지 -1
                                echo "<li><a href='?page=$pre'>이전</a></li>";
                            }

                            //for문 반복문을 한 pagination 시작부터 마지막까지 반복
                            for($i = $paginationStart; $i <= $paginationEnd; $i++){
                                if($page == $i){
                                    echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                                }else{
                                    echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 아무런 표시 X
                                }
                            }

                            if($paginationNum >= $totalPagination) {
                                // 현재 pagination 이 총 개수보다 크거나 같으면,
                            } else { //만약 현재 pagination 이 총 개수보다 작으면,
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
                </div>
            </div>
        </div>

        <?php include './footer.php' ?>

        <!-- 메인 js 파일 스크립트 추가 -->
        <script src="../js/myPortfolioWeb.js"></script>

        <!--<script type="text/javascript">
            $(document).on('ready', function(e){ });

            function goFreeBoardView(idxNum) {
                console.log("idxNum:",idxNum);
                location.href='./freeBoardView.php?idxNum='+idxNum;
            }
        </script>-->
    </body>
</html>