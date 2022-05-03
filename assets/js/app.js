import ReplaceObfuscatedEmailAddresses from "./components/ReplaceObfuscatedEmailAddresses";
import AnimateOnPageLinks from "./components/AnimateOnPageLinks";
import isOpen from './components/navMobile'


// Initialise our components on jQuery.ready…
jQuery(function ($) {
    ReplaceObfuscatedEmailAddresses.init();
    AnimateOnPageLinks.init();
});


window.addEventListener("DOMContentLoaded", function () {

    const navHidden = document.querySelector('#nav-hidden');
    const burger = document.querySelector('#mobileButton');

        const menuOpen = document.getElementById('mobileButton');
        menuOpen.addEventListener('click', (e) => {
            menuOpen.classList.toggle('mobile-menu--open');
            const animLine = document.getElementById('mobileButton').children;
            animLine[0].classList.toggle('mobile-nav-button__line--1');
            animLine[1].classList.toggle('mobile-nav-button__line--2');
            animLine[2].classList.toggle('mobile-nav-button__line--3');
        } )


    burger.addEventListener("click", () => {
        isOpen();
    });
});