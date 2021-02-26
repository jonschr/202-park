jQuery(document).ready(function ($) {

    var open = $('.open-hamburger-nav');
    var close = $('.close-hamburger-nav');
    var hamburger = $('.hamburger-overlay');
    var html = document.getElementsByTagName('html')[0]; // '0' to assign the first (and only `HTML` tag)

    function opennav(e) {
        e.preventDefault;
        hamburger.attr('data-open', 'true');
        html.setAttribute('class', 'no-scroll');
    }

    function closenav(e) {
        e.preventDefault;
        hamburger.attr('data-open', 'false');
        html.setAttribute('class', '');
    }

    open.on("click", opennav);
    close.on("click", closenav);

});