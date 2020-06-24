<!doctype html>
<html>
    <head>
        <?php include './header.php'?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>

    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <div id="wrap">
            <div id="container">
                <h1 class="title">어서오세요.</h1>
                <form name="singIn" action="./signInCheck.php" method="post" onsubmit="return checkSubmit()">
                    <div class="line">
                        <p>아이디</p>
                        <div class="inputArea">
                            <input type="text" name="memberId" class="memberId" />
                        </div>
                    </div>
                    <div class="line">
                        <p>비밀번호</p>
                        <div class="inputArea">
                            <input type="password" name="memberPw" class="memberPw" />
                        </div>
                    </div>
                    <div class="line">
                        <input type="submit" value="로그인" class="submit" />
                    </div>
                </form>
                <h1 class="content"><a href="./signUp.php">회원가입 하기</a></h1>
            </div>
        </div>

        <script type="text/javascript">
            function checkSubmit(){
                var memberId = $('.memberId');
                var memberPw = $('.memberPw');

                if(memberId.val() == ''){
                    alert('아이디를 입력해 주세요.');
                    return false;
                }
                if(memberPw.val() == ''){
                    alert('비밀번호를 입력해 주세요.');
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>