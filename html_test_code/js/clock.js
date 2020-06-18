// 시계가 보여질 곳
const clockContainer = document.querySelector(".js-clock");
// clockContainer안에서 하위 태그를 h1을 불러옴
const clockTitle = clockContainer.querySelector("h1");

//현재 시간을 가지고 옴
function getTime() {
    // 현재 시간을 가지고 오는 객체
    const date = new Date();

    const seconds = date.getSeconds();
    const minutes = date.getMinutes();
    const hours = date.getHours();

    // 시간이 보여지는 h1 태그에 문자를 바꿔줌
    clockTitle.innerText = `${
        hours < 10 ? `0${hours}` : hours}:${
        minutes < 10 ? `0${minutes}` : minutes}:${
        seconds < 10 ? `0${seconds}` : seconds}
    `;
    // 삼항식
    // 조건 ? 참 : 거짓
    // 시 분 초가 10보다 작으면 앞에 0을 붙임.
}

// 초기화
function init() {
    getTime();
    // 일정한 간격으로 함수를 실행 시킴
    // 1000 --> 1초
    setInterval(getTime, 1000);
}

init();
