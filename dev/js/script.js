(function($) {

    var headerActiveState;
    var hideTimeout;

    function showDropdown(e, item, overflow) {

        function getCarousel(carouselID, tid) {
            $('#megamenu-wrapper .ajax-loader').show();
            $('#bp-megamenu-carousels').css('opacity', .4);
            $.get('/api/get/products', {"field_programs": tid, "type": "html", "image_style": "teaser_small"}, function(response) {
                $('#megamenu-wrapper .ajax-loader').hide();
                $('#bp-megamenu-carousels').css('opacity', 1);
                if(response) {
                    if($(carouselID).length === 0) {
                        $('#bp-megamenu-carousels').append('<div class="carousel carousel-'+tid+'">'+response+'</div>');
                        if($(carouselID).length > 0 && !$(carouselID).hasClass('slick-initialized')) {
                            $(carouselID).slick({dots: true, arrows: false, slidesToShow: 7, slidesToScroll: 7, infinite: false});
                        }
                        displayCarousel(carouselID);
                    }
                }
            });
        }

        function displayCarousel(carouselID) {
            $('#megamenu-wrapper .carousel').hide();
            $(carouselID).show();
            $('.carousel').slick('setPosition');

            var height = $(carouselID).height() + 30;
            if($(carouselID).find('.slick-dots').length > 0) {
                height += 40;
            }
            $('#megamenu-wrapper').css('height', height);
        }

        clearTimeout(hideTimeout);

        // Reset all 'li.expanded ul' to avoid appearing several dropdowns
        $('li.expanded ul').hide().removeClass('fadein').removeClass('fadeout').parent().removeClass('active');

        $(item).addClass('active');
        $(item).find('ul').show().addClass('fadein').removeClass('fadeout');

        $('#header-additional').css('visibility', 'visible').addClass('rolldown').removeClass('rollup');

        // Detect if item is parent menu item
        if($(e.target).parent().hasClass('expanded') && $(e.target).parent().attr('data-tid') !== undefined && !$(e.target).hasClass('child-menu')) {
            console.log('parent');
            $('#megamenu-wrapper').show().css('visibility', 'visible');
            var tid = $(item).find('ul li:first a').attr('data-tid');
            var carouselID = '#bp-megamenu-carousels .carousel.carousel-'+tid;
            if($(item).find('ul li.active').length === 0) {
                $(item).find('ul li').removeClass('active');
                $(item).find('ul li:first').addClass('active');
                getCarousel(carouselID, tid);
            } else {
                $(item).find('ul li').removeClass('active');
                $(item).find('ul li:first').addClass('active');
                displayCarousel(carouselID);
            }
        }
        if($(item).find('ul li:first a.trigger-megamenu-products').length > 0) {
            $('#megamenu-wrapper').show().css('visibility', 'visible');
            if($(e.target).hasClass('trigger-megamenu-products')) {
                $(item).find('ul li').removeClass('active');
                $(e.target).parent().addClass('active');
                var tid = $(e.target).attr('data-tid');
                var carouselID = '#bp-megamenu-carousels .carousel.carousel-'+tid;
                if($(carouselID).length === 0) {
                    getCarousel(carouselID, tid);
                } else {
                    displayCarousel(carouselID);
                }
            }
        } else {
            $('#megamenu-wrapper').hide();
        }
        if(overflow !== 'visible') {
            $('body').addClass('overflow-hidden');
        }

        hideCartPreview();
    }
    function hideDropdown(item) {
        headerActiveState = '';
        $('li.expanded').removeClass('active');
        $(item).find('li.expanded ul').addClass('fadeout').removeClass('fadein');

        $('#header-additional').addClass('rollup').removeClass('rolldown');

        hideTimeout = setTimeout(function() {
            $(item).find('li.expanded ul').hide();
            $('#header-additional').css('visibility', 'hidden');
            $('#megamenu-wrapper').hide();
        }, 150);
        $('body').removeClass('overflow-hidden');
    }
    function showSearch() {
        $('.bp-usermenu .trigger-search').addClass('active');
        $('.search-block-wrapper').show().removeClass('searchOut').addClass('searchIn');
        $('main').stop().animate({opacity: .25}, 300, function() {
            $('.search-block-wrapper input[type="text"]').focus();
        });
        hideDropdown($('li.expanded ul'));
    }
    function hideSearch() {
        $('.bp-usermenu .trigger-search').removeClass('active');
        $('.search-block-wrapper').removeClass('searchIn').addClass('searchOut');
        $('main').stop().animate({opacity: 1}, 300);
    }
    function showHamburger() {
        var left = $('main').width() - 8;
        $('#hamburger-wrapper').show();
        Drupal.behaviors.hamburgerSize.attach();
        if($(window).width() < 768) {
            left -= 25;
        }
        $('.modal-backdrop').remove();
        $('main').append('<div class="modal-backdrop fade"></div>');
        $('#hamburger').show();
        setTimeout(function() {
            $('.modal-backdrop').addClass('in');
            $('#hamburger').removeClass('hamburgerOut').addClass('hamburgerIn');
        }, 50);
        $('.modal-backdrop').on('click', function() {
            hideHamburger();
        });
        $('.trigger-hamburger').addClass('active').css({'left': left+'px'});
        // $('.trigger-hamburger').find('span').removeClass('icon-hamburger').addClass('icon-cross-slim');
        $('#bp-logo, .bp-usermenu').hide();
        $('body').addClass('overflow-hidden');
    }
    function hideHamburger() {
        $('#hamburger-wrapper').hide();
        $('.modal-backdrop').removeClass('in');
        $('#hamburger').removeClass('hamburgerIn').addClass('hamburgerOut');
        setTimeout(function() {
            $('#hamburger').hide();
            $('.modal-backdrop').remove();
            $('#hamburger').removeClass('hamburgerOut');
        }, 200);
        $('.trigger-hamburger').removeClass('active').css({'left': '0px'});;
        $('.trigger-hamburger').find('span').removeClass('icon-cross-slim').addClass('icon-hamburger');
        $('#bp-logo, .bp-usermenu').show();
        $('body').removeClass('overflow-hidden');
    }
    function showCartPreview() {
        if($(window).width() >= 1200 && !$('#cart-preview').hasClass('showCartPreview') && parseInt($('.cart-status .indicator').text()) > 0) {
            $('#cart-preview').addClass('showCartPreview');
            $.get('/api/cookie/cart?type=html&image_style=teaser_small', function(data) {
                if(data !== '') {
                    $('#bp-carousel-cart-preview').html(data);
                    Drupal.behaviors.slickCarousels.cartPreview();
                } else {
                    $('#bp-carousel-cart-preview').html('<p class="text-big">Ваша корзина пуста</p>');
                }
            });
            setTimeout(function() {
                Drupal.behaviors.shopPages.updateQuantity();
            }, 1000);
        }
    }
    function hideCartPreview() {
        Drupal.behaviors.slickCarousels.cartPreview('unslick');
        $('#bp-carousel-cart-preview').html('');
        $('#cart-preview').removeClass('showCartPreview');
    }
    function hideRating() {
        $('#product-rating-popover').removeClass('showRating');
    }
    function recalculateRatingPreview() {
        var on = $('div.fivestar-widget div.on').length;
        var value = parseInt($('.fivestar-form-item .form-type-fivestar select').val() / 20);
        $('.rating-preview .star').each(function(index) {
            $(this).removeClass('icon-star-fill icon-star');
            if(index < value) {
                $(this).addClass('icon-star-fill');
            } else {
                $(this).addClass('icon-star');
            }
        });
    }
    function showCommentsForm() {
        $('.comment-form').show();
    }

    Drupal.behaviors.consoleMessages = {
        attach: function() {

        }
    }

    Drupal.behaviors.dropdownTrigger = {
        attach: function() {
            $('ul.mainmenu li.expanded').on('mouseover', function(e) {
                e.stopPropagation();
                headerActiveState = 'dropdown';
                showDropdown(e, this);
            });
            $('header').on('mouseleave', function(e) {
                if(headerActiveState === 'dropdown') {
                    hideDropdown(this);
                }
            });
            $('.bp-usermenu').on('mouseover', function(e) {
                hideDropdown($('ul.mainmenu'));
            });

            // Disable header popovers and dropdowns
            $('main, footer').on('click', function(e) {
                hideSearch($('.bp-usermenu .trigger-search span'));
                hideCartPreview();
                if($(e.target).parents('#product-rating-popover').length <= 0) {
                    hideRating();
                }
            });

            // On Promo and Posts pages disables dropdown
            $('ul.mainmenu li.no-dropdown.active-trail').off('mouseover');
        }
    }

    // Search Trigger
    Drupal.behaviors.searchTrigger = {
        attach: function() {
            $('.trigger-search').off('click');
            $('.trigger-search').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if(!$(e.target).hasClass('active')) {
                    showSearch();
                } else {
                    hideSearch();
                }
                hideCartPreview();
            });
            $('.trigger-close-search').off('click');
            $('.trigger-close-search').on('click', function(e) {
                e.preventDefault();
                hideSearch();
            });
        }
    }

    // Comments Trigger
    Drupal.behaviors.commentsTrigger = {
        attach: function() {
            $('.trigger-comments').off('click');
            $('.trigger-comments').on('click', function(e) {
                e.preventDefault();
                showCommentsForm();
            });

            $('.trigger-show-all-reviews').off('click');
            $('.trigger-show-all-reviews').on('click', function(e) {
                e.preventDefault();
                $('.review.hidden').removeClass('hidden');
                $(this).remove();
            });

            $('.reviews .reviews-list > a').remove();

            if($('#comments .review').length <= 6) {
                $('#comments .trigger-wrapper .trigger-show-all-reviews').remove();
                $('#comments .trigger-wrapper').text('На данный момент нет ни одного отзыва.');
            }
        }
    }

    // Cart Trigger
    Drupal.behaviors.cartTrigger = {
        attach: function() {
            $('.trigger-cart').on('mouseover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                showCartPreview();
            });
            $('#cart-preview').on('mouseleave', function(e) {
                hideCartPreview();
            });
        }
    }

    // Rating Trigger
    Drupal.behaviors.ratingTrigger = {
        attach: function() {
            recalculateRatingPreview();

            $('.trigger-rating').off('click');
            $('.trigger-rating').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#product-rating-popover').toggleClass('showRating');
            });

            $('div.fivestar-widget .star a').on('click', function() {
                recalculateRatingPreview();
            });
        }
    }

    // Expertise Trigger
    Drupal.behaviors.expertiseTrigger = {
        attach: function() {
            function insertDummyFilters() {
                if($('.filters-mobile-wrapper .filter').length === 0) {
                    var output = '<span class="filter text-small regular black"><span class="underline">Акне</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">Сухая кожа</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">Поврежденная кожа</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">Тусклый свет</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    $('.filters-mobile-wrapper').prepend(output);
                }
                $('.filters-mobile-wrapper').show();
                $('.filters-mobile-wrapper .filter a').on('click', function(e) {
                    var _this = this;
                    $(this).parents('.filter').hide(250, function() {
                        $(_this).parents('.filter').remove();
                        if($('.filters-mobile-wrapper .filter').length === 0) {
                            $('.filters-mobile-wrapper').hide(250);
                        }
                    });
                });
            }

            $('.trigger-expertise').on('click', function(e) {
                e.preventDefault();
                $('#expertise-wrapper').toggle(250);
            });
            $('.button-close-expertise').on('click', function(e) {
                e.preventDefault();
                $('#expertise-wrapper').toggle(250);
            });

            $('.close-filters-modal').on('click', function(e) {
                insertDummyFilters();
            });
            $('.clear-filters-wrapper').on('click', function() {
                $('.filters-mobile-wrapper').hide(250);
            });

            // Side menu
            $('.side-menu-title a').on('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                insertDummyFilters();
                var selected = $(this).text();
                $('.side-menu-col-right .side-menu').hide();
                $('.side-menu-col-right .side-menu').each(function() {
                    if($(this).find('.side-menu-title-back .text').text().trim() === selected) {
                        $(this).show();
                    }
                });
                $('.side-menu-wrapper').stop().animate({'margin-left': '-100%'}, 250);
            });
            $('.side-menu-title-back a').on('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                $('.side-menu-col-right .side-menu').hide();
                $('.side-menu-wrapper').stop().animate({'margin-left': '0'}, 250);
            });
        }
    }

    // Hamburger Trigger
    Drupal.behaviors.hamburgerTrigger = {
        attach: function() {
            $('.trigger-hamburger').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if($(this).find('span').hasClass('icon-hamburger')) {
                    showHamburger();
                } else {
                    hideHamburger();
                }
            });
        }
    }

    // Hamburger Size
    Drupal.behaviors.hamburgerSize = {
        attach: function() {
            var mainW = $('main').width();
            var triggerW = $('.trigger-hamburger').outerWidth();
            var hamburgerW = mainW - triggerW;
            if($(window).width() < 768) {
                hamburgerW -= 15;
            }
            $('#hamburger').width(hamburgerW);
        }
    }

    // Product gallery
    Drupal.behaviors.productGallery = {
        attach: function() {
            $('.product-view').each(function() {
                var _this = this;
                $(_this).find('.product-gallery-thumb:first').addClass('active');
                $(_this).find('.product-gallery-slide:first').addClass('active');
                $(_this).find('.product-gallery-thumb').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $(_this).find('.product-gallery-thumb').removeClass('active');
                    $(_this).find('.product-gallery-slide').removeClass('active');
                    $(_this).find('.product-gallery-thumb[data-slide="'+$(this).attr('data-slide')+'"]').addClass('active');
                    $(_this).find('.product-gallery-slide[data-slide="'+$(this).attr('data-slide')+'"]').addClass('active');
                });
                var gutter = $(_this).find('.product-gallery-gutter');
                var gallery = $(_this).find('.product-gallery');
                if(gutter.height() > gallery.height()) {
                    gallery.height(gutter.height());
                }
            });
        }
    }

    // Horizontal Tab
    Drupal.behaviors.horizontalTabs = {
        attach: function() {
            if($('.horizontal-tab').length !== 0 && $('.horizontal-tab').attr('data-tab') !== undefined) {
                $('.horizontal-tab').off('click');
                $('.horizontal-tab').on('click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $('.horizontal-tab').removeClass('active');
                    $('.horizontal-tab-content').removeClass('active');
                    $('.horizontal-tab[data-tab="'+$(this).attr('data-tab')+'"]').addClass('active');
                    $('.horizontal-tab-content[data-tab="'+$(this).attr('data-tab')+'"]').addClass('active');
                    if($(this).hasClass('trigger-slick-components')) {
                        Drupal.behaviors.slickCarousels.components();
                    }
                });
            }
        }
    }

    // Accordion
    Drupal.behaviors.accordion = {
        attach: function() {
            $('.accordion-title a').on('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(e.target).parents('.accordion').toggleClass('active');
            });
            $('.accordion-body').mCustomScrollbar();
        }
    }

    // Programs View
    Drupal.behaviors.programs = {
        attach: function() {
            $('.programs-view-product .image').on('mouseover', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
            $('.accordion-body').mCustomScrollbar();
        }
    }

    // Login/Register
    Drupal.behaviors.login = {
        attach: function() {
            $('.trigger-login').on('click', function(e) {
                e.preventDefault();
                var location = window.location.href;
                var name = $('#form-username').val();
                var pass = $('#form-password').val();
                var shop = $('#shop').val() ? '?shop=' + $('#shop').val() : '';
                $.post("/api/login", {name: name, pass: pass}).done(function(data) {
                    if(data === 'success') {
                        window.location.href = (location + shop);
                    }
                });
            });
            $('.modal-content .eye').on('click', function(e) {
                e.preventDefault();
                if($('.modal-content .password input').attr('type') === 'password') {
                    $('.modal-content .password .eye-closed').hide();
                    $('.modal-content .password .eye-opened').show();
                    $('.modal-content .password input').attr('type', 'text');
                } else {
                    $('.modal-content .password .eye-closed').show();
                    $('.modal-content .password .eye-opened').hide();
                    $('.modal-content .password input').attr('type', 'password');
                }
            });
        }
    }

    // Map Buy
    Drupal.behaviors.mapBuy = {
        attach: function() {
            $('.trigger-google-maps').off('click');
            $('.trigger-google-maps').on('click', function(e) {
                e.preventDefault();
                $('#map-wrapper').show();

                var script_tag = document.createElement('script');
                script_tag.setAttribute("type","text/javascript");
                script_tag.setAttribute("src","https://maps.googleapis.com/maps/api/js?key=AIzaSyBgcFHz8ChNIgayolshf6_fYwbVw86HErc&callback=initMap");
                (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);

                Drupal.behaviors.mapBuy.init();

                $('html, body').stop().animate({scrollTop: $('#map-wrapper').offset().top - 60}, 500);

                $(this).remove();
            });
        },
        init: function() {
            var interval;
            var input = document.querySelector('#map-search');
            var $hints = $('.search-hints-wrapper');
            var localities;
            $.getJSON('/sites/all/themes/bp_pink/data/localities.json', function(data) {
                localities = data;
            });

            function showHints() {
                $hints.show();
            }

            function hideHints() {
                $hints.hide();
            }

            function showResults(locality) {
                clearInterval(interval);
                var shops = [];
                for(var g=0; g<geoData.length; g++) {
                    if(geoData[g].description === locality) {
                        shops.push({name: '', description: geoData[g].text});
                    }
                }
                function checkCurrentPage() {
                    var index = $('.buy-search-result-page.active').index() + 1;
                    var text = String(index + ' из ' + total_pages);
                    $('#buy-search-results-navigation .page-status').text(text);
                    if(shops.length > 0) {
                        $('#search-found-count').show();
                        $('.search-found-number').text(shops.length);
                    } else {
                        $('#search-found-count').hide();
                    }
                    if($('.buy-search-result-page.active').prev().length > 0) {
                        $('#buy-search-results-navigation .previous').show();
                    } else {
                        $('#buy-search-results-navigation .previous').hide();
                    }
                    if($('.buy-search-result-page.active').next().length > 0) {
                        $('#buy-search-results-navigation .next').show();
                    } else {
                        $('#buy-search-results-navigation .next').hide();
                    }
                    if($('.buy-search-result-page').length < 2) {
                        $('#buy-search-results-navigation .page-status').hide();
                    } else {
                        $('#buy-search-results-navigation .page-status').show();
                    }
                }
                var per_page = 10;
                var total_count = shops.length;
                var total_pages = Math.ceil(shops.length / per_page);
                var count_pages = 1;
                var navigation = '<a href="#" class="previous control">&lsaquo; предыдущая</a><span class="page-status">1 из 30</span><a href="#" class="next control">следующая &rsaquo;</a>';
                var output = '';
                for(var p=0; p<total_pages; p++) {
                    output += '<div class="buy-search-result-page" data-page="'+(p+1)+'">';
                    for(var j=(p*per_page); j<per_page+(p*per_page); j++) {
                        if(typeof shops[j] === 'object') {
                            output += '<div class="buy-search-result-item">';
                            output += '<div class="title">'+shops[j].name+'</div>';
                            output += '<p class="text">'+shops[j].description+'</p>';
                            output += '</div>';
                        }
                    }
                    output += '</div>';
                }
                setTimeout(function() {
                    $('#buy-search-results').html(output);
                    $('#buy-search-results-nav').html('<div id="buy-search-results-navigation">'+navigation+'</div>');
                    $('.buy-search-result-page:first').addClass('active');
                    $('#buy-search-results-navigation .control').unbind('click');
                    $('#buy-search-results-navigation .previous').bind('click', function(e) {
                        e.preventDefault();
                        if($('.buy-search-result-page.active').prev().length > 0) {
                            $('.buy-search-result-page.active').removeClass('active').prev().addClass('active');
                        }
                    });
                    $('#buy-search-results-navigation .next').bind('click', function(e) {
                        e.preventDefault();
                        if($('.buy-search-result-page.active').next().length > 0) {
                            $('.buy-search-result-page.active').removeClass('active').next().addClass('active');
                        }
                    });
                    interval = setInterval(function() {
                        checkCurrentPage();
                    }, 250);
                    $('#preloader').hide();
                    $('#search-found-count').css('opacity', 1);
                }, 2000);
            }

            function loadHints(e) {
                if(e.target.value.length >= 3) {
                    var value = e.target.value;
                    var results = [];
                    $hints.find('a').unbind('click');
                    $hints.find('ul').html('');
                    for(var name in localities) {
                        if(name.toLowerCase().includes(value.toLowerCase())) {
                            results.push('<li class="search-hint"><a href="#" data-lat="'+localities[name].pos.lat+'" data-lng="'+localities[name].pos.lng+'">'+name+'</a></li>');
                        }
                    }
                    results.sort(function(a, b) {
                        return a.length - b.length;
                    });
                    if($hints.length > 0) {
                        for(var i=0; i<results.length; i++) {
                            showHints();
                            $hints.find('ul').append(results[i]);
                            $hints.mCustomScrollbar();
                        }

                        // Binds click event
                        $hints.find('a').bind('click', function(e) {
                            var lat = parseFloat($(this).attr('data-lat'));
                            var lng = parseFloat($(this).attr('data-lng'));
                            e.preventDefault();
                            map.setCenter({lat: lat, lng: lng});
                            map.setZoom(10);
                            hideHints();
                            $('#preloader').show();
                            $('#search-found-count').css('opacity', .5);
                            showResults($(this).text().trim());
                            input.value = $(this).text().trim();
                        });
                    } else {
                        hideHints();
                    }
                } else {
                    hideHints();
                }
            }

            function getUsersLoc() {
                $.get("http://ipinfo.io", function(response) {
                    var loc = response.loc.split(',');
                    var lat = parseFloat(loc[0]);
                    var lng = parseFloat(loc[1]);
                    map.setCenter({lat: lat, lng: lng});
                    map.setZoom(10);
                }, "jsonp");
            }

            input.removeEventListener('keyup', function() {});

            input.addEventListener('keyup', loadHints);

            setTimeout(getUsersLoc, 1000);
        }
    }

    // Resize Listener
    $(window).bind('resize', function(){
        Drupal.behaviors.hamburgerSize.attach();
    });

    // Orientation Change Listener
    window.addEventListener("orientationchange", function() {
        Drupal.behaviors.hamburgerSize.attach();
    }, false);

}(jQuery));