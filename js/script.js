var bp = {};

(function($) {
	
    'use strict';

    var BlackPearl = window.BlackPearl || {};

    BlackPearl = (function() {
        var BlackPearl = function() {
            this.endpoints = ['compare', 'favorite', 'cart'];
            this.route = '/api/cookie/';

            this.init();
        }

        return BlackPearl;
    }());

    BlackPearl.prototype.init = function() {
        var _this = this;

        this.update();
 
        $(document).off('click.shop:controls'); // Protect from loops
        $(document).on('click.shop:controls', '[data-toggle="shop"]', function(event) {
            event.preventDefault();
            _this.toggle(this);
        });

        $(document).off('click.shop:remove'); // Protect from loops
        $(document).on('click.shop:remove', '[data-toggle="shop-remove"]', function(event) {
            event.preventDefault();
            _this.removeProduct(this);
			_this.refreshIndicators();
        });

        // Run interval to refresh the indicators
        function refresh() {
            window.setTimeout(refresh, 250);
            _this.refreshIndicators();
            _this.refreshIcons();
        }
        refresh();
    };

    BlackPearl.prototype.update = function() {
        var _this = this;
		
        $.each(this.endpoints, function(index, endpoint) {
            _this.get(endpoint, function(stringValues) {
                var iconLink = $('li.' + endpoint + '-status a');
				if(stringValues.length > 0) {
                    var arrayValues = stringValues.split(',');
                    if(arrayValues.length > 0) {
                        _this[endpoint] = arrayValues;
					  if (iconLink.length && iconLink.attr('data-toggle') == 'modal') {
						iconLink.removeAttr( "data-toggle" );
						iconLink.removeAttr( "data-target" );
					  }	
                    }
                } else {
                    _this[endpoint] = null;
					if (iconLink.length && !iconLink.attr('data-toggle')) {
					  iconLink.attr( "data-toggle", "modal");  
					  var clearEndpoint = endpoint;
					  if (endpoint == 'favorite') clearEndpoint = 'favourite'; 
					  iconLink.attr( "data-target", "#modal-" + clearEndpoint );  
					}
                }
            });
        });
    };

    BlackPearl.prototype.get = function(endpoint, callback) {
        var _this = this;
        var callback = callback || function() {};

        var url = this.route + endpoint;
        $.getJSON(url, function(data) {
            callback(data[endpoint+'_products']);
        });
    };

    BlackPearl.prototype.set = function(elem) {
        var _this = this,
            endpoint = $(elem).attr('data-endpoint'),
            id = $(elem).attr('data-product');

        if(id) {
            var url = this.route + endpoint + '/' + id;
            $.getJSON(url, function() {
                _this.update();
            });
        }
    };

    BlackPearl.prototype.delete = function(elem) {
        var _this = this,
            endpoint = $(elem).attr('data-endpoint'),
            id = $(elem).attr('data-product');

        if(id) {
            var url = this.route + endpoint + '/' + id + '/delete';
            $.getJSON(url, function() {
                _this.update();
            });
        }
    };

    BlackPearl.prototype.toggle = function(elem) {
        if(!elem) {return;}
        return !$(elem).hasClass('active') ? this.set(elem) : this.delete(elem);
    };

    BlackPearl.prototype.removeProduct = function(elem) {
        var $teasers = $(elem).parents('.teasers-wrapper');
        var href = window.location.href;
        this.delete(elem);
        $(elem).parents('.product-item').hide(200, function() {
            $(elem).parents('.product-item').remove();

            if($teasers.find('.product-item').length === 0) {
                //window.location.href = href;
                $teasers.parents('.bp-carousel-compare-content-wrapper').remove();
                //alert('0 items');
            }
        });
    };

    BlackPearl.prototype.refreshIndicators = function() {
        var _this = this;

        $.each(this.endpoints, function(index, endpoint) {
            var values = _this[endpoint] || null;

            if(values && values.length > 0) {
                $('.'+endpoint+'-status .indicator').text(values.length);
                $('.'+endpoint+'-status .indicator').show();
            } else {
                $('.'+endpoint+'-status .indicator').hide(200);
            }
        });
    };

    BlackPearl.prototype.refreshIcons = function() {
        var _this = this;

        $('[data-toggle="shop"]').each(function() {
            var endpoint = $(this).attr('data-endpoint');
            if(_this[endpoint] instanceof Array && _this[endpoint].indexOf($(this).attr('data-product')) > -1) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
    };

    // Make BlackPearl available in global scope
    bp = new BlackPearl();

}(jQuery));

(function($) {

	$('.block-history--num').click(function(e) {
		//alert('asf');
		var data = $(this).closest('.row-product').find('.row-product--detail');
		if(data.hasClass('hidden')){
			data.removeClass('hidden');
		}else{
			data.addClass('hidden');
		}
	});
	
    Drupal.behaviors.slickCarousels = {
        attach: function() {
            if($('#bp-slideshow').length > 0 && !$('#bp-slideshow').hasClass('slick-initialized')) {
                $('#bp-slideshow').slick({dots: true, arrows: true, autoplay: false, autoplaySpeed: 5000, infinite: false});
            }
            if($('#bp-slideshow-new').length > 0 && !$('#bp-slideshow-new').hasClass('slick-initialized')) {
                $('#bp-slideshow-new').slick({
                  dots: true, arrows: false, infinite: false, 
                  responsive:[
                    {
                        breakpoint: 767,
                        settings: {
                            arrows: true
                        }
                    }
                  ]
                });
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
            Drupal.behaviors.slickCarousels.questions();
            Drupal.behaviors.slickCarousels.articleRecommend();
            Drupal.behaviors.slickCarousels.lineProducts();
            //Drupal.behaviors.slickCarousels.productsView();
            //Drupal.behaviors.slickCarousels.answers();
        },
        carousel: function() {
            if($('#bp-carousel').length > 0 && !$('#bp-carousel').hasClass('slick-initialized')) {
                $('#bp-carousel').slick({dots: true, arrows: true, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: true
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
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: true
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: true
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
                $('#bp-carousel-compare-content').slick({dots: false, arrows: true, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
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
            if($(window).width() < 767){
              if($('#bp-carousel-favorite').length > 0 && !$('#bp-carousel-favorite').hasClass('slick-initialized')) {
                  $('#bp-carousel-favorite').slick({dots: true, arrows: true, adaptiveHeight: true, slidesToShow: 1, slidesToScroll: 1, infinite: false, responsive:[
                      {
                          breakpoint: 767,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                      }
                  ]});
              }              
            }
            else {
              if($('#bp-carousel-favorite').hasClass('slick-initialized')){
                $('#bp-carousel-favorite').slick('unslick');
              }
            }            
        },
        insta: function() {//
            if($('#insta-carousel').length > 0 && !$('#insta-carousel').hasClass('slick-initialized')) {
                $('#insta-carousel').slick({dots: false, arrows: true, slidesToShow: 4, slidesToScroll: 4, infinite: false, responsive:[
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
                            //centerMode: true,
                            //centerPadding: '80px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 568,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            //centerMode: true,
                            //centerPadding: '60px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            //centerMode: true,
                            //centerPadding: '40px',
                            dots: false
                        }
                    },
                    {
                        breakpoint: 375,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            //centerMode: true,
                            //centerPadding: '20px',
                            dots: false
                        }
                    }
                ]});
              var t_width = $('#insta-carousel .slick-slide').width();
              $('#insta-carousel .slick-slide').height(t_width);                
              $(window).resize(function(){
                var t_width = $('#insta-carousel .slick-slide').width();
                $('#insta-carousel .slick-slide').height(t_width);                
              });
            }
        },
        components: function() {
            if($('#bp-components-carousel').length > 0 && !$('#bp-components-carousel').hasClass('slick-initialized')) {
                $('#bp-components-carousel').slick({dots: true, arrows: true, slidesToShow: 1, slidesToScroll: 1, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            //centerMode: true,
                            //centerPadding: '40px',
                            adaptiveHeight: true,
                            dots: false
                        }
                    }
                ]});
            }
        },
        review: function() {
            if($('#bp-reviews').length > 0 && !$('#bp-reviews').hasClass('slick-initialized')) {
                $('#bp-reviews').slick({dots: true, arrows: false, slidesToShow: 3, slidesToScroll: 1, infinite: false, responsive:[
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
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: true
                        }
                    }
                ]});
            }
        },
        questions: function() {
            if($('#bp-questions').length > 0 && !$('#bp-questions').hasClass('slick-initialized')) {
                $('#bp-questions').slick({dots: false, arrows: true, slidesToShow: 9, slidesToScroll: 1, vertical: true, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 9,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 9,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5
                        }
                    }
                ]});
            }
        },
        answers: function() {
            if($('#bp-answers .block-answers--list-item').length > 3 && !$('#bp-answers').hasClass('slick-initialized')) {
                $('#bp-answers').slick({dots: false, arrows: true, slidesToShow: 4, slidesToScroll: 1, vertical: true, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]});
            }
        }, 
        articleRecommend: function() {
            if($('#bp-article-recommend').length > 0 && !$('#bp-article-recommend').hasClass('slick-initialized')) {
                $('#bp-article-recommend').slick({dots: false, arrows: true, slidesToShow: 3, slidesToScroll: 1, infinite: false, responsive:[
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]});
            }
        },
        lineProducts: function() {
/*            if($(window).width() < 767){
              if($('#bp-line-products').length > 0 && !$('#bp-line-products').hasClass('slick-initialized')) {
                  $('#bp-line-products').slick({dots: true, arrows: true, adaptiveHeight: true, slidesToShow: 1, slidesToScroll: 1, infinite: false, responsive:[
                      {
                          breakpoint: 767,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                      }
                  ]});
              }              
            }
            else {}*/
              if($('#bp-line-products').hasClass('slick-initialized')){
                $('#bp-line-products').slick('unslick');
              }
            

        },  
        productsViewUnslick: function() {
          if($('#catalogue-products-view').hasClass('slick-initialized')){
            $('#catalogue-products-view').slick('unslick');
            console.log('Unslick is initialized');
          }          
        },
        productsView: function() {
/*        
 //Каталог. Слайдер товаров для мобильной версии
 *     if($(window).width() < 767){
              if($('#catalogue-products-view').length > 0 && !$('#catalogue-products-view').hasClass('slick-initialized')) {
                  $('#catalogue-products-view').slick({dots: true, arrows: true, adaptiveHeight: true, slidesToShow: 1, slidesToScroll: 1, infinite: false, responsive:[
                      {
                          breakpoint: 767,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                      }
                  ]});
                  console.log('initialized');
              }  
              else {
                $('#catalogue-products-view').slick('unslick');
                $('#catalogue-products-view').slick({dots: true, arrows: true, adaptiveHeight: true, slidesToShow: 1, slidesToScroll: 1, infinite: false, responsive:[
                    {
                        breakpoint: 767,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                        }
                    }
                ]});           
                console.log('test');
              }
            }
            else {}*/
              if($('#catalogue-products-view').hasClass('slick-initialized')){
                $('#catalogue-products-view').slick('unslick');
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
    
    $(window).resize(function(){
      Drupal.behaviors.slickCarousels.favorite();
      Drupal.behaviors.slickCarousels.lineProducts();
      Drupal.behaviors.slickCarousels.productsView();
    });

	/*Drupal.behaviors.compareSortingRow = {
        attach: function() {
            $('.bp-carousel-compare-thead-wrapper .btn-big').on('click', function(e) {
                if($(this).not('.active').hasClass('trigger-show-main-propeties')){
                  $('.compare-table .compare-cell.secondary-properties').addClass('hidden');  
                  $('.bp-carousel-compare-thead-wrapper .btn-big').removeClass('active');
                  $(this).addClass('active');
                }
                if($(this).not('.active').hasClass('trigger-show-all-propeties')){
                  $('.compare-table .compare-cell.secondary-properties').removeClass('hidden');  
                  $('.bp-carousel-compare-thead-wrapper .btn-big').removeClass('active');
                  $(this).addClass('active');
                }

                Drupal.behaviors.slickCarousels.compare();
                e.preventDefault();
            });
            //$('.bp-carousel-compare-thead-wrapper .btn-big.trigger-show-main-propeties').on('click')();
        }
    }*/

}(jQuery));
(function($) {

    Drupal.behaviors.modalOpen = {
        attach: function() {
            $('#product-modal').on('show.bs.modal', function(event) {
                var $button = $(event.relatedTarget);
                var id = $button.attr('data-product');
				if(id) {
                    $.ajax('/modal/product/'+id).done(function(data) {
                        $('#product-modal .modal-body').remove();
                        $('#product-modal .modal-controls').remove();
                        $('#product-modal .modal-content').append(data);
                        Drupal.behaviors.productGallery.attach();
                        Drupal.behaviors.ratingTrigger.attach();
                    });
                }
            });
            $('#product-selection').on('show.bs.modal', function(event) {
                var params = {"type": "html", "image_style": "teaser_small", "max": 30, "trigger": "compare"};

                $.get('/api/get/products', params, function(response) {
                    $('#catalogue-products-small-view').html(response);
                    $('#catalogue-products-small-view .product-item a').on('click', function(e) {
                        e.preventDefault();
                    });
                });
            });
        }
    }
    
    Drupal.behaviors.compareSortingRow = {
        attach: function() {
            
            $('.bp-carousel-compare-thead-wrapper .btn-big').on('click', function(e) {
                if($(this).not('.active').hasClass('trigger-show-main-propeties')){
                  $('.compare-table .compare-cell.secondary-properties').addClass('hidden');  
                  $('.bp-carousel-compare-thead-wrapper .btn-big').removeClass('active');
                  $(this).addClass('active');
                }
                if($(this).not('.active').hasClass('trigger-show-all-propeties')){
                  $('.compare-table .compare-cell.secondary-properties').removeClass('hidden');  
                  $('.bp-carousel-compare-thead-wrapper .btn-big').removeClass('active');
                  $(this).addClass('active');
                }

                Drupal.behaviors.slickCarousels.compare();
                e.preventDefault();
            });
        }
    }
    
    Drupal.behaviors.hoverTeaser = {
        attach: function() {
            $( document ).ajaxComplete(function() {
			  
			  //Drupal.attachBehaviors(jQuery('.modal-body .product-page-controls'));
			  
			  var listener_hover = function() {
				$(this).parents('#catalogue-products-view').addClass("hovered");
              };
              var listener_unhover = function(){
                $(this).parents('#catalogue-products-view').removeClass("hovered");
              };
              $('#catalogue-products-view .teaser-inner').off("mouseover", listener_hover);
              $('#catalogue-products-view .teaser-inner').off("mouseout", listener_unhover);
              
              $('#catalogue-products-view .teaser-inner').on("mouseover", listener_hover);
              $('#catalogue-products-view .teaser-inner').on("mouseout", listener_unhover);
            });    
        }
    }
	
    Drupal.behaviors.mainHitHoverTeaser = {
      attach: function() {
        var slick_dots_hovered = false;
        hover_listener_latest_products();
        
        $(document).ajaxComplete(function() {
          hover_listener_latest_products();
        }); 
    
        function hover_listener_latest_products() {
          /* var listener_hover = function() {
          
            $(this).addClass("hovered");
            $( "#block-bp-frontpage-latest-products ul.slick-dots" ).mouseout(function() {
              slick_dots_hovered = false;
            });
            $( "#block-bp-frontpage-latest-products ul.slick-dots" ).mouseover(function() {
              slick_dots_hovered = true;
            });
            
            if (!slick_dots_hovered) {
              $(this).addClass("hovered");	
            } else {
              $(this).removeClass("hovered");
            }
          };
          
          var listener_unhover = function(){
            $(this).removeClass("hovered");
          };
          $('#block-bp-frontpage-latest-products #slideshow-new-wrapper').off("mouseover", listener_hover);
          $('#block-bp-frontpage-latest-products #slideshow-new-wrapper').off("mouseout", listener_unhover);
          
          $('#block-bp-frontpage-latest-products #slideshow-new-wrapper').on("mouseover", listener_hover);
          $('#block-bp-frontpage-latest-products #slideshow-new-wrapper').on("mouseout", listener_unhover); */
          
          var target_fill     = $('#block-bp-frontpage-latest-products #slideshow-new-wrapper');
          var target_dots     =  $('#block-bp-frontpage-latest-products ul.slick-dots li');
          var target_arrows   =  $('#block-bp-frontpage-latest-products .slick-arrow, #block-bp-frontpage-latest-products ul.slick-dots li');
          
          $('#block-bp-frontpage-latest-products #slideshow-new-wrapper .slide').bind('mouseover', function(e){
            var target = $(e.target);
            if(!target.is(target_arrows)) {
              target_fill.addClass('hovered'); 
            }  
          }).bind('mouseout', function(e){
            target_fill.removeClass('hovered'); 
          })         
        }
    
      }
    }
	
    Drupal.behaviors.mainMonthHoverTeaser = {
      attach: function() {
        hover_listener_month_products();
        
        $(document).ajaxComplete(function() {
          hover_listener_month_products();
        }); 
    
        function hover_listener_month_products() {
          
          var target_fill     = $('.front #bp-carousel');
          var target_dots     =  $('.front #bp-carousel ul.slick-dots li');
          var target_arrows   =  $('.front #bp-carousel .slick-arrow, .front #bp-carousel ul.slick-dots li');
          
          $('.front #bp-carousel .slide').bind('mouseover', function(e){
            var target = $(e.target);
            if(!target.is(target_arrows)) {
              target_fill.addClass('hovered'); 
            }  
          }).bind('mouseout', function(e){
            target_fill.removeClass('hovered'); 
          })         
        }
    
      }
    }
    
    Drupal.behaviors.showMobileMenuProduct = {
      attach: function() {
        $('.horizontal-tabs-links .horizontal-tabs-data').on('click', function(e) {
          $(this).parents('.horizontal-tabs-links').toggleClass('active');
          
          e.preventDefault();
        });
        $('.horizontal-tabs-links ul.horizontal-tabs li a').on('click', function(e) {
          var text_link = $(this).text();
          $('.horizontal-tabs-links .horizontal-tabs-data .data-text').text(text_link);
          $('.horizontal-tabs-links').removeClass('active');
          
          e.preventDefault();
        });
      }
    } 
    
    Drupal.behaviors.showMobileSubMenu = {
      attach: function() {
        $('.vertical-tabs-links .vertical-tabs-data').on('click', function(e) {
          $(this).parents('.vertical-tabs-links').toggleClass('active');
          
          e.preventDefault();
        });
      }
    }    
    
	/* Для страницы О Бренде */ 
	
    Drupal.behaviors.makeFullPage = {
      attach: function() {
		
		/* Функция сьрасывает активность пунктов меню у подменю брендов */
		
		function reset_brands_active_trails() {
		  $('.inline-menu a[title="История"]').parents('li').removeClass('active-trail');	
		  $('.inline-menu a[title="Миссия"]').parents('li').removeClass('active-trail');	
		  $('.inline-menu a[title="Новости"]').parents('li').removeClass('active-trail');	
		}
		
		$( window ).scroll(function() {
		  var breakpoints = {
			'section1' : $('#section1').height()/4 * 3,  
			'section2' : $('#section1').height() + $('#section2').height()/4 * 3,  
			'section3' : $('#section1').height() + $('#section2').height() + $('#section3').height()/4 * 3,  
			'section4' : $('#section1').height() + $('#section2').height() + $('#section3').height() + $('#section4').height()/4 * 3,  
			'section5' : $('#section1').height() + $('#section2').height() + $('#section3').height() + $('#section4').height() + $('#section5').height()/4 * 3,  
		  };
		  
		  var menu_items = {
			'section1' : 'brand',
			'section2' : 'history',
			'section3' : 'mission',
			'section4' : 'phylosophy',
			'section5' : 'news',
		  }
		  
		  var more_id = '';
		  var less_id = '';
		  for (var sec_id in breakpoints) {
			if (breakpoints[sec_id] <= $(this).scrollTop()) {
			  more_id = sec_id;
			} else if (less_id == '' && breakpoints[sec_id] > $(this).scrollTop()) {
			  less_id = sec_id;	
			}
		  }
		  
		  if (less_id && more_id) {
			removeSectionClassActive();
			
			/* Проставляем активность пунктов меню в процессе прокрутки страницы */
		    if (less_id == 'section2' || less_id == 'section3' || less_id == 'section5') {
			  reset_brands_active_trails();
			  if (less_id == 'section2') {
			    $('.inline-menu a[title="История"]').parents('li').addClass('active-trail');	
			  } else if (less_id == 'section3') {
			    $('.inline-menu a[title="Миссия"]').parents('li').addClass('active-trail');	
			  } else if (less_id == 'section5') {
			    $('.inline-menu a[title="Новости"]').parents('li').addClass('active-trail');	
			  }
		    } else {
			  reset_brands_active_trails();  
		    }
			
			$('#' + less_id).addClass('active');
			$('body').addClass('fp-viewing-' + menu_items[less_id]);
			$('#menu.menu-list li[data-menuanchor=' + menu_items[less_id] + ']').addClass('active');
		  } else if (!more_id && less_id) {
			reset_brands_active_trails();
			removeSectionClassActive();
			$('#section1').addClass('active'); 
			$('body').addClass('fp-viewing-' + menu_items[less_id]);
		    $('#menu.menu-list li[data-menuanchor=' + menu_items[less_id] + ']').addClass('active');			
		  }
		});
		
		var $root = $('html, body');
		var clicked = false;
		$('#menu.menu-list li a').click(function(event) {
		  event.preventDefault();
		  var href = $.attr(this, 'href');
		  if (!clicked) {
			clicked = true;
		    window.location.hash = href;
			$root.animate({
			  scrollTop: $('[data-anchor="' + href.split('#')[1] + '"]').offset().top - 100
		    }, 500, function () {
		 	  clicked = false;
			  
		    });
		  }
		});
		
		/* Переход на подраздел внутри страницы */
		
		if (window.location.pathname == '/o-nas') {
		  $('.inline-menu a[title="История"]').click(function(event) {
			$root.animate({
		  	  scrollTop: $('[data-anchor="history"]').offset().top - 100
		    }, 500, function () {
		  	  
			  window.location.hash = '#history';
		    });
		  });
		  
		  $('.inline-menu a[title="Миссия"]').click(function(event) {

			$root.animate({
		  	  scrollTop: $('[data-anchor="mission"]').offset().top - 100
		    }, 500, function () {
		  	  window.location.hash = '#mission';
		    });
		  });
		  
		  $('.inline-menu a[title="Новости"]').click(function(event) {

			$root.animate({
		  	  scrollTop: $('[data-anchor="news"]').offset().top - 100
		    }, 500, function () {
		  	  window.location.hash = '#news';
		    });
		  });
		}
		
		/* Если идёт переход на подраздел страницы О бренде с другой страницы */
		
		var $root = $('html, body');
		
		if (window.location.hash == '#history') {

		  $root.animate({
			scrollTop: $('[data-anchor="history"]').offset().top - 100
		  }, 500, function () {
		  });	
		}
		
		if (window.location.hash == '#mission') {

		  $root.animate({
			scrollTop: $('[data-anchor="mission"]').offset().top - 100
		  }, 500, function () {
		  });	
		}
		
		if (window.location.hash == '#news') {

		  $root.animate({
			scrollTop: $('[data-anchor="news"]').offset().top - 100
		  }, 500, function () {
		  });	
		}
		
		$('#move-section-down').click(function(e){
          e.preventDefault();
          var next_li = $('#menu.menu-list li.active').next();
		  if (next_li.attr('id') != 'move-section-down') {
			next_li.find('a').click();  
		  }
        }); 
		
		function removeSectionClassActive() {
		  $('#section1').removeClass('active');
		  $('#section2').removeClass('active');
		  $('#section3').removeClass('active');
		  $('#section4').removeClass('active');
		  $('#section5').removeClass('active');
		  
		  $('#menu.menu-list li').removeClass('active');
		  
		  $('body').removeClass('fp-viewing-brand');
		  $('body').removeClass('fp-viewing-history');
		  $('body').removeClass('fp-viewing-mission');
		  $('body').removeClass('fp-viewing-phylosophy');
		  $('body').removeClass('fp-viewing-news');
		}
      }
    }
    
   
}(jQuery));
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
		
		//Показываем фиолетовую линию подложку
		if (!$('ul.mainmenu').hasClass('active-line')) {
		  $('ul.mainmenu').addClass('active-line');	
		}
        //clearTimeout(hideTimeout);
		
		//Подчёркивание пункта меню
		$(item).addClass('active');
        
        // position centered for subitems has class 'no-face'
        var pos_item_width = $(item).width()/2;
        var pos_item = $(item).offset().left + pos_item_width;
        $(item).find('ul.no-face').css({'left': pos_item});
        
		var hrefcheck1 = $(item).find('a:first').attr('href');

		$(item).find('ul').addClass('fadein').removeClass('fadeout').fadeIn( 'fast' , function() {

		});
		
		$('.mainmenu-wrapper li.expanded').each(function( index ) {
		  if ($(this).find('a:first').attr('href') != hrefcheck1) {
			$(this).find('ul').fadeOut('fast').removeClass('fadein').removeClass('fadeout').parent().removeClass('active');   //.hide()
		  } 
		});
		
        $('#header-additional').css('visibility', 'visible').addClass('rolldown').removeClass('rollup');
		
        // Detect if item is parent menu item
        if($(e.target).parent().hasClass('expanded') && $(e.target).parent().attr('data-tid') !== undefined && !$(e.target).hasClass('child-menu')) {
            $('#megamenu-wrapper').fadeIn().css('visibility', 'visible');
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
            $('#megamenu-wrapper').fadeIn().css('visibility', 'visible');
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
            $('#megamenu-wrapper').fadeOut();
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
		$('ul.mainmenu').removeClass('active-line');
        hideTimeout = setTimeout(function() {
            $(item).find('li.expanded ul').fadeOut();
			$('#header-additional').css('visibility', 'hidden');
            $('#megamenu-wrapper').fadeOut();
        }, 450);
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
				showDropdown(e, this, 'visible');
				
            });
			
			/*$('ul.mainmenu li.expanded').on('mouseout', function(e) {
			  console.log('mouseleave ul.mainmenu li.expanded');
			  setTimeout(hideDropdown(this), 1000);
			});*/
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
            $('.search-block input[type=submit]').off('click');
			$('.search-block input[type=submit]').on('click', function(e) {
			  e.preventDefault();
			  var input_text = $('.search-block input[type=text]').val();
			  location.href = '/search-products?search=' + input_text;
			});
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
                $('#comments .trigger-wrapper').text('?? ?????? ?????? ??? ?? ?????? ??????.');
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
			
			$('form.commerce-add-to-cart input.form-submit').on('click', function () {
			  showCartPreview();
			  setTimeout('', 5000);
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
                    var output = '<span class="filter text-small regular black"><span class="underline">????</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">????? ????</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">???????????? ????</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
                    output += '<span class="filter text-small regular black"><span class="underline">??????? ????</span><a href="#" class="filter-mobile-close"><span class="icon-medium icon-cross-thick"></span></a></span>';
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
                    if($(this).attr('data-tab') == 5) {
						Drupal.behaviors.slickCarousels.review();
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

    // Scroll brand
    Drupal.behaviors.brandViewmore = {
        attach: function() {
            $('.block-about--description a.underline').on('click', function(){
              var container_viewmore = $(this).parents('.section').find('.block-about--viewmore');
              var section = $(this).parents('.section');
              var scroll_top_depth = $(window).height()*0.65/2;
              var position_slide = $(this).parents('.section').offset().top;
              var scroll_top_position = position_slide + scroll_top_depth;

              if(!container_viewmore.hasClass('active')){
				container_viewmore.addClass('active');
                $('body').animate({
			      scrollTop: container_viewmore.offset().top - 100
		        }, 1000, function () {
			      //window.location.hash = '#news';
		        });                
              }
              else {
                container_viewmore.removeClass('active');
              }
              //$.fn.fullpage.reBuild();
              return false;
            });
            $('.block-about--viewmore .close').on('click', function(){
              var container_viewmore = $(this).parents('.block-about--viewmore');
              container_viewmore.removeClass('active');
			  $('body').animate({
			    scrollTop: container_viewmore.offset().top - 400
		      }, 1000, function () {
		      });
              //$('.scrolling-content', container_viewmore).slideUp();
              return false;
              //$.fn.fullpage.reBuild();
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
            $.getJSON('/sites/all/themes/bp_pink/data/geodata-new.json', function(data) {
                localities = data;
            });
            
            var region_id = $('.block-map .form-type-region').change(function(){ 
            	 deleteMarkers();
            });
            
			$('#search-found-count').show();
			$('.block-map .form-type-city').change(function(){ 
			  
			  var city_id = $(this).val();
			  var retailer_id = $('select.form-type-retailer').val();
			  //console.log(city_id, retailer_id);
			  deleteMarkers();
		/*	  $.each( localities.cities, function( key, value ) {
				if (city_id == value['id']) {
				  showResults(city_id, retailer_id);
				}
			  });	*/
			});
			
			$('.block-map .form-type-retailer').change(function(){ 
			  var city_id = $('select.form-type-city').val();
			  var retailer_id = $('select.form-type-retailer').val();
			  $.each( localities.cities, function( key, value ) {
				if (city_id == value['id']) {
				  //showResults(city_id, retailer_id);
				}
			  });
			  deleteMarkers();
			  showAll(retailer_id);
			});
			
            function showHints() {
                $hints.show();
            }

            function hideHints() {
                $hints.hide();
            }

           /* function showResults(city_id, retailer_id) {
                //clearInterval(interval);
                var shops = [];
				$.each( localities.stores, function( key, store ) {
				  if (store.city_id == city_id) {
					if (retailer_id) {
					  if (retailer_id == store.retailer_id)	{
						shops.push({name: store.name, description: store.addr});  
					  }
					} else {
					  shops.push({name: store.name, description: store.addr});
					}
					
				  }
				});
                function checkCurrentPage() {
                    var index = $('.buy-search-result-page.active').index() + 1;
                    var text = String(index + ' �� ' + total_pages);
                    $('#buy-search-results-navigation .page-status').text(text);
                    if(shops.length > 0) {
                        $('#search-found-count').show();
                        $('.search-found-number').text(shops.length);
                    } else {
                        //$('#search-found-count').hide();
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
                var navigation = '<a href="#" class="previous control pink">&lsaquo; ����������</a><span class="page-status">1 �� 30</span><a href="#" class="next pink control">��������� &rsaquo;</a>';
                var output = '';
                for(var p=0; p<total_pages; p++) {
                    output += '<div class="buy-search-result-page" data-page="'+(p+1)+'">';
                    output += '<div class="row">';
                    for(var j=(p*per_page); j<per_page+(p*per_page); j++) {
                        if(typeof shops[j] === 'object') {
                            output += '<div class="buy-search-result-item col-12 col-lg-4 col-md-6">';
                            output += '<p class="text">'+shops[j].description+'</p>';
                            output += '<div class="title-retailer pink">'+shops[j].name+'</div>';
                            output += '</div>';
                        }
                    }
                    output += '</div>';
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
            }*/

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
                            //$('#search-found-count').css('opacity', .5);
                            //showResults($(this).text().trim());
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
    
    // Init map on page Where Buy
    Drupal.behaviors.whereBuy = {
      attach: function() {
        if($('.block-map').length > 0){
          var script_tag = document.createElement('script');
          script_tag.setAttribute("type","text/javascript");
          script_tag.setAttribute("src","https://maps.googleapis.com/maps/api/js?key=AIzaSyBgcFHz8ChNIgayolshf6_fYwbVw86HErc&callback=initMap");
          (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);   
          
          Drupal.behaviors.mapBuy.init();
          
          // Reference to the DIV that wraps the bottom of infowindow
          $('.block-map').on("click", function(){
            var iwOuter = $('.gm-style-iw');
            /* Since this div is in a position prior to .gm-div style-iw.
             * We use jQuery and create a iwBackground variable,
             * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
            */
            var iwBackground = iwOuter.prev();
  
            // Removes background corner
            iwBackground.css({'display' : 'none'});
            
            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'display' : 'none'});

            // Removes white background DIV
            iwBackground.children(':nth-child(4)').css({'display' : 'none'});

            // Moves the infowindow 115px to the right.
            iwOuter.parent().parent().css({left: '115px'});

            // Moves the shadow of the arrow 76px to the left margin.
            iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Moves the arrow 76px to the left margin.
            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Changes the desired tail shadow color.
            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(0, 0, 0, 0.35) 0px 3px 7px', 'z-index' : '1'});

            // Reference to the div that groups the close button elements.
            var iwCloseBtn = iwOuter.next();

            // Apply the desired effect to the close button
            iwCloseBtn.addClass('icon-cross-slim').css({opacity: '1', right: '57px', top: '22px', width: '20px', height: '20px', 'font-size': '18px', 'color': '#712b90'}); 
            $('img', iwCloseBtn).css({'display' : 'none'});
            
          });
          // load info about shops
          var regions = $('.block-map .form-type-region');
          var city = $('.block-map .form-type-city');
          var retailer = $('.block-map .form-type-retailer');
          var localities;
          $.getJSON('https://www.myblackpearl.ru/sites/all/themes/bp_pink/data/geodata-new.json', function(data) {
              localities = data;
          

          regions.chosen({disable_search: true});           
          city.chosen({disable_search: true});           
          retailer.chosen({disable_search: true});       
          
          regions.change(function(){
            var region_id = $(this).val();
            refreshCitiesOptions(region_id, localities);
          });
          
          city.change(function(){
            var city_id = $(this).val();
            if (city_id) {
              $.each( localities.cities, function( key, value ) {
                if (city_id == value['id']) {
                  map.setCenter({lat: value['lat'], lng: value['lon']});
                  map.setZoom(10);
                }
              });		  
            }
          });
		  
          function refreshCitiesOptions(region_id, localities) {
          var cities_list = [];
          $.each( localities.cities, function( key, value ) {
            if (value['region_id'] == region_id) {
            cities_list.push(value);
            }
            
            
          });
          
          $('select.form-type-city').html('');
          //$('select.form-type-city').append( '<option value="" selected="selected">������� ��� �����</option>' );
          $('select.form-type-city').append( '<option value="" selected="selected">Укажите Ваш город</option>' );
          $.each( cities_list, function( key, city ) {
            $('select.form-type-city').append( '<option value="' + city.id + '" >' + city.name + '</option>' );
            $('select.form-type-city').trigger("chosen:updated");
          });
          }
          
          });
        }        
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
(function($) {

     Drupal.behaviors.shopPages = {
        attach: function() {
            // Compare Page
            if($('.compare-table').length > 0) {
                if($('#bp-carousel-compare-content .product-item').length > 0) {
                    $('#add-to-compare').hide();
                    $('#compare-table-wrapper').show();
                    Drupal.behaviors.slickCarousels.compare();
                    Drupal.behaviors.shopPages.equalizeCellHeights();
                    if($('.bp-carousel-compare-thead-wrapper .trigger-show-main-propeties').hasClass('active')){
                        $('.compare-table .compare-cell.secondary-properties').addClass('hidden');
                    }
                } else {
                    $('#compare-table-wrapper').hide();
                    $('#add-to-compare').show();
                }
            }

            // Cart Page
            if($('.cart-table').length > 0) {
                // Checkout form
                var firstname = '',
                    lastname = '',
                    cell = '',

                    delivery = '',
                    deliveryPrice = 0,

                    payment = '',

                    city = $('select[name="personal_data_city"]').val().trim(),
                    street = '',
                    building = '',
                    flat = '',
                    entrance = '',
                    code = '',
                    floor = '',

                    day = $('select[name="date_day"]').val().trim(),
                    time = $('select[name="date_time"]').val().trim();

                function checkoutActions() {

                    // Trigger Checkout
                    $('#shop').on('change', function() {
                        if($(this).val() !== '') {
                            $('.cart-subtotal, .cart-checkout-prompt').hide();
                            $('.trigger-checkout').parent().show();
                            $('.trigger-modal').parent().show();
                        }
                    });

                    // See if user has logged in and selected the shop
                    var query = window.location.search;
                    var shopID = query.substr(query.search('=')+1, query.length);
                    if(shopID.length > 0) {
                        $('#shop').val(shopID).change();
                    }

                    // Trigger Checkout
                    $('.trigger-checkout').on('click', function(e) {
                        e.preventDefault();
                        $('.checkout-wrapper').show();
                        $('.trigger-checkout').parent().hide();
                        $('.trigger-checkout-delivery-method').parent().show();
                    });

                    // Trigger Checkout Delivery Method
                    $('.trigger-checkout-delivery-method').on('click', function(e) {
                        e.preventDefault();
                        if($('input[name="delivery_method"]:checked').length > 0) {
                            $('.trigger-checkout-delivery-method').parent().hide();
                            $('.checkout-payment-method').show();
                            $('.trigger-checkout-payment-method').parent().show();
                        }
                    });

                    // Trigger Checkout Payment Method
                    $('.trigger-checkout-payment-method').on('click', function(e) {
                        e.preventDefault();
                        if($('input[name="payment_method"]:checked').length > 0) {
                            $('.trigger-checkout-payment-method').parent().hide();
                            $('.checkout-personal-data').show();
                            $('.trigger-checkout-personal-data').parent().show();
                        }
                    });

                    // Trigger Checkout Personal Data
                    $('.trigger-checkout-personal-data').on('click', function(e) {
                        e.preventDefault();
                        if(
                            $('input[name="personal_data_firstname"]').val() !== '' &&
                            $('input[name="personal_data_lastname"]').val() !== '' &&
                            $('input[name="personal_data_cell"]').val() !== '' &&
                            $('input[name="personal_data_street"]').val() !== '' &&
                            $('input[name="personal_data_building"]').val() !== ''
                        ) {
                            $('.trigger-checkout-personal-data').parent().hide();
                            $('.checkout-date').show();
                            $('.trigger-checkout-date').parent().show();
                        }
                    });

                    // Trigger Checkout Date
                    $('.trigger-checkout-date').on('click', function(e) {
                        e.preventDefault();
                        $('.trigger-checkout-date').parent().hide();
                        $('.checkout-confirmation').show();
                        $('.trigger-checkout-confirmation').parent().show();
                    });

                    // Trigger Checkout Confirmation
                    $('.trigger-checkout-confirmation').on('click', function(e) {
                        
                    });
                }

                function getSubTotal() {
                    var sum = 0;
                    $('.cart-table-body tr').each(function() {
                        var qty = parseInt($(this).find('.quantity').val());
                        if(qty) {
                            var price = parseFloat($(this).find('.price-value').text().trim().replace(',', '.').replace(' ', ''));
                            sum += price * qty;
                        }
                    });
                    return sum;
                }

                function updateTotal() {
                    var total = getSubTotal() + deliveryPrice;
                    $('.cart-subtotal-sum').text(getSubTotal() + ',00');
                    $('.cart-total-sum').html('<strong>'+total + '</strong>,00');
                    $('.cart-delivery-sum').text(deliveryPrice + ',00');
                }

                function receiver() {
                    if(firstname.length > 0 && lastname.length > 0 && cell.length > 0) {
                        return firstname + ' ' + lastname + '<br>' + cell;
                    }
                    return '';
                }

                function deliveryMethod() {
                    if(delivery.length > 0) {
                        return delivery;
                    }
                    return '';
                }

                function paymentMethod() {
                    if(payment.length > 0) {
                        return payment;
                    }
                    return '';
                }

                function deliveryDate() {
                    if(day.length > 0 && time.length > 0) {
                        return '???????? ' + day + ', ' + time;
                    }
                    return '';
                }

                function address() {
                    var output = '';

                    output += city.length > 0 ? city : '';
                    output += street.length > 0 ? ', ' + street : '';
                    output += building.length > 0 ? ', ??? ' + building : '';
                    output += flat.length > 0 ? ', ??. ' + flat : '';
                    output += entrance.length > 0 ? ', ??????? ' + entrance : '';
                    output += code.length > 0 ? ', ??? ???????? ' + code : '';
                    output += floor.length > 0 ? ', ???? ' + floor : '';

                    return output;
                }

                checkoutActions();

                $('input[name="delivery_method"]').on('change', function() {
                    delivery = $(this).val().trim();
                    deliveryPrice = parseFloat($('.'+$(this).attr('id')).text().replace(',', '.').replace(' ', ''));
                });
                $('input[name="payment_method"]').on('change', function() {
                    payment = $(this).val().trim();
                });
                $('input[name="personal_data_firstname"]').on('change', function() {
                    firstname = $(this).val().trim();
                });
                $('input[name="personal_data_lastname"]').on('change', function() {
                    lastname = $(this).val().trim();
                });
                $('input[name="personal_data_cell"]').on('change', function() {
                    cell = $(this).val().trim();
                });
                $('select[name="date_day"]').on('change', function() {
                    day = $(this).val().trim();
                });
                $('select[name="date_time"]').on('change', function() {
                    time = $(this).val().trim();
                });
                $('select[name="personal_data_city"]').on('change', function() {
                    city = $(this).val().trim();
                });
                $('input[name="personal_data_street"]').on('change', function() {
                    street = $(this).val().trim();
                });
                $('input[name="personal_data_building"]').on('change', function() {
                    building = $(this).val().trim();
                });
                $('input[name="personal_data_flat"]').on('change', function() {
                    flat = $(this).val().trim();
                });
                $('input[name="personal_data_entrance"]').on('change', function() {
                    entrance = $(this).val().trim();
                });
                $('input[name="personal_data_code"]').on('change', function() {
                    code = $(this).val().trim();
                });
                $('input[name="personal_data_floor"]').on('change', function() {
                    floor = $(this).val().trim();
                });

                var checkoutInterval = setInterval(function() {
                    $('.confirmation-personal-data p').html(receiver());
                    $('.confirmation-delivery-method p').html(deliveryMethod());
                    $('.confirmation-payment-method p').html(paymentMethod());
                    $('.confirmation-date p').html(deliveryDate());
                    $('.confirmation-address p').html(address());
                    updateTotal();
                    Drupal.behaviors.shopPages.updateQuantity();
                }, 1000);
            }
            
            if($('.cart-total').length === 0) {
                $('.trigger-clear-cart').off('click');
                $('.trigger-clear-cart').on('click', function(e) {
                    e.preventDefault();
                });
            }        
            
            if($('.cart-table').length > 0) {
                $('.trigger-trash').off('click');
                $('.trigger-trash').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    Drupal.behaviors.shopCart.removeProduct(this);
                    setTimeout(function() {
                        if(parseInt($('.cart-status .indicator').text().trim()) === 0) {
                            window.location = '/cart';
                        }
                    }, 1000);
                });
            }
            
        	$('.cart-status > a.trigger-cart').on("click", function(){
        		text = $('.cart-status > a.trigger-cart span.indicator').text();       		    		
        		if (text === "0"){ 
                	$('#btn-for-empty').trigger('click');
                }
        	});       	           
            
        },
        equalizeCellHeights: function() {
            var rows = {};

            // Populate the rows object with maximum height of cells in a row
            $('.compare-table').each(function() {
                $(this).find('.compare-cell').each(function(cellIndex) {
                    if(typeof rows[cellIndex] === 'undefined') {
                        rows[cellIndex] = 0;
                    }
                    if($(this).outerHeight() > rows[cellIndex]) {
                        rows[cellIndex] = $(this).outerHeight();
                    }
                });
            });

            // Resize the cells according to maximum height to make them even
            $('.compare-table').each(function() {
                for(var index in rows) {
                    $(this).find('.compare-cell').eq(index).css('height', rows[index] + 25);
                }
            });
        },
        updateQuantity: function() {
            var text = '';
            var qty = parseInt($('.cart-status .indicator').text().trim());

            if(qty === 1) {
                text = '1 продукт';
            } else if(qty > 1 && qty < 5) {
                text = qty + ' продукта';
            } else {
                text = qty + ' продуктов';
            }

            $('.cart-subtotal-products').text(text); 
        }
    } 

    /**
     * Catalogue Page
     */
    Drupal.behaviors.shopCataloguePage = {
        attach: function() {
            function build_query() {
                query = {"type": "html", "image_style": "teaser_normal", "portion_size": 12};

				$('.catalogue-forms .accordion').each(function() {
                    var $form = $(this);
                    var trigger = $form.find('.trigger-catalogue-form');
                    var field = $(trigger).attr('data-field');
                    var type = $(trigger).attr('type');

                    switch(type) {
                        case 'radio':
                            var value = $('.catalogue-forms input[name="'+field+'"]:checked').val();
                            if($('.catalogue-forms input[name="'+field+'"]:checked').length > 0) {
                                query[field] = value;
                            }
                            break;

                        case 'checkbox':
                            var value = '';
                            $('.catalogue-forms input[data-field="'+field+'"]').each(function() {
                                if($(this).is(':checked')) {
                                    if(value.length > 0) {
                                        value += ',';
                                    }
                                    value += $(this).val();
                                }
                            });
                            if($('.catalogue-forms input[data-field="'+field+'"]:checked').length > 0) {
                                query[field] = value;
                            }
                            break;

                        default:
                            break;
                    }
                });
                return query;
            }

            function init_query() {
                var params = build_query();
                var url = '/api/get/products/';
                
                $('.catalogue-products .ajax-loader').show();
                $('#catalogue-products-view').css('opacity', .25);
                
                Drupal.behaviors.slickCarousels.productsViewUnslick();
                
                $.get(url, params, function(data) {
                    $('.catalogue-products .ajax-loader').hide();
                    $('#catalogue-products-view').css('opacity', 1).html(data);
                    
                }).done(function(data) {
                  
                  Drupal.behaviors.slickCarousels.productsView();

                  //Drupal.attachBehaviors($('form.commerce-add-to-cart'), Drupal.settings);
                });
            }
			
            var win = $(window);
            var loading = false;
            win.scroll(function() {
              // End of the document reached?
              
              //console.log($(document).height() + ' - ' + win.height() + ' = ' + win.scrollTop() + ' _ ' + loading);
              if ((($(document).height() - win.height()) <= (win.scrollTop() + 800)) && !loading) {
                loading = true;
                var params = build_query();
                var portion = 20;
                var count = $('#catalogue-products-view').children().length;
                if (count > 10) {
                  params['min'] = count;	
                  params['max'] = portion;
                  var url = '/api/get/products/';
                          $('.catalogue-products .ajax-loader').show();
                          $('#catalogue-products-view').css('opacity', .25);
                  //console.log(params);
                  $.get(url, params, function(data) {
                      $('.catalogue-products .ajax-loader').hide();
                      $('#catalogue-products-view').css('opacity', 1).append(data);
                      loading = false;
                  }).done(function(data) {
                    
                    //Drupal.behaviors.slickCarousels.productsViewUnslick();
                    //Drupal.behaviors.slickCarousels.productsView();
                    
                    
                    /*$('form.commerce-add-to-cart').each(function() {
                    $(this).attr('action', '/catalogue');  
                    });*/
                    //Drupal.attachBehaviors($('form.commerce-add-to-cart'), Drupal.settings);
                  });
                }
              }
            });
			
            if($('.catalogue-forms').length > 0) {
              
              //Reset-button
              $('.catalogue-filters .reset-button').on('click', function(e) {
                e.preventDefault();
                $('.accordion-wrapper.catalogue-forms input').each(function() {
                  if ($(this).is(':checked')) {
                  $(this).removeAttr('checked');
                }
                if ($(this).attr('disabled') == 'disabled') {
                  $(this).removeAttr('disabled');
                }
                });
                init_query();
              });
				
              $('.trigger-catalogue-form').on('click', function(e) {
                  
                  var data = {};
                  var has_one_checked = false;
                  $('.accordion-wrapper.catalogue-forms input').each(function() {
                    if (!data[$(this).attr('data-field')]) {
                      data[$(this).attr('data-field')] = {};
                    }
                    var ind = $(this).attr('data-tid');
                    if ($(this).is(':checked')) {
                    ind += '_checked'; 
                    has_one_checked = true;
                    }
                    data[$(this).attr('data-field')][ind] = $(this).attr('data-tid');					  
                  });
                  //console.log(data);
                  $('.accordion-wrapper.catalogue-forms input').each(function() {
                    if ($(this).attr('disabled') == 'disabled') {
                      $(this).attr('disabled', false);
                    }
                    });
                  if (has_one_checked) {
                  
                    $.post('/api/filters_reset', data, function(response) {
                            //response = $.parseJSON(response);
                      
                      for (var field_name in response) {
                        for (var key in response[field_name]) {
                          if (key.split('disabled').length == 2) {
                          $('.accordion-wrapper.catalogue-forms input[data-field="' + field_name + '"][data-tid="' + response[field_name][key] + '"]').attr('disabled', 'disabled');  
                          }	
                        }
                      }
                      
                    });
                  }
                  init_query();
              });
              init_query();
            }
        }
    }


    /**
     * General Methods
     */
    Drupal.behaviors.shopProductsByIds = {
        get: function(ids, func) {
            $.getJSON('/api/get/products/', {"ids": ids, "type": "json"}, function(data) {
                func(data);
            });
        }
    }
    
    /* Drupal.behaviors.productHistoryBack = {
      attach: function() {
        $('.button-back-wrapper a').on('click', function(e) {
          e.preventDefault();
          window.history.back();
        });
      }
    } */
    Drupal.behaviors.videoClick = {
        attach: function() {
          $('.video-wrapper .video-wrapper-link').on('click', function(e) {
            var poster = $(this).find('.video-poster');
		    var arrow = $(this).find('span.arrow-video');
		    var title = $(this).find('span.video-title');
		    var iframe = $(this).find('iframe');
			
		    arrow.fadeOut();
            title.fadeOut();
		    
			poster.css('z-index', 101);
		    arrow.css('z-index', 102);
		    title.css('z-index', 102);
		    
		    iframe[0].src += "?autoplay=1";
		    iframe.css('visibility', 'visible');
		  
		    setTimeout(function () {
			  poster.fadeOut();
			  poster.css('z-index', 1);
			  arrow.css('z-index', 1);
			  title.css('z-index', 1);
		    }, 800);
          
            var data = {nid: $(this).attr('class').split('nid-')[1]};
            $.post('/video_list/add_node_view', data, function(response) { });
          
            e.preventDefault();
          });
        }
    }
    
    Drupal.behaviors.videoTeaserClick = {
        attach: function() {
          $('.bp-card-video-content .arrow-video').on('click', function(e) {
            var poster = $(this).parents('.bp-card-video-content').find('.video-poster');
			var iframe = $(this).parents('.bp-card-video-content').find('iframe');
			
			poster.css('z-index', 101);
			iframe[0].src += "&autoplay=1";
		    iframe.css('visibility', 'visible');
			
			setTimeout(function () {
			  poster.fadeOut();
			  poster.css('z-index', 1);
		    }, 800);
			
			/*$(this).parents('.bp-card-video-content').addClass('show-video');
            $(this).parents('.bp-card-video-content').find('.arrow-video').fadeOut();
            $(this).parents('.bp-card-video-content').find('.video-title').fadeOut();
            $(this).parents('.bp-card-video-content').find('img').fadeOut();
            $(this).parents('.bp-card-video-content').find('.embed-responsive-16by9:before').css({'padding-top': '56.25%'});
            $(this).parents('.bp-card-video-content').find('iframe').css('visibility', 'visible');
            //$(this).find('iframe').css('height', '272px');
            //$(this).css('height', '292px');
            $(this).parents('.bp-card-video-content').find('iframe')[0].src += "&autoplay=1";*/
            
            //var data = {nid: $(this).attr('class').split('nid-')[1]};
            //$.post('/video_list/add_node_view', data, function(response) { });
          
            e.preventDefault();
          });
        }
    }
	
	//Для анонима всплывающее окно при клике на Оформить зака в корзине
	Drupal.behaviors.anonymCheckout = {
        attach: function() {
		  $('.not-logged-in .commerce-line-item-views-form #edit-checkout').on("click", function(e) {
		    $('.trigger-smodal[data-id="nslogin"]').click()
			e.preventDefault();
		  });
		}
	}
	
	//Для анонима всплывающее окно при клике на Оформить зака в корзине
	Drupal.behaviors.bpFiveStar = {
        attach: function() {
		  
		  bpFivestarHoverTrigger();
		  bpFivestarSetTrigger();
		  
		  $( document ).ajaxComplete(function() {
		    bpFivestarHoverTrigger();
			bpFivestarSetTrigger();
		  });
		  
		  function bpFivestarSetTrigger() {
			var clicked = [];
			
			$('.node-rating .fivestar-widget .star').off("click");
			$('.node-rating .fivestar-widget .star').on( "click", function(e) {
			  var fivestrawidget = $(this).parents('.fivestar-widget');
			  fivestrawidget.fadeOut();
			  $( "<p class = 'thanks'>Спасибо. Ваш голос учтён!</p>" ).insertBefore( fivestrawidget );
			  var rating = $(this).find('a').attr('href').split('#')[1];
			  var nid = $(this).parents('.node-rating').attr('class').split('nid-')[1].split(' ')[0];
			  if (!(nid in clicked)) {
				clicked[nid] = nid;  
			    $.ajax({
			      method: "POST",
			      url: "/set_fivestar_rating",
			      data: { nid: nid, rating: rating},
			      success: function(data) {
					setTimeout(function () {
					  $('.thanks').hide();
					  var new_widget = $(data).find('.fivestar-widget');
					  var wrapper = fivestrawidget.parents('.node-rating');
					  fivestrawidget.remove();
					  wrapper.append(new_widget);
					  
					  bpFivestarHoverTrigger();
					  bpFivestarSetTrigger();
					}, 800);
					
				  }
				});
			  }
			  e.preventDefault();
			});  
		  }
		  
		  //Функция закрашивания звёздочек при наведении
		  function bpFivestarHoverTrigger() {
			var bpfivestar_hover = function() {
			  var current_star = $(this);
			  var stop = false;
			  current_star.parents('.fivestar-widget').find('.star').each(function( index ) {
				if (!stop) {
				  $(this).addClass("hover");
				} else {
				  $(this).removeClass("hover");
				}
				if ($(this).attr('class') == current_star.attr('class')) {
				  stop = true;	
				} 
			  });
			  /*$('.fivestar-widget-5').hover(
				  function(){
					  $('.fivestar-widget-5 div').hover(
						  function(){
							  var stars = $(this).nextAll();
							  stars.addClass('check-stars-off');
						  },
						  function(){
							  var stars = $(this).nextAll();
							  stars.removeClass('check-stars-off');
						  }
					  );
				  },
				  function(){
					  $('.fivestar-widget-5 div').removeClass('check-stars-on, check-stars-off');
				  }
			  );*/
            };
            var bpfivestar_unhover = function(){
              $(this).find('.star').each(function( index ) {
				$(this).removeClass("hover");
			  });
            };
            $('.node-rating .fivestar-widget .star').off("mouseover", bpfivestar_hover);
            $('.node-rating .fivestar-widget').off("mouseout", bpfivestar_unhover);
            
            $('.node-rating .fivestar-widget .star').on("mouseover", bpfivestar_hover);
            $('.node-rating .fivestar-widget').on("mouseout", bpfivestar_unhover);
		  }
		}
	}
     
    $('.page-taxonomy-term-4 article.bp-card.opaque').click(function(){
        window.open("https://www.myblackpearl.ru/y-zone");
    });
    // $('.usermenu li a').hover(function(){

    // });
    // $('.usermenu li a').hover(
    //     // при наведении
    //     function(){
    //         $('.usermenu li a .tooltip').removeClass('active');
    //         $(this).addClass('active1');
    //         $('.tooltip', this).addClass('active');
    //     },
    //     // // при уходе
    //     function(){
    //         setTimeout(function() {
    //             $('.tooltip', this).removeClass('active');
    //         }, 
    //         1000); // 1 sek
    //     }
    // );

    $(".usermenu li a").mouseenter(function(){
        $(".usermenu li a .tooltip").hide();
        var cart_item = $(this).find(".indicator").text();
        if (cart_item < 1 || cart_item == "") {
            $(this).find(".tooltip").stop();
            clearTimeout($(this).data('timeoutId'));
            $(this).find(".tooltip").fadeIn("slow");
        }
    }).mouseleave(function(){
        var someElement = $(this),
            timeoutId = setTimeout(function(){
                someElement.find(".tooltip").fadeOut("slow");
            }, 5000);
        //set the timeoutId, allowing us to clear this trigger if the mouse comes back over
        someElement.data('timeoutId', timeoutId); 
    });

    // вариант 1
    // $('.usermenu li a').mouseover(function() {
    //     $(this).addClass('active1');
    //     $(this).animate({ opacity: "0" }, 700);
    // });
    // $('.usermenu li a').mouseout(function() {
    //     $(this).stop().animate({ opacity: "1" }, 1000);
    //     $(this).removeClass('active1');
    // });

    // вариант 2

    // $( ".usermenu li a" ).mouseenter(function() {
    //     $(this).addClass('active1');
    // }).mouseleave(function() {
    //     setInterval(function() {
    //       console.log('mouseleave1');
    //         $(this).removeClass('active1');
    //     }, 100);
    //     setTimeout(function() {
    //         console.log('mouseleave2');
    //         $(this).removeClass('active1');
    //     }, 
    //     1000); // 1 sek
    // });
    $("#bp-slideshow article").addClass(function(i,old){ 
		i++; // увеличим на 1, т.к. отсчет начинается с 0
		return 'bp-card' + i;
	});

}(jQuery));