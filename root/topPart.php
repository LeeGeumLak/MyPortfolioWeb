<!--  최상단 네비게이션바     -->
<header class="header-area navbar-fade" id="header">
    <nav class="navbar">
<!--        <a class="navbar-brand" id="navbarBrand">LGL 's</a>-->
        <a class="navbar-toggler" id="toggleBtn"><i class="fa fa-bars"></i></a>
        <div class="navbar-menu" id="menu">
            <div class="nav-item"><a class="nav-link" href="./main.php" ">main</a></div>
            <div class="nav-item"><a class="nav-link" href="./about.php">about</a></div>
            <div class="nav-item"><a class="nav-link" href="./skills.php">skills</a></div>
            <div class="nav-item"><a class="nav-link" href="./projects.php">projects</a></div>
            <div class="nav-item"><a class="nav-link" href="./bulletinBoard.php">bulletin board</a></div>
            <div class="nav-item"><a class="nav-link" href="./ITNews.php">IT news</a></div>
            <div class="nav-item"><a class="nav-link" href="./broadcast.php">chatting</a></div>

            <?php
                session_start();
                //로그인 세션 없을때, sign in 으로 표시
                if(!isset($_SESSION['userId'])){ ?>
                    <div class="nav-item"><a class="nav-link" href="./signIn.php">sign in</a></div>
                <?php //로그인 세션 있을때, sign out 으로 표시
                } else { ?>
                    <div class="nav-item"><a class="nav-link" href="./signOut.php">sign out</a></div>
                <?php }
            ?>
        </div>
    </nav>
</header>

<script type="text/javascript">
    /* HEADER */
    window.onload = function() {scrollFunction()};
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.documentElement.scrollTop > 70) {
            var header = document.getElementById('header');
            if(!header.classList.contains('navbar-fixed')){
                header.classList.add('navbar-fixed');
                document.getElementsByTagName('body')[0].style.marginTop = '70px';
                header.style.display = 'none';
                setTimeout(function() {
                    header.style.display = 'block';
                }, 40);
            }
        } else {
            var header = document.getElementById('header');
            if(header.classList.contains('navbar-fixed')){
                header.classList.remove('navbar-fixed');
                document.getElementsByTagName('body')[0].style.marginTop = '0';
            }
        }
    }

    function menuToggle(){
        document.getElementById('menu').classList.toggle('show');
    }

    document.getElementById('toggleBtn').addEventListener('click', menuToggle);
</script>