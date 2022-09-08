import raterJs from "rater-js";
import IMask from 'imask';
import axios from "axios";

$(document).ready(function ($) {
    const axios = require('axios');

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

    var offerSlider = (function ($) {
        var listen = function () {
            $('.slider-for').slick({slidesToShow: 1, slidesToScroll: 1, arrows: !1, fade: !0, asNavFor: '.slider-nav'}),
            $('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: !1,
                arrows: !0,
                centerMode: !1,
                responsive: [{breakpoint: 480, settings: {slidesToShow: 2}}],
                focusOnSelect: !0,
                prevArrow: '<div class="single-pro-arrow arrow-left"><i class="zmdi zmdi-chevron-left"></i></div>',
                nextArrow: '<div class="single-pro-arrow arrow-right"><i class="zmdi zmdi-chevron-right"></i></div>',
            })
        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var starsRating = (function ($) {
        var listen = function () {
            let starRatingsReview = document.querySelectorAll('.js_star-rating-review');

            starRatingsReview.forEach(item => {
                let reviewRating = raterJs( {
                    element:item,
                    rateCallback:function rateCallback(rating, done) {
                        this.setRating(rating);
                        done();
                        let input = document.querySelector('.js_hidden-rating-review');
                        if (input !== null) {
                            input.value = rating
                            input.dispatchEvent(new Event('input'));
                        }
                    },
                    max: 5,
                    starSize: 20,
                    readOnly: false
                });
            });

        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var starsRatingReadOnly = (function ($) {
        var listen = function () {
            let starsReadOnly = document.querySelectorAll('.js_star-rating-readonly');

            starsReadOnly.forEach(item => {
                let value = item.dataset.rating,
                    reviewRating = raterJs( {
                        element:item,
                        rateCallback:function rateCallback(rating, done) {
                            this.setRating(value);
                        },
                        max: 5,
                        starSize: 20,
                        readOnly: true
                    });
            });

        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var starsRatingReviewReadOnly = (function ($) {
        var listen = function () {
            let starsReadOnly = document.querySelectorAll('.js_star-rating-review-readonly');

            starsReadOnly.forEach(item => {
                let value = item.dataset.rating,
                    reviewRating = raterJs( {
                        element:item,
                        rateCallback:function rateCallback(rating, done) {
                            this.setRating(value);
                        },
                        max: 5,
                        starSize: 20,
                        readOnly: true
                    });
            });

        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var reviewType = (function ($) {
        var listen = function () {
            let offer_id_el = document.querySelector('.js_offer-id'),
                article_id_el = document.querySelector('.js_article-id'),
                offer_id_input = document.getElementById('offer_id_input'),
                article_id_input = document.getElementById('article_id_input');

            var setInputValue = function (el, input, data) {
                let id = data
                input.value = id;
                input.dispatchEvent(new Event('input'));
            }

            if (offer_id_el !== null && offer_id_input !== null) {
                setInputValue(offer_id_el, offer_id_input, offer_id_el.dataset.offerid);
            }
            if (article_id_el !== null && article_id_input !== null) {
                setInputValue(article_id_el, article_id_input, offer_id_el.dataset.articleid);
            }
        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var pagination = (function ($) {
        var review_pagination = function () {
            let wrap_comments = document.querySelector('.js_comments-inner-wrap'),
                wrap_reviews_pagination = document.querySelector('.js_pagination-wrap-reviews'),
                offer_id_el = document.querySelector('.js_offer-id');

            if (wrap_reviews_pagination !== null) {
                let reviews_pages = wrap_reviews_pagination.querySelectorAll('.js_pagination-page');

                reviews_pages.forEach(function (page) {
                    page.addEventListener('click', function (event) {
                        event.preventDefault();
                        let value = page.dataset.page;
                        axios({
                            method: 'post',
                            url: '/ajax/review-offer',
                            data: {
                                id: offer_id_el.dataset.offerid ?? 1,
                                page: value ?? 1,
                            }
                        })
                            .then(function (response) {
                                wrap_comments.innerHTML = response.data.reviews;
                                starsRatingReviewReadOnly.init();
                                listen();
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    })
                })
            }
        }
        var catalog_paginations = function () {
            let wrap_catalog = document.querySelector('.js_catalog-inner-wrap'),
                wrap_catalog_pagination = document.querySelector('.js_pagination-wrap-catalog'),
                category_id_el = document.querySelector('.js_category-id'),
                list_view = document.getElementById('list-view'),
                list_view_tab = document.querySelector('.js_catalog-tab-list-view'),
                active_tab = list_view_tab !== null && list_view_tab.classList.contains('active') ? 2 : 1,
                catalog_tabs = document.querySelectorAll('.js_catalog-tab-ico');

                catalog_tabs.forEach(function (tab) {
                    tab.addEventListener('shown.bs.tab', function (event) {
                        active_tab = list_view !== null && event.target.classList.contains('js_catalog-tab-list-view') && event.target.classList.contains('active') ? 2 : 1;
                    })
                });


            if (wrap_catalog_pagination !== null) {
                let offers_pages = wrap_catalog_pagination.querySelectorAll('.js_pagination-page');

                offers_pages.forEach(function (page) {
                    page.addEventListener('click', function (event) {
                        event.preventDefault();
                        let value = page.dataset.page;
                        axios({
                            method: 'post',
                            url: '/ajax/offers-catalog',
                            data: {
                                category_id: category_id_el.dataset.categoryid ?? null,
                                page: value ?? 1,
                                active_tab: active_tab
                            }
                        })
                            .then(function (response) {
                                wrap_catalog.innerHTML = response.data.offers;
                                starsRatingReadOnly.init();
                                listen();
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    })
                })
            }
        }

        var listen = function () {
            review_pagination();
            catalog_paginations();
        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var imaskjs = (function ($) {
        var listen = function () {
            let input_quantity_offer = document.querySelector('.js_input-quantity-offer'),
                quantity_offer = input_quantity_offer ? input_quantity_offer.dataset.quantity : null;

            if (quantity_offer !== null && input_quantity_offer !== null) {
                let mask = IMask(input_quantity_offer, {
                    mask: Number,
                    scale: 0,
                    signed: false,
                    min: 1,
                    max: quantity_offer
                });
            }

        };
        var init = function () {
            listen();
        };
        return {
            init: init
        }
    })($);

    var app = (function ($,
                         productsSlider,
                         mainMenu,
                         stickyMenu,
                         mainSlider,
                         offerSlider,
                         axios
    ) {
        var construct = function () {
            productsSlider.init();
            mainMenu.init();
            stickyMenu.init();
            mainSlider.init();
            offerSlider.init();
            starsRating.init();
            starsRatingReadOnly.init();
            starsRatingReviewReadOnly.init();
            reviewType.init();
            pagination.init();
            imaskjs.init();
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
    }($, productsSlider, mainMenu, stickyMenu, mainSlider, offerSlider, axios));

    app.init();
});
