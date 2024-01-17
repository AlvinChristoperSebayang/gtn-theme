window.axios = require("axios");
// window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let btnSearch = document.querySelector('.btn-search');
let searchForm = document.querySelector('.searchForm');
let inputFormSearch = searchForm.querySelector('input');

document.addEventListener('click', function(event) {
    const isClickedInsideSearch = btnSearch.contains(event.target) || searchForm.contains(event.target);
    event.stopPropagation();    
    if (!isClickedInsideSearch) {
        btnSearch.classList.remove('active');
        searchForm.classList.remove('active');
    }
});

btnSearch.addEventListener('click', function(event) {
    event.stopPropagation();
    btnSearch.setAttribute('type', 'submit');
    event.preventDefault();
    btnSearch.classList.add('active');
    searchForm.classList.add('active');
    inputFormSearch.focus();
});

searchForm.addEventListener('click', function(event) {
    
});

let btnHamburger = document.querySelector('.btnHamburger');
btnHamburger.addEventListener('click',function(){
    btnHamburger.classList.toggle('active')
});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  var navbar = document.querySelector(".site-header");
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
}
