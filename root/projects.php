<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--  포트폴리오 카테고리화 시켜서 리스트 및 클릭시 창 팝업  -->
        <div class="section-container">
            <div class="projects-area" id="projects">
                <div class="title">
                    PROJECTS
                </div>

                <div class="filter">
                    <ul class="list">
                        <li class="listItem active" id="all">All</li>
                        <li class="listItem" id="html_css_javascript">HTML/CSS/JAVASCRIPT</li>
                        <li class="listItem" id="java">JAVA</li>
                        <li class="listItem" id="android">ANDROID</li>
                    </ul>
                </div>

                <div class="container">
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider2.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider3.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider4.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider5.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider6.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider1.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider2.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem java android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider3.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                    <div class="filterItem html_css_javascript android">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/imgSlider4.jpg">
                        </div>
                        <div class="main">
                            메인 제목
                        </div>
                        <div class="sub">
                            부 제목
                        </div>
                        <div class="text">
                            포트 폴리오 상세 설명
                        </div>
                    </div>
                </div>
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

        <script src="../js/myPortfolioWeb.js"></script>

        <script type="text/javascript">
            /* PROJECTS AREA */
            filterSelection('all');

            function filterSelection(id) {
                var x, i;

                x = document.getElementsByClassName('listItem');
                for(i=0;i<x.length;i++){
                    removeClass(x[i], 'active');
                }
                addClass(document.getElementById(id), 'active');

                x = document.getElementsByClassName('filterItem');
                if(id == 'all') id = '';
                for(i=0;i<x.length;i++){
                    removeClass(x[i], 'show');
                    if(x[i].className.indexOf(id) > -1)
                        addClass(x[i], 'show');
                }
            }

            function addClass(element, name) {
                if(element.className.indexOf(name) == -1) {
                    element.className += " " + name;
                }
            }

            function removeClass(element, name) {
                var arr;
                arr = element.className.split(" ");

                while(arr.indexOf(name) > -1){
                    arr.splice(arr.indexOf(name), 1);
                }

                element.className = arr.join(" ");
            }

            document.getElementById('all').addEventListener('click', filterSelection.bind(null, 'all'));
            document.getElementById('html_css_javascript').addEventListener('click', filterSelection.bind(null, 'html_css_javascript'));
            document.getElementById('java').addEventListener('click', filterSelection.bind(null, 'java'));
            document.getElementById('android').addEventListener('click', filterSelection.bind(null, 'android'));

            function viewPortfolio(event) {
                var polyNode = event.target;

                if(polyNode.tagName.toLowerCase() == 'i') { polyNode = polyNode.parentNode; }

                var overlayNode = polyNode;
                var imageNode = overlayNode.nextElementSibling;

                var itemNode = overlayNode.parentNode;
                var mainNode = itemNode.nextElementSibling;
                var subNode = mainNode.nextElementSibling;
                var textNode = subNode.nextElementSibling;

                document.getElementById('modalImage').src = imageNode.src;
                document.getElementById('modalMain').innerHTML = mainNode.innerHTML;
                document.getElementById('modalSub').innerHTML = subNode.innerHTML;
                document.getElementById('modalText').innerHTML = textNode.innerHTML;

                document.getElementById('portfolioModal').style.display = 'block';
            }

            document.getElementById('modalClose').addEventListener('click', function(){
                document.getElementById('portfolioModal').style.display = 'none';
            });

            var filterItems = document.getElementsByClassName('overlay');

            for(var i=0;i<filterItems.length;i++){
                filterItems[i].addEventListener('click', viewPortfolio);
            }
        </script>

    </body>
</html>