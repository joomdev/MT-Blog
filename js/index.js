//
// ─── CUSTOMIZER CONTROLS EFFECT ─────────────────────────────────────────────────
//
( function( $ ) {
    $('document').ready(function() {
        // Preloader
        $('#wp-preloader').removeClass('d-flex');
        $('#wp-preloader').addClass('d-none');
        
        // Back To Top
        $(window).scroll(function () {
            //works when page scrolled to 500px
            if ($(this).scrollTop() >= 500) {
                $('a#backtotop').fadeIn(500);
            } else {
                $('a#backtotop').fadeOut(500);
            }
        });

        $("a#backtotop").click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
        });

        // Sticky header (stacked)
        $(window).scroll(function () {
            //works when page scrolled to 500px
            if ($(this).scrollTop() >= 100) {
                $('#sticky-header-stacked').fadeIn(100);
            }
            if($(this).scrollTop() <= 100) {
                $('#sticky-header-stacked').hide(50);
            }
        });
        
        $("div.post:first-child").removeClass('col-lg-4');
        $("div.post:first-child").removeClass('col-md-6');
        $("div.post:first-child").addClass('col-lg-8');
        
        // Comment's Form Submit Button
        $("p.form-submit").addClass('col-md-12');

        // Sticky Header
        $(window).scroll(function() {
            var sticky = $('.sticky-navbar'),
            scroll = $(window).scrollTop();

            if (scroll >= 100) sticky.addClass('sticky');
            else sticky.removeClass('sticky');
        });
        
        $(".widget div.widget-content").addClass("shadow-sm");
    });
} )( jQuery );