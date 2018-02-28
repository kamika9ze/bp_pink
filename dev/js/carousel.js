(function($) {

    Drupal.behaviors.slickCarousels = {
        attach: function() {
            if($('#bp-slideshow').length > 0 && !$('#bp-slideshow').hasClass('slick-initialized')) {
                $('#bp-slideshow').slick({dots: true, arrows: false, autoplay: true, autoplaySpeed: 5000, infinite: false});
            }
            if($('#bp-slideshow-new').length > 0 && !$('#bp-slideshow-new').hasClass('slick-initialized')) {
                $('#bp-slideshow-new').slick({dots: true, arrows: false, infinite: false});
            }
            if($('#bp-slideshow-video').length > 0 && !$('#bp-slideshow-video').hasClass('slick-initialized')) {
                $('#bp-slideshow-video').slick({dots: true, arrows: false, infinite: false});
            }
            if($('#bp-carousel-megamenu-bio').length > 0 && !$('#bp-carousel-megamenu-bio').hasClass('slick-initialized')) {
                $('#bp-carousel-megamenu-bio').slick({dots: true, arrows: false, slidesToShow: 7, slidesToScroll: 7, infinite: false});
            }
            Drupal.behaviors.slickCarousels.carousel();
            Drupal.behaviors.slickCarousels.carouselThree();
            Drupal.behaviors.slickCarousels.compareMobile();
            Drupal.behaviors.slickCarousels.favorite();
            Drupal.behaviors.slickCarousels.insta();
        },
        carousel: function() {
            if($('#bp-carousel').length > 0 && !$('#bp-carousel').hasClass('slick-initialized')) {
                $('#bp-carousel').slick({dots: true, arrows: false, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false
                        }
                    }
                ]});
            }
        },
        carouselThree: function() {
            if($('#bp-carousel-three').length > 0 && !$('#bp-carousel-three').hasClass('slick-initialized')) {
                $('#bp-carousel-three').slick({dots: true, arrows: false, slidesToShow: 3, slidesToScroll: 1, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false
                        }
                    }
                ]});
            }
        },
        compare: function() {
            if($('#bp-carousel-compare-content').length > 0 && !$('#bp-carousel-compare-content').hasClass('slick-initialized')) {
                $('#bp-carousel-compare-content').slick({dots: false, arrows: true, slidesToShow: 3, slidesToScroll: 3, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: true
                        }
                    }
                ]});
            }
        },
        compareMobile: function() {
            if($('#bp-carousel-compare-mobile').length > 0 && !$('#bp-carousel-compare-mobile').hasClass('slick-initialized')) {
                $('#bp-carousel-compare-mobile').slick({slidesToShow: 3, slidesToScroll: 1, infinite: false, responsive:[
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true
                        }
                    }
                ]});
            }
        },
        favorite: function() {
            if($('#bp-carousel-favorite').length > 0 && !$('#bp-carousel-compare-mobile').hasClass('slick-initialized')) {
                $('#bp-carousel-favorite').slick({dots: true, arrows: false, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false
                        }
                    }
                ]});
            }
        },
        insta: function() {
            if($('#insta-carousel').length > 0 && !$('#insta-carousel').hasClass('slick-initialized')) {
                $('#insta-carousel').slick({dots: true, arrows: false, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '80px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '60px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '40px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 375,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '20px',
                            dots: false
                        }
                    }
                ]});
            }
        },
        components: function() {
            if($('#bp-components-carousel').length > 0 && !$('#bp-components-carousel').hasClass('slick-initialized')) {
                $('#bp-components-carousel').slick({dots: true, arrows: false, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '40px',
                            dots: false
                        }
                    }
                ]});
            }
        },
        cartPreview: function(unslick) {
            if(!unslick) {
                if($('#bp-carousel-cart-preview').length > 0 && !$('#bp-carousel-cart-preview').hasClass('slick-initialized')) {
                    $('#bp-carousel-cart-preview').slick({slidesToShow: 1, slidesToScroll: 1, infinite: false});

                    $('#bp-carousel-cart-preview .trigger-trash').off('click');
                    $('#bp-carousel-cart-preview .trigger-trash').on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var count = $(this).parents('.teaser').index();

                        Drupal.behaviors.shopCart.off(this);
                        $('#bp-carousel-cart-preview').slick('slickRemove', count);
                        $('#bp-carousel-cart-preview').slick('setPosition');

                        if($('#bp-carousel-cart-preview .teaser').length === 0) {
                            $('#bp-carousel-cart-preview').html('<p class="text-big">Ваша корзина пуста</p>');
                        }
                    });
                }
            } else {
                if($('#bp-carousel-cart-preview').hasClass('slick-initialized')) {
                    $('#bp-carousel-cart-preview .trigger-trash').off('click');
                    $('#bp-carousel-cart-preview').slick('unslick');
                }
            }
        },
    }

}(jQuery));