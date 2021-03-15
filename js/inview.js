jQuery(document).ready(function ($) {

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function setupCircle() {
        $('.is-style-circle').each(function () {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('animate');
            }
        });
    }

    $(window).on('load scroll', setupCircle);

});