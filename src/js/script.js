$(document).ready(function ($) {
    var productsSlider = (function($) {
        var option = {
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev">p<br />r<br />e<br />v</button>',
            nextArrow: '<button type="button" class="slick-next">n<br />e<br />x<br />t</button>',
            responsive: [
                { breakpoint: 1200, settings: { slidesToShow: 3 } },
                { breakpoint: 992, settings: { slidesToShow: 2 } },
                { breakpoint: 768, settings: { slidesToShow: 1 } },
            ],
        };
        var listen = function () {
            $('.js_product-slider').slick(option);
        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var mainMenu = (function ($) {
        var open = function (item) {
            item.addClass('active');
            $('.js_main-menu').animate({ left: '0' }, 500);
        }
        var close = function (item) {
            item.removeClass('active');
            $('.js_main-menu').animate({ left: '-225px' }, 500);
        }
        var listen = function () {
            $('.js_menu-toggle').on('click', function() {
                $(this).hasClass('active') ? close($(this)) : open($(this));
            });
        }
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var stickyMenu = (function ($) {
        var el = {
            sticky: $('#sticky-menu'),
            position: $('#sticky-menu').position()
        }
        var listen = function () {
            if (el.sticky.length) {
                el.sticky.offset().top;
                $(window).on('scroll', function () {
                    $(window).scrollTop() > el.position.top ? el.sticky.addClass('sticky') : el.sticky.removeClass('sticky');
                });
            }
        }
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var mainSlider = (function($) {
        var options = {
            effect: 'random',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 700,
            pauseTime: 9000,
            startSlide: 0,
            directionNav: true,
            controlNavThumbs: false,
            pauseOnHover: false,
            controlNav: true,
            prevText: '<i class="zmdi zmdi-chevron-left"></i>',
            nextText: '<i class="zmdi zmdi-chevron-right"></i>',
        };
        var listen = function () {
            $('#ensign-nivoslider').nivoSlider(options);
        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var app = (function ($, productsSlider, mainMenu, stickyMenu, mainSlider) {
        var construct = function () {
            productsSlider.init();
            mainMenu.init();
            stickyMenu.init();
            mainSlider.init();
        };

        var listen = function () {
            $('nav#dropdown').meanmenu();
        };

        var init = function () {
            construct();
            listen();
        };
        return {
            init: init
        }
    }($, productsSlider, mainMenu, stickyMenu, mainSlider));

    app.init();
});
