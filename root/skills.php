<!DOCTYPE html>
<html>
    <head>
        <?php include './header.php'?>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <!--   사용가능한 언어 및 플랫폼 및 설명 리스트  -->
        <div class="section-container">
            <div class="skills-area" id="skills">
                <div class="title">
                    SKILLS
                </div>

                <div class="container">
                    <div class="item">
                        <div class="icon"><span><i class="fab fa-html5"></i></span></div>
                        <div class="skills">HTML</div>
                        <div class="content">HTML은 제목, 단락, 목록 등과 같은 본문을 위한 구조적 의미를 나타내는 것뿐만 아니라 링크,
                            인용과 그 밖의 항목으로 구조적 문서를 만들 수 있는 방법을 제공합니다. 저는 홈페이지 제작에 HTML을 사용해보았습니다.</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-css3"></i></span></div>
                        <div class="skills">CSS</div>
                        <div class="content">CSS는 HTML로 만들어진 문서의 텍스트 색상/크기, 이미지 색상/크기, 배치방법 등 웹 페이지의 디자인 요소를 담당하는 언어입니다.
                            저는 홈페이지 제작에 CSS를 사용해보았습니다.</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-js-square"></i></span></div>
                        <div class="skills">JAVASCRIPT</div>
                        <div class="content">JAVASCRIPT는 웹 페이지에 다양한 이벤트(마우스 클릭, 키보드입력 둥)애 따라 어떤 동작을 하는 기능을 더하여 페이지를 동적이고,
                            생동감있게 만들어줍니다. 저는 홈페이지 제작에 JAVASCRIPT를 사용해보았습니다.</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-java"></i></span></div>
                        <div class="skills">JAVA</div>
                        <div class="content">JAVA는 우리나라에서 가장 많이 쓰이는 언어로, 모바일 앱, 웹 프로그래밍, 애플릿, 애플리케이션 등 다양한 분야에서 사용됩니다.
                            저는 openCV 카메라 어플, 텍스트 게임, 소켓 통신을 통한 멀티 리듬게임, 타워디펜스 게임 등의 제작에 JAVA를 사용해보았습니다.</div>
                    </div>

                    <div class="item">
                        <div class="icon"><span><i class="fab fa-android"></i></span></div>
                        <div class="skills">ANDROID</div>
                        <div class="content">ANDROID는 구글에서 만든 스마트폰용 운영체제입니다. 운영체제와 미들웨어, 사용자 인터페이스, 어플리케이션, MMS 서비스 등을
                            하나로 묶어 서비스를 제공하며 다양한 어플리케이션을 만들어 설치하면 실행될 수 있도록 구성된 어플리케이션 플랫폼이라고도 볼 수 있습니다.
                            저는 openCV 카메라 어플 제작에 ANDROID를 사용해보았습니다.</div>
                    </div>

                    <div class="item">
                        <div class="skills">C/C++</div>
                        <div class="content">C 언어는 UNIX OS 개발을 위해 처음 만들어졌으며, 가장 오래된 언어중 하나이지만 여전히 다양한 분야에서 사용되는 언어
                            입니다. 또한 C++는 C 언어에서 발전한 언어로 C언어의 특징을 살려 절자 지향적인 동시에 객체 지향적이기도 하여, 다양한 방식으로 프로그램을 만들 수 있습니다.
                            저는 C언어는 라즈베리 파이 기반에서의 센서 제어, 텍스트 기반의 게임 등에 사용해보았으며, C++는 테트리스 게임 제작, openCV 카메라 어플 제작에서 사용해보았습니다.</div>
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
    </body>
</html>