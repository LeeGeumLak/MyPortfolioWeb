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


/* MAIN AREA  */
var imageSlideIndex = 1;
showImageSlides(imageSlideIndex);

function imageSlideTimer() {
    plusImageSlides(1);
}

var imageTimer = setInterval(imageSlideTimer, 3000);

function plusImageSlides(n) {
    clearInterval(imageTimer);
    imageTimer = setInterval(imageSlideTimer, 3000);

    showImageSlides(imageSlideIndex += n);
}

function currentImageSlide(n){
    clearInterval(imageTimer);
    imageTimer = setInterval(imageSlideTimer, 3000);

    showImageSlides(imageSlideIndex = n);
}

function showImageSlides(n) {
    var i;
    var slides = document.getElementsByClassName('image-slide');
    var slide = document.getElementsByClassName('slide');
    if (n > slides.length) {imageSlideIndex = 1}
    if (n < 1) {imageSlideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    for (i = 0; i < slide.length; i++) {
        slide[i].className = slide[i].className.replace(' active', '');
    }
    slides[imageSlideIndex-1].style.display = 'block';
    slide[imageSlideIndex-1].className += ' active';
}

document.getElementById('imagePrev').addEventListener('click', plusImageSlides.bind(null,-1));
document.getElementById('imageNext').addEventListener('click', plusImageSlides.bind(null,1));

document.getElementById('firstSlide').addEventListener('click', currentImageSlide.bind(null,1));
document.getElementById('secondSlide').addEventListener('click', currentImageSlide.bind(null,2));
document.getElementById('thirdSlide').addEventListener('click', currentImageSlide.bind(null,3));
document.getElementById('forthSlide').addEventListener('click', currentImageSlide.bind(null,4));
document.getElementById('fifthSlide').addEventListener('click', currentImageSlide.bind(null,5));
document.getElementById('sixthSlide').addEventListener('click', currentImageSlide.bind(null,6));


/* PROJECTS AREA */
filterSelection('all');

function filterSelection(id) {
    var x, i;

    x = document.getElementsByClassName('listItem');
    for(i=0;i<x.length;i++){
        removeClass(x[i], 'active');
    }
    addClass(document.getElementById(id), 'active');

    x = document.getElementsByClassName('filterItem');
    if(id == 'all') id = '';
    for(i=0;i<x.length;i++){
        removeClass(x[i], 'show');
        if(x[i].className.indexOf(id) > -1)
            addClass(x[i], 'show');
    }
}

function addClass(element, name) {
    if(element.className.indexOf(name) == -1) {
        element.className += " " + name;
    }
}

function removeClass(element, name) {
    var arr;
    arr = element.className.split(" ");

    while(arr.indexOf(name) > -1){
        arr.splice(arr.indexOf(name), 1);
    }

    element.className = arr.join(" ");
}

/*document.getElementById('all').addEventListener('click', filterSelection.bind(null, 'all'));
document.getElementById('html_css_javascript').addEventListener('click', filterSelection.bind(null, 'html_css_javascript'));
document.getElementById('java').addEventListener('click', filterSelection.bind(null, 'java'));
document.getElementById('android').addEventListener('click', filterSelection.bind(null, 'android'));*/

function viewPortfolio(event) {
    var polyNode = event.target;

    if(polyNode.tagName.toLowerCase() == 'i') { polyNode = polyNode.parentNode; }

    var overlayNode = polyNode;
    var imageNode = overlayNode.nextElementSibling;

    var itemNode = overlayNode.parentNode;
    var mainNode = itemNode.nextElementSibling;
    var subNode = mainNode.nextElementSibling;
    var textNode = subNode.nextElementSibling;

    document.getElementById('modalImage').src = imageNode.src;
    document.getElementById('modalMain').innerHTML = mainNode.innerHTML;
    document.getElementById('modalSub').innerHTML = subNode.innerHTML;
    document.getElementById('modalText').innerHTML = textNode.innerHTML;

    document.getElementById('portfolioModal').style.display = 'block';
}

document.getElementById('modalClose').addEventListener('click', function(){
    document.getElementById('portfolioModal').style.display = 'none';
});

var filterItems = document.getElementsByClassName('overlay');

for(var i=0;i<filterItems.length;i++){
    filterItems[i].addEventListener('click', viewPortfolio);
}

/* BULLETIN BOARD AREA */


/* ANCHOR */
function moveTo(id) {
    if(id == 'brand'){
        window.scrollTo(0, 0);
    } else {
        window.scrollTo(0, document.getElementById(id).offsetTop - 70);
    }
    document.getElementById('menu').classList.remove('show');
}

document.getElementById('navbarMain').onclick = function(){
    location.href="/main.php";
};
document.getElementById('navbarAbout').onclick = function(){
    location.href="/about.php";
};
document.getElementById('navbarSkills').onclick = function(){
    location.href="/skills.php";
};
document.getElementById('navbarProjects').onclick = function(){
    location.href="/projects.php";
};
document.getElementById('navbarBulletinBoard').onclick = function(){
    location.href="/bulletinBoard.php";
};

/*document.getElementById('navbarAbout').addEventListener('click', moveTo.bind(null,'about'));
document.getElementById('navbarService').addEventListener('click', moveTo.bind(null,'service'));
document.getElementById('navbarPortfolio').addEventListener('click', moveTo.bind(null,'portfolio'));
document.getElementById('navbarContact').addEventListener('click', moveTo.bind(null,'contact'));*/

