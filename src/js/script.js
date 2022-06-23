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

    var app = (function ($, productsSlider) {
        var construct = function () {
            productsSlider.init();
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
    }($, productsSlider));

    app.init();
});
