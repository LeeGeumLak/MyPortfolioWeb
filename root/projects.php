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
        <div class="section-container" style="background-color: #f9f9ff">
            <div class="projects-area" id="projects">
                <div class="title">
                    PROJECTS
                </div>

                <div class="filter">
                    <ul class="list">
                        <li class="listItem active" id="all">All</li>
                        <li class="listItem" id="php">PHP</li>
                        <li class="listItem" id="java">JAVA</li>
                        <li class="listItem" id="android">ANDROID</li>
                        <li class="listItem" id="c/c++">C/C++</li>
                    </ul>
                </div>

                <div class="container">
                    <div class="filterItem android c/c++ java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/openCV_camera_thumbnail.JPG">
                        </div>
                        <div class="main">
                            카메라 필터 어플
                        </div>
                        <div class="sub">
                            openCV를 활용하여 카메라에 필터를 씌울 수 있는 어플입니다.
                        </div>
                        <div class="text">
                            * opencv 사진 필터 앱<br>
                            (1) opencv 를 이용하여 카메라 화면에 일반/흑백/HSV 필터효과를 줄 수 있습니다. (opencv)<br>
                            (2) 캡쳐 버튼을 클릭하면, 클릭한 날짜와 시간에 따라 파일의 이름을 정하고 생성하며,<br>
                            이 파일을 가져와 카메라화면을 캡쳐합니다. (contents resolver)<br>
                            (2) 찍은 사진들이 저장된 폴더에 접근하여 해당 앱으로 찍은 사진들의 목록들만 볼 수 있게 했습니다. (ViewPager)<br>
                            (3) 화면 전환 버튼으로 후면 카메라를 쓸지, 전면 카메라를 쓸지 정할 수 있습니다.<br>
                            (4) 스위치 버튼으로 알람을 on/off 하며, 일정한 시간 간격으로 notification을 보냅니다. (broadcast receiver, service)<br>
                            (5) 사진 속의 영어 문장을 찍고, 번역하기 버튼을 클릭하면, 한국어 텍스트로 번역됩니다. (tesseract)<br>
                            (6) 1:1 영상통화가 가능합니다. (WebRtc)<br>
                            (7) 처음 앱 실행시, Lottie api를 사용하여 애니메이션 효과를 주었습니다.<br>
                        </div>
                    </div>
                    <div class="filterItem java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/java_text_game_thumbnail.JPG">
                        </div>
                        <div class="main">
                            RPG GAME
                        </div>
                        <div class="sub">
                            자바로 구현한 텍스트 기반 rpg 게임입니다.
                        </div>
                        <div class="text">
                            자바로 구현한 텍스트 기반 rpg 게임입니다.<br>
                            자신의 캐릭터를 생성하고, 육성하여 보스 몬스터를 무찌르면 클리어입니다.<br>
                            일반 던전에서 몬스터를 사냥하여 경험치를 얻어, 레벨업을 합니다.<br>
                            역시 마찬가지로 몬스터를 사냥하여 돈을 얻을 수 있습니다.<br><br>

                            마을에서는 상점을 통하여 무기와 방어구, 포션을 구매할 수 있습니다.<br>
                            또한 치유소나 주점에서 체력과 마력을 회복할 수 있습니다.<br>
                            주점에서는 야바위 게임을 미니게임으로 넣어서 소소한 재미를 더했습니다.<br><br>

                            일정 레벨에 도달하면, 전직을 할 수 있으며 각 직업마다 다른 스킬을 가지고 있습니다.<br><br>

                            만렙인 10레벨에 도달하여 최종 전직을 하면 보스몬스터에게 도전할 수 있으며,<br>
                            보스 몬스터를 무찌르면 게임에서 승리하게 됩니다.
                        </div>
                    </div>
                    <div class="filterItem php">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/portfolioweb_thumbnail.JPG">
                        </div>
                        <div class="main">
                            포트폴리오 사이트
                        </div>
                        <div class="sub">
                            php를 이용해 제 개인 포트폴리오 사이트를 만들었습니다.
                        </div>
                        <div class="text">
                            php 와 html, css, javascript를 이용해 제 개인 포트폴리오 사이트를 만들었습니다.<br>
                            이 외에도 가입한 회원끼리 채팅이 가능하며, it에 관련된 뉴스를 크롤링하여 한눈에 볼 수 있도록 만들었습니다.<br>
                            관리자 페이지를 구현하여, 접속자의 id, ip, 국가, 이전 페이지 등을 볼 수 있습니다.<br>
                        </div>
                    </div>
                    <div class="filterItem android java">
                        <div class="image">
                            <div class="overlay"><i class="far fa-image"></i></div>
                            <img src="../img/whack_a_mole_game_thumbnail.JPG">
                        </div>
                        <div class="main">
                            두더지 잡기 게임
                        </div>
                        <div class="sub">
                            오락실에서만 즐기던 두더지 잡기 게임을 앱으로 즐기기 위해 간단한 형태로 만들었습니다.
                        </div>
                        <div class="text">
                            * 두더지 잡기 게임<br>
                            (1) 게임 시작시, 30초 카운트 다운을 하는 스레드가 실행됩니다.<br>
                            (2) 9개의 구멍에서 무작위로 두더지가 나옵니다. (각 두더지마다 0.5~1초 동안 등장했다가 사라집니다.)<br>
                            (3) 두더지 한마리를 잡을 때마다 1점을 획득하며, 잘 못 클릭할 때마다 1점이 감소됩니다.<br>
                            (4) 초기 실행시, 30초 동안 얻은 총 점수를 최고점수로 설정합니다.<br>
                            (게임을 계속 플레이하면서 얻은 점수가 최고점수를 넘어서면, 최고점수를 업데이트 합니다.)
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <?php include './footer.php'?>

        <div id="portfolioModal" class="modal"b>
            <span class="close" id="modalClose">&times;</span>
            <div class="container">
                <img id="modalImage" style="width: auto; height: 400px">
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
                if(id === 'all') id = '';
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
            document.getElementById('php').addEventListener('click', filterSelection.bind(null, 'php'));
            document.getElementById('java').addEventListener('click', filterSelection.bind(null, 'java'));
            document.getElementById('android').addEventListener('click', filterSelection.bind(null, 'android'));
            document.getElementById('c/c++').addEventListener('click', filterSelection.bind(null, 'c/c++'));

            function viewPortfolio(event) {
                var polyNode = event.target;

                if(polyNode.tagName.toLowerCase() === 'i') { polyNode = polyNode.parentNode; }

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