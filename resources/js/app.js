require('./bootstrap');

import Alpine from 'alpinejs';
import ScrollReveal from 'scrollreveal';

window.sr = ScrollReveal();

Alpine.data('hero', () => ({
    // reveal() {
    //     sr.reveal('.class-name', {
    //         duration: 1000, // durasi animasi dalam milidetik
    //         origin: 'bottom', // arah datangnya elemen
    //         distance: '50px', // jarak elemen saat muncul
    //         delay: 200, // jeda antara satu elemen dengan elemen lainnya
    //         opacity: 0, // opacity elemen saat muncul
    //         easing: 'ease-out', // jenis easing untuk animasi
    //         reset: true, // elemen akan kembali ke keadaan semula saat di-scroll ulang
    //     })
    // }
}));

sr.reveal('.effect-1', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 200, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out', // jenis easing untuk animasi
    // reset: true, // elemen akan kembali ke keadaan semula saat di-scroll ulang
});

sr.reveal('.effect-2', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 500, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.effect-3', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 800, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.effect-4', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 1400, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.effect-5', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 1700, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.effect-6', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 2100, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-1', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 200, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-2', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 300, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-3', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 400, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-4', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 500, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-5', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 600, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-6', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 700, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-7', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 700, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});

sr.reveal('.menu-effect-8', {
    duration: 1000, // durasi animasi dalam milidetik
    origin: 'bottom', // arah datangnya elemen
    distance: '50px', // jarak elemen saat muncul
    delay: 700, // jeda antara satu elemen dengan elemen lainnya
    opacity: 0, // opacity elemen saat muncul
    easing: 'ease-out',
});




window.Alpine = Alpine;
Alpine.start();


const getBtnToggle = document.querySelector('.btn-toggle-menu');
const getMenuMobile = document.querySelector('.menu-mobile');
const getDisableScroll = document.querySelector("body");
if (getBtnToggle) {
    getBtnToggle.addEventListener('click', function (event) {
        getBtnToggle.classList.toggle('active');
        getMenuMobile.classList.toggle('mobile-active');
        getDisableScroll.classList.toggle('disable-scroll');
    });
}



const getWrapper = document.querySelector('.wrapper-search-dropdown');
const windowWidth = window.innerWidth;
if (getWrapper) {
    if (windowWidth <= 1280) {
        getWrapper.classList.add('container');
    }
}




const btnSearch = document.querySelector('.btn-search');
btnSearch.addEventListener("click", function(){
    const searchForm = document.getElementById("frmSearch");
    searchForm.classList.toggle('show');
})

const linkBtn = document.querySelectorAll('.link-button');
if (linkBtn) {
    linkBtn.forEach(element => {
        element.addEventListener('click', function() {
            getBtnToggle.classList.toggle('active');
            getMenuMobile.classList.toggle('mobile-active');
            getDisableScroll.classList.toggle('disable-scroll');
        })
    });
}


