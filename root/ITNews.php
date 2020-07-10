<!DOCTYPE html>
<html>
    <head>
        <?php
            ini_set("allow_url_fopen", 1);
            include './header.php';
            include '../simple_html_dom.php'
        ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>

    <body style="background-image: unset; background-color: #f9f9ff">
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <?php $pageNumber = 1; // 크롤링할 페이지가 pagination 이 적용되어 있음 ?>

        <!-- IT에 관련된 뉴스 크롤링하여 무한 스크롤링으로 표시 -->
        <div class="section-container" style="max-width: 1100px">
            <div class="itnews-area" id="itnews" style="background-color: #f9f9ff">
                <div class="title">
                    IT NEWS
                </div>

                <div class="content">
                    <script src="../js/myPortfolioWeb.js"></script>

                    <?php
                    //$articleCounter = 1; // 한 페이지에 15개의 기사가 존재

                    // 크롤링하는 페이지가 pagination이 적용되어 있기에, 인자값으로 page number를 받아 해당 페이지의 기사 출력
                    //for($i = 0; $i < 1; $i++) {
                        itNewsCrawler($pageNumber);
                        //$pageNumber++;
                    //}
                    ?>

                    <!--<script>
                        var page = 2;
                        $(window).scroll(function() {
                            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                                //console.log(++page);
                                <?php
/*                                $pageNumber++;
                                itNewsCrawler($pageNumber);
                                //                                echo("<script type='text/javascript'> setPageNumber(\"$pageNumber\"); </script>");
                                */?>
                                //$("body").append('<div class="content">' + '<h1>page:' + page + '</h1>' +'</div>');
                            }
                        });
                        // function setPageNumber(pageNumber) {
                        //     page = pageNumber;
                        // }
                    </script>-->
                </div>
            </div>

            <!--<div style="text-align: center;">
                <input type="button" style="border: 1px solid #f9f9ff; padding: 10px; font-size: 20px; margin-top: 30px" onclick="return getOutput()" value="기사 더 보기">
            </div>-->
        </div>

        <div style="position: fixed; bottom: 100px; right: -100px; color: #ffffff;">
            <a href="#"><img style="width: 30%; height: 30%; cursor: pointer" src="../img/top.png" title="TOP"></a>
        </div>

        <br><br><br>
        <?php include './footer.php'?>

        <script src="../js/myPortfolioWeb.js"></script>

        <?php
        function itNewsCrawler($pageNumber) {
            // 크롤링 시작
            // http://www.itworld.co.kr/news 사이트의 전체 데이터
            $rawData = file_get_html("http://www.itworld.co.kr/news?page=$pageNumber");

            // 페이지 내의 전체 기사들의 제목 크롤링 후, 배열에 저장
            $idxCounter = 0;
            $articleTitleArray[] = "";
            foreach ($rawData->find("h4.news_list_full_size") as $articleTitle) {
                $articleTitleArray[$idxCounter] = $articleTitle->plaintext;
                $idxCounter++;
            }

            // 페이지 내의 전체 기사들의 이미지 크롤링 후, 배열에 저장
            $idxCounter = 0;
            $articleImageArray[] = "";
            foreach ($rawData->find("img.fit_image") as $articleImage) {
                $imageUrl = 'http://www.itworld.co.kr'.$articleImage->src;
                $articleImageArray[$idxCounter] = $imageUrl;
                $idxCounter++;
            }

            // 페이지 내의 전체 기사들의 내용 크롤링 후, 배열에 저장
            $idxCounter = 0;
            $articleContentArray[] = "";
            foreach ($rawData->find("div.news_body_summary") as $articleContent) {
                $articleContentArray[$idxCounter] = $articleContent->plaintext;
                $idxCounter++;
            }

            // 페이지 내의 전체 기사들의 링크 크롤링 후, 배열에 저장
            $idxCounter = 0;
            $articleLinkArray[] = "";
            foreach ($rawData->find("a") as $articleLink) {
                if(strpos($articleLink->href, "/news/") !== false) {
                    $linkUrl = 'http://www.itworld.co.kr'.$articleLink->href;
                    $articleLinkArray[$idxCounter] = $linkUrl;
                    $idxCounter++;
                }
            }
            // 크롤링 끝
            ?>

            <!-- 크롤링 결과 페이지에 출력 -->
            <div class="wi_line" style="border: solid 5px lightgray; margin-top: unset"></div>
            <?php
            for($idx = 0; $idx < 15; $idx++) { ?>
                <div class="article" style=" cursor: pointer; margin: 20px" onclick="window.open('<?php echo $articleLinkArray[$idx] ?>')">
                    <div class="article_title">
                        <?php echo $articleTitleArray[$idx]; ?>
                    </div>
                    <?php echo "<br>";
                    if($articleImageArray[$idx] != "") {?>
                        <img class="article_image" style="width: 20%; height: 130px; max-width: 100%" src="<?php echo $articleImageArray[$idx] ?>"/>
                        <?php
                    }
                    echo "<br>"; ?>
                    <div class="article_content">
                        <?php echo $articleContentArray[$idx]; ?>
                    </div>
                </div>
                <div class="wi_line" style="margin-top: 70px; border: solid 5px lightgray"></div>
            <?php } ?>
        <?php }
        ?>
    </body>
</html>