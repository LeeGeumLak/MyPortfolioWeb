const title = document.querySelector("#title");

function handleClick() {
    if(title.style.color == "red"){
        title.style.color = "blue";
    }
    else if(title.style.color == "blue"){
        title.style.color = "red";
    }
    else {
        title.style.color = "red";
    }

}

//title.addEventListener("click", handleClick);

title.addEventListener("mouseenter", handleClick);

/*function handleResize(){
    console.log("resize");
}*/

// window --> 브라우저의 윈도우창을 DOM으로 가지고 옴
// addEventListener --> 리스너
// resize --> 브라우저 창의 크기가 비꿜때
// handleResize --> 필요한 시점에 함수 호출 --> window가 resize 될떄 실행!
// handleResize() --> 한번만 실행
// window.addEventListener("resize", handleResize());

//window.addEventListener("resize", handleResize);



