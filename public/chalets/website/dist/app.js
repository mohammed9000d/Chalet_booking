// Sticky menu background
window.addEventListener('scroll', function() {
    if (window.scrollY > 150) {
        document.querySelector('.navbar').style.opacity = 0.9;
        document.querySelector('.navbar').style.background = '#005FAB';
    } else {
        document.querySelector('.navbar').style.opacity = 1;
        document.querySelector('.navbar').style.background = 'none';
    }
});

//show change password and change image

const show = document.querySelector('#show');
const changePass = document.querySelector('#change-pass');

show.addEventListener('click', () => {
    changePass.classList.add('display-b');
    changePass.classList.remove('display-n');
});

const show2 = document.querySelector('#show-2');
const changeImg = document.querySelector('#change-img');

show2.addEventListener('click', () => {
    changeImg.classList.add('display-b');
    changeImg.classList.remove('display-n');
});