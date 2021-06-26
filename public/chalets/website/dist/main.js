const nav1 = document.querySelector('.active-1');
const nav2 = document.querySelector('.active-2');
const nav4 = document.querySelector('.active-4');
const nav5 = document.querySelector('.active-5');

const filter1 = document.querySelector('#all');
const filter2 = document.querySelector('#highest_rating');
const filter3 = document.querySelector('#lowest_price');
const filter4 = document.querySelector('#hightest_price');

filter2.style.display = "none";
filter3.style.display = "none";
filter4.style.display = "none";

nav1.addEventListener('click', () => {
    nav1.style.backgroundColor = '#81C2E4';
    nav2.style.backgroundColor = '#fff';
    nav4.style.backgroundColor = '#fff';
    nav5.style.backgroundColor = '#fff';

    filter1.style.display = "block";
    filter2.style.display = "none";
    filter3.style.display = "none";
    filter4.style.display = "none";

});

nav2.addEventListener('click', () => {
    nav2.style.backgroundColor = '#81C2E4';
    nav1.style.backgroundColor = '#fff';
    nav4.style.backgroundColor = '#fff';
    nav5.style.backgroundColor = '#fff';

    filter1.style.display = "none";
    filter2.style.display = "block";
    filter3.style.display = "none";
    filter4.style.display = "none";
});

// nav3.addEventListener('click', () => {
//     nav3.style.backgroundColor = '#81C2E4';
//     nav2.style.backgroundColor = '#fff';
//     nav1.style.backgroundColor = '#fff';
//     nav4.style.backgroundColor = '#fff';
//     nav5.style.backgroundColor = '#fff';
// });

nav4.addEventListener('click', () => {
    nav4.style.backgroundColor = '#81C2E4';
    nav2.style.backgroundColor = '#fff';
    nav1.style.backgroundColor = '#fff';
    nav5.style.backgroundColor = '#fff';

    filter1.style.display = "none";
    filter2.style.display = "none";
    filter3.style.display = "block";
    filter4.style.display = "none";
});

nav5.addEventListener('click', () => {
    nav1.style.backgroundColor = '#fff';
    nav2.style.backgroundColor = '#fff';
    nav4.style.backgroundColor = '#fff';
    nav5.style.backgroundColor = '#81C2E4';

    filter1.style.display = "none";
    filter2.style.display = "none";
    filter3.style.display = "none";
    filter4.style.display = "block";
});


// Sticky menu background
window.addEventListener('scroll', function() {
    if (window.scrollY > 150) {
        document.querySelector('.navbar').style.opacity = 0.9;
    } else {
        document.querySelector('.navbar').style.opacity = 1;
    }
});