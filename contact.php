<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyPortfolioWeb</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

        <!-- icon -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Heebo|Noto+Sans+KR" rel="stylesheet">

        <!--  paging    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>

        <!-- css파일 가져오기 -->
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <header class="header-area navbar-fade" id="header">
            <nav class="navbar">
                <a class="navbar-brand" id="navbarBrand">금락's portfolio</a>
                <a class="navbar-toggler" id="toggleBtn"><i class="fa fa-bars"></i></a>
                <div class="navbar-menu" id="menu">
                    <div class="nav-item"><a class="nav-link" id="navbarAbout">about</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarService">service</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarPortfolio">portfolio</a></div>
                    <div class="nav-item"><a class="nav-link" id="navbarContact">contact</a></div>
                </div>
            </nav>
        </header>

        <!--  소통할 수 있는 게시판   -->
        <div class="section-container">
            <div class="contact-area" id="contact">
                <div class="title">CONTACT</div>

                <div class="container">
                    <div id="data-container"></div>
                    <div id="pagination"></div>
                </div>

                <script>
                    $(function () {
                        let container = $('#pagination');
                        container.pagination({
                            dataSource: [
                                {name: "hello1"},
                                {name: "hello2"},
                                {name: "hello3"},
                                {name: "hello4"},
                                {name: "hello5"},
                                {name: "hello6"},
                                {name: "hello7"},
                                {name: "hello8"},
                                {name: "hello9"},
                                {name: "hello10"},
                                {name: "hello11"},
                                {name: "hello12"},
                                {name: "hello13"},
                                {name: "hello14"},
                                {name: "hello15"},
                                {name: "hello16"},
                                {name: "hello17"},
                            ],
                            callback: function (data, pagination) {
                                var dataHtml = '<ul>';

                                $.each(data, function (index, item) {
                                    dataHtml += '<li>' + item.name + '</li>';
                                });

                                dataHtml += '</ul>';

                                $("#data-container").html(dataHtml);
                            }
                        })
                    })
                </script>
            </div>
        </div>

        <footer class="footer-area">
            <div class="sns">
                <div class="item" id="facebook"><i class="fab fa-facebook-square"></i></div>
                <div class="item" id="google"><i class="fab fa-google-plus"></i></div>
                <div class="item" id="instagram"><i class="fab fa-instagram"></i></div>
            </div>
            <div class="info">
                <p>Copyright © 2020 LGL Corp. All rights reserved.</p>
            </div>
        </footer>

        <div id="portfolioModal" class="modal"b>
            <span class="close" id="modalClose">&times;</span>
            <div class="container">
                <img id="modalImage">
                <div id="modalMain" class="modal-main"></div>
                <div id="modalSub" class="modal-sub"></div>
                <div id="modalText" class="modal-text"></div>
            </div>
        </div>

        <script src="js/myPortfolioWeb.js"></script>

    </body>
</html>