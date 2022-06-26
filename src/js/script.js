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

    var app = (function ($, productsSlider, mainMenu) {
        var construct = function () {
            productsSlider.init();
            mainMenu.init();
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
    }($, productsSlider, mainMenu));

    app.init();
});
