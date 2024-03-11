function showComment() {

    var show = false;

    if (show == false) {
        document.getElementById('comments').style.opacity = '1';
        document.getElementById('pop').style.fontSize = '0';
        document.getElementById('pop').style.transition = '.5s';
        document.getElementById('comments').style.transform = 'translate(0)';
        document.getElementById('comments').style.position = 'relative';
        document.getElementById('down').style.transform = 'rotate(270deg)';
        document.getElementById('down').style.transition = '.5s';


    } else if (show == true) {
        document.getElementById('comments').style.opacity = '0';
        document.getElementById('pop').style.fontSize = '30px';
        document.getElementById('pop').style.transition = '.5s';
        document.getElementById('comments').style.transform = 'translate(20%)';
        document.getElementById('comments').style.position = 'fixed';
        document.getElementById('down').style.transform = 'rotate(90deg)';
        document.getElementById('down').style.transition = '.5s';

    }

}
var container = document.querySelector('.container');
var random = [
    'linear-gradient(rgba(0, 0, 0, .50), rgba(0, 0, 0, .50)),url("assets/img/western3.jpg")',
    'linear-gradient(rgba(0, 0, 0, .50), rgba(0, 0, 0, .50)),url("assets/img/-5901393702063026116_119.jpg")',

];

var ran = Math.floor(Math.random() * random.length);
container.style.backgroundImage = random[ran];

setInterval(function() {

    var container = document.querySelector('.container');

    var random = [
        'linear-gradient(rgba(0, 0, 0, .50), rgba(0, 0, 0, .50)),url("assets/img/western3.jpg")',
        'linear-gradient(rgba(0, 0, 0, .50), rgba(0, 0, 0, .50)),url("assets/img/-5901393702063026116_119.jpg")',

    ];
    var ran = Math.floor(Math.random() * random.length);
    container.style.backgroundImage = random[ran];

}, 5000);






function showPassword() {
    var pass = document.getElementById('password');
    var btn = document.getElementById('btn');
    if (pass.type == 'password') {
        pass.type = 'text';
        btn.innerHTML = 'Hide';
    } else {
        pass.type = 'password';
        btn.innerHTML = 'Show';

    }
}



var currentSlide = 0;
var slides = document.querySelectorAll('.gallery');
var totalSlides = slides.length;

var prevSlid = document.querySelector('#returnBtn');
var nextSlid = document.querySelector('#btnPlus');

function showSlide(index) {
    slides.forEach((slide) => {
        slide.style.transform = `translateX(-${index * 100}%)`;
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);

    prevSlid.style.opacity = '1';
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}



function showFullmap() {
    var fullMap = document.querySelector('.mapFull');

    fullMap.style.opacity = '1';
    fullMap.style.width = '100%';
    fullMap.style.height = '100vh';
}

function closeFullmap() {
    var fullMap = document.querySelector('.mapFull');


    fullMap.style.width = '0%';
    fullMap.style.height = '0';
    fullMap.style.opacity = '0';
}



function chngeImage(imageSrc) {
    var imageFold = document.querySelector('.facilityImage');
    var images = document.querySelector('#facilityImage');


    images.src = imageSrc;
    imageFold.style.width = '350px';
    imageFold.style.opacity = '1';
    imageFold.style.height = '300px';

}

function leaveFacility() {
    var imageFold = document.querySelector('.facilityImage');
    imageFold.style.width = '0';
    imageFold.style.opacity = '0';
    imageFold.style.height = '0';
}