<html>
    <head>
        <?php include './header.php'?>

        <!-- Bootstrap cdn 설정 (영어버전) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Bootstrap cdn 설정 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            //빈값 체크 함수
            var isEmpty = function(value){
                if( value == "" || value == null || value == undefined || ( value != null && typeof value == "object" && !Object.keys(value).length ) ){
                    return true
                } else{
                    return false
                }
            };>
        </script>
    </head>
    <body>
        <!--  최상단 네비게이션바     -->
        <?php include './topPart.php'?>

        <div style="position:relative; height: 500px">
            <div class="container" style="position: absolute; top:50%; left:50%; transform: translateX(-50%) translateY(-50%) ;width:400px;">
                <form id="signForm" action="./signUp_ok.php" method="POST" >
                    <h1 style="text-align:center" >회원가입</h1>
                    <input type="text" name="userId" class="form-control" id="userId" placeholder="Email address"/><br>
                    <div id ="userIdCheck" style="text-align:center; font-weight: bold; display: none; margin-bottom:15px;">아이디 유효성 검사 Text</div>
                    <input type="text" name="nickName" class="form-control" id="nickName" placeholder="nick name"/><br>
                    <div id ="nickNameCheck" style="text-align:center; font-weight: bold; display: none; margin-bottom:15px;">닉네임 유효성 검사 Text</div>
                    <input type="password" name="userPassword" class="form-control password" id="userPassword" placeholder="Password"/><br>
                    <input type="password" name="confirmUserPassword" class="form-control password" id="confirmUserPassword" placeholder="confirm Password"/><br>
                    <div id ="confirmUserPasswordCheck" style="text-align:center; font-weight: bold; display: none; margin-bottom:15px;">패스워드 확인 유효성 검사 Text</div>
                    <button id="signUpBtn" style="display: block; width:100%;" type="button" name="signUp" class="btn btn-warning">회원가입</button><br>
                    <button id="cancelBtn" style="display: block; width:100%;" type="button" name="cancelBtn" class="btn">취소</button><br>
                </form>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">

    let isPassUserId = false;
    let isPassNickName = false;
    let isPassConfirmPassword = false;

    $(document).on('ready', function(e){

        $("#cancelBtn").on("click", function() {
            history.back();
        });

        $("#signUpBtn").on("click", function() {
            //회원정보 조건이 모두 만족 할 때
            if(isPassUserId && isPassNickName && isPassConfirmPassword){
                $("#signForm").trigger("submit");
            //회원정보 조건이 만족되지 않았을 때
            }else{
                alert("회원정보를 알맞게 입력후 회원가입 버튼을 누르세요.");
            }
        });

        $("#userId").on("change keyup paste input", function() {
            //userIdCheck의 id
            let $userIdCheck = $("#userIdCheck");
            //현재 userId값
            let userIdValue = $(this).val();

            //이메일 유효성 검사
            if(validateEmail(userIdValue)){
                //DB에서 존재하는 아이디인지 검사
                $.ajax({
                    type: "POST",
                    url : "./userIdCheck.php",
                    data: {"userId":userIdValue},
                    dataType:"json",
                    success : function(data, status, xhr) {
                        //동일한 아이디가 없을때
                        if(data.result == 0){
                            $userIdCheck.show();
                            $userIdCheck.text("사용 가능한 아이디 입니다.");
                            $userIdCheck.css("color","green");
                            isPassUserId = true;
                        //동일한 아이디가 있을때
                        }else{
                            $userIdCheck.show();
                            $userIdCheck.text("사용할 수 없는 아이디 입니다.");
                            $userIdCheck.css("color","red");
                            isPassUserId = false;
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }else{
                $userIdCheck.show();
                $userIdCheck.text("유효하지 않는 이메일입니다.");
                $userIdCheck.css("color","red");
            }
        });

        $("#nickName").on("change keyup paste input", function() {
            //nickNameCheck의 id
            let $nickNameCheck = $("#nickNameCheck");
            //현재 nickName값
            let nickNameValue = $(this).val();
            console.log("nickNameValue:",nickNameValue);

            //DB에서 존재하는 아이디인지 검사
            $.ajax({
                type: "POST",
                url : "./nickNameCheck.php",
                data: {"nickName":nickNameValue},
                dataType:"json",
                success : function(data, status, xhr) {
                    //동일한 닉네임이 없을때 (!isEmpty(nickNameValue) && )
                    if( !isEmpty(nickNameValue) && (data.result == 0) ){
                        $nickNameCheck.show();
                        $nickNameCheck.text("사용 가능한 닉네임 입니다.");
                        $nickNameCheck.css("color","green");
                        isPassNickName = true;
                        //동일한 닉네임이 있을때
                    }else{
                        $nickNameCheck.show();
                        $nickNameCheck.text("사용할 수 없는 닉네임 입니다.");
                        $nickNameCheck.css("color","red");
                        isPassNickName = false;
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });

        });

        $("#confirmUserPassword, #userPassword").on("change keyup paste input", function() {
            //패스워드체크의 id
            let $confirmUserPasswordCheck = $("#confirmUserPasswordCheck");
            //패스워드값
            let userPasswordValue = $("#userPassword").val();
            //패스워드체크값
            let confirmUserPasswordValue = $("#confirmUserPassword").val();

            //비밀번호 같은지 확인
            //비밀번호 같을때 (!isEmpty(userPasswordValue) && !isEmpty(userPasswordValue) && )
            if( !isEmpty(userPasswordValue) && !isEmpty(userPasswordValue) && (userPasswordValue == confirmUserPasswordValue) ){
                $confirmUserPasswordCheck.show();
                $confirmUserPasswordCheck.text("비밀번호 확인 완료");
                $confirmUserPasswordCheck.css("color","green");
                isPassConfirmPassword = true;
            //비밀번호 다를때
            }else{
                $confirmUserPasswordCheck.show();
                $confirmUserPasswordCheck.text("비밀번호가 맞지 않습니다.");
                $confirmUserPasswordCheck.css("color","red");
                isPassConfirmPassword = false;
            }

        });

    });

    //이메일 유효성 검사 함수
    function validateEmail(email) {
        let re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }

    //회원 가입시, 닉네임/비밀번호 빈값 체크 함수
    var isEmpty = function(value){
        if( value == "" || value == null || value == undefined || ( value != null && typeof value == "object" && !Object.keys(value).length ) ){
            return true
        }else{
            return false
        }
    };

</script>