<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

    </head>

    <body>
        <div style="position:relative; height: 500px">
            <div class="container" style="position: absolute; top:50%; left:50%; transform: translateX(-50%) translateY(-50%) ;width:400px;">
                <form id="loginForm" method="post">
                    <h1 style="text-align:center" >로그인</h1>
                    <input type="text" name="id" class="form-control" id="userId" placeholder="Email address"/><br>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"/><br>
                    <div style="text-align:center;">
                        <label  style="cursor:pointer"><input id="keep_id" type="checkbox" style="cursor:pointer">아이디 임시 저장</label>
                    </div>

                    <button id ="loginBtn" style="display: block; width:100%;" type="button" onclick="location.href='main.php' " ">로그인</button><br>
                    <button id ="signUpBtn" style="display: block; width:100%;" type="button" onclick="location.href='signUp.php' ">회원가입</button>
                    </br>
                </form>
            </div>
        </div>
    </body>
</html>