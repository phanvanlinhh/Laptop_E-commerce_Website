// -------------------- BEGIN JS HEADER -------------------
// ---------- Đóng/mở thanh support responsive ----------
const support = document.querySelector('.js-support')
const navSupport = document.querySelector('.js-nav-support')
const rowSupport = document.querySelector('.js-row-support')

function showNavSupport() {
    navSupport.classList.add('open')
}

function hideNavSupport() {
    navSupport.classList.remove('open')
}

support.addEventListener('click', showNavSupport)
navSupport.addEventListener('click', hideNavSupport)
rowSupport.addEventListener('click', function(event) {
    event.stopPropagation()
})

// ---------- Đóng/mở thanh social responsive ----------
const social = document.querySelector('.js-social')
const navSocial = document.querySelector('.js-nav-social')
const rowSocial = document.querySelector('.js-row-social')

function showNavSocial() {
    navSocial.classList.add('open')
}

function hideNavSocial() {
    navSocial.classList.remove('open')
}

social.addEventListener('click', showNavSocial)
navSocial.addEventListener('click', hideNavSocial)
rowSocial.addEventListener('click', function(event) {
    event.stopPropagation()
})

// ---------- Đóng/mở thanh search responsive ----------
const search = document.querySelector('.js-search')
const navSearch = document.querySelector('.js-nav-search')
const rowSearch = document.querySelector('.js-row-search')

function showNavSearch() {
    navSearch.classList.add('open')
}

function hideNavSearch() {
    navSearch.classList.remove('open')
}

search.addEventListener('click', showNavSearch)
navSearch.addEventListener('click', hideNavSearch)
rowSearch.addEventListener('click', function(event) {
    event.stopPropagation()
})

// ---------- Đóng/mở menu left responsive ----------
const btnMenu = document.querySelector('.js-left-nav')
const modalNav = document.querySelector('.js-modal-nav')
const navLeft = document.querySelector('.js-show-nav-left')
const closeNavLeft = document.querySelector('.js-icon-back')

function showNavLeft() {
    modalNav.classList.add('opens')
}

function hideNavLeft() {
    modalNav.classList.remove('opens')
}

btnMenu.addEventListener('click', showNavLeft)
closeNavLeft.addEventListener('click', hideNavLeft)
modalNav.addEventListener('click', hideNavLeft)
navLeft.addEventListener('click', function(event) {
    event.stopPropagation()
})

// ---------- Tự động đóng menu left responsive khi click chọn ----------
var menuItems = document.querySelectorAll('#menu-left li a[href*="#"]');
for (var i = 0; i < menuItems.length; i++) {
    var menuItem = menuItems[i];

    menuItem.onclick = function() {
        modalNav.classList.remove('opens');
    }
}

// ----- Click vào menu left dropdown responsive thì không đóng menu -----
var autoCloseNavs = document.querySelectorAll('#menu-left li a[onclick="return false;"]');
for (var i = 0; i < autoCloseNavs.length; i++) {
    var autoCloseNav = autoCloseNavs[i];

    autoCloseNav.onclick = function(event) {
        event.preventDefault();
    }
}
// -------------------- END JS HEADER -------------------
// ---------- BEGIN SCROLL TO TOP ----------
scrollImg = document.getElementById("scroll-top");

window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollImg.style.display = "block";
    } else {
        scrollImg.style.display = "none";
    }
}

function topFunction() {
    $('html, body').animate({
        scrollTop: 0
    }, 1000, function() {});
}
// ---------- END SCROLL TO TOP ----------