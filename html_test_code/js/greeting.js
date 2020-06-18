// 사용자 이름 입력 form
const form = document.querySelector(".js-form");
// form의 자녀중에 input태그를 가지고 옴.
const input = form.querySelector("input");

const greeting = document.querySelector(".js-greetings");

//querySelector 는 해당 선택자 중에 가장 첫번째 것을 가지고 옴.
//querySelectorAll 는 선택자의 모든 것을 배열로 가지고 옴.

const USER_LS = "currentUser";
const SHOWING_CN = "showing";   //보여주기 className

// 로컬 스토리지에 이름 저장
function saveName(text) {
    localStorage.setItem(USER_LS, text);
}

// form 에 submit을 컨트롤함.
function handleSubmit(event) {
    //form 에 submit 이벤트를 막음.
    event.preventDefault();
    //input 태그에 있는 값을 가지고 옴.
    const currentValue = input.value;
    // 사용자가 입력한 이름을 환영인사로 보여줌.
    paintGreeting(currentValue);
    // 사용자가 입력한 값을 저장
    saveName(currentValue);
}

// 사용자에게 이름 물어보기
function askForName() {
    form.classList.add(SHOWING_CN);
    // form 이 submit 되었을때 handleSubmit 실행!
    form.addEventListener("submit", handleSubmit);
}

// 환영인사 보여주기
function paintGreeting(text) {
    // form 사라지게 하기
    form.classList.remove(SHOWING_CN);
    // 환영인사 보여주기
    greeting.classList.add(SHOWING_CN);
    greeting.innerText = `Hello ${text}`;
}

// 로컬스토리지에서 이름 가지고 오기
function loadName() {
    const currentUser = localStorage.getItem(USER_LS);
    if(currentUser === null){
        askForName();
    }else {
        paintGreeting(currentUser);
    }

}

function init() {
    loadName();
}

init();