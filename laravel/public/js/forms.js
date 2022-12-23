/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/forms.js ***!
  \*******************************/
var button = document.querySelector(".button");
var input = document.querySelectorAll(".input");
button.addEventListener("click", function (ev) {
  input.forEach(function (inp) {
    if (inp.value == '') {
      inp.classList.add("active");
      inp.placeholder = 'campo vazio';
      ev.preventDefault();
    }
  });
});
/******/ })()
;