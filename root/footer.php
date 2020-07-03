<footer class="footer-area">
    <!--div class="sns">
        <div class="item" id="facebook"><i class="fab fa-facebook-square"></i></div>
        <div class="item" id="google"><i class="fab fa-google-plus"></i></div>
        <div class="item" id="instagram"><i class="fab fa-instagram"></i></div>
    </div>-->

    <div class="info" style="font-size: 12px">
        <?php
            session_start();
            if(isset($_SESSION['userId'])){
                if($_SESSION['userId'] == 'admin@naver.com') {?>
                    <button type="button" class="navyBtn" style="float: left; color: #ffffff; background-color: #000000;"
                            onClick="location.href='./adminMain.php'">관리자 페이지</button>
                    <?php
                }
            }
        ?>
        <p>Copyright © 2020 LGL Corp. All rights reserved.</p>
    </div>
</footer>