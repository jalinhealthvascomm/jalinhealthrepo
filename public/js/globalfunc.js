/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/globalfunc.js ***!
  \************************************/
var btnScrollToTop = document.querySelector('.scrolltop');

if (btnScrollToTop) {
  btnScrollToTop.addEventListener('click', function () {
    var position = document.body.scrollTop || document.documentElement.scrollTop;

    if (position) {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  });
}

var navSolutionMenu = document.querySelector('.nav-solutions');

if (navSolutionMenu) {
  navSolutionMenu.addEventListener('click', function () {
    document.querySelector('#solutions').scrollIntoView({
      behavior: 'smooth'
    });
  });
}

var navParner = document.querySelector('.nav-partner');

if (navParner) {
  navParner.addEventListener('click', function () {
    window.scrollTo({
      top: 500,
      behavior: 'smooth'
    });
    var partner = document.querySelector('#partner');

    if (partner) {
      window.scrollTo({
        top: partner.getBoundingClientRect().top,
        behavior: 'smooth'
      });
    } // 

  });
}
/******/ })()
;