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

    var app = (function ($, productsSlider, mainMenu, stickyMenu) {
        var construct = function () {
            productsSlider.init();
            mainMenu.init();
            stickyMenu.init();
        };

        var listen = function () {

        };

        var init = function () {
            construct();
            listen();
        };
        return {
            init: init
        }
    }($, productsSlider, mainMenu, stickyMenu));

    app.init();
});
