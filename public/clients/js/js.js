$(document).ready(function () {
    new WOW().init();
    var delta = 2;
    var lastScrollTop = 0;

    $(window).scroll(function(event){
        hasScrolled();
    });

    function hasScrolled() {
        if(jQuery(window).width() <= 768){
            var st = $(this).scrollTop();
            if(st<=96){
                $('.header').removeClass('header__up')
                return;
            }
            if (st <= lastScrollTop){
                $('.header').addClass('header__up').removeClass('header__down');
                if($('#artistName').length){
                    $('#artistName').addClass('name__up')
                }
            } else {
                // Scroll Up
                $('.header').removeClass('header__up').addClass('header__down');
                if($('#artistName').length){
                    $('#artistName').removeClass('name__up')
                }
            }
            lastScrollTop = st;
        }
    }
})