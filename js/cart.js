(function ($) {
	$(document).ready(function () {
		if ($('.checkbox-wrap').length) {
			$('.checkbox-wrap input').styler();
		}

		if ($('.radio-wrap').length) {
			$('.radio-wrap input').styler();
		}

		if ($('.select-wrap').length) {
			$('.select-wrap select').styler();
		}

		$('.news-address-check').on('click', function () {
			$('.new-address-item input').attr('checked', true);
			$('input').trigger('refresh');
			$('.new-address-item').slideDown();
			$('.news-address-check').fadeOut();
		});
		
		$('.cart-tabs-link').first().on('click', function () {
			if ($('.other-slider').length && !$('.other-slider').hasClass('slick-initialized')) {
				$('.other-slider').slick({
					dots: true,
					prevArrow: '.other-slider-wrap .prev-nav',
					nextArrow: '.other-slider-wrap .next-nav',
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					responsive: [
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 3
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 2
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1
							}
						}
					]
				});
			}
		});

		// Для демонстрации, удалить:
		$('.cart-not-logged button[type=submit]').on('click', function () {
			$('.cart-tabs-link').first().click();
			return false;
		});

		$('.count-nav-minus').on('click', function () {
			var input = $(this).closest('.count-wrap').find('.count-field input');
			var input_count = input.val();
			if (input_count > 1) {
				input.val(parseInt(input_count) - 1);
			}
		});

		$('.count-nav-plus').on('click', function () {
			var input = $(this).closest('.count-wrap').find('.count-field input');
			var input_count = input.val();
			if (input_count < 100) {
				input.val(parseInt(input_count) + 1);
			}
		});

		$('.remove-from-cart').on('click', function () {
			var tr = $(this).closest('tr');
			tr.fadeOut(500, function () {
				tr.remove();
			});
		});

		$('.fake-select span').on('click', function () {
			$('.fake-select ul').addClass('active');
		});

		$('.fake-select ul li').on('click', function () {
			$('.fake-select span img').attr('src', $(this).find('img').attr('src'));
			$('.fake-select ul').removeClass('active');

		});
		
		$('button.remove-from-cart').on('click', function(){
			$('.cart-main-table').prepend('<div class="wait-search-form"><span></span></div>');			
		});
	});//
	
	Drupal.behaviors.bpCart = {
	  showCartPreview: function (context) {
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
      },
	  hideCartPreview: function (context) {
	    Drupal.behaviors.slickCarousels.cartPreview('unslick');
        $('#bp-carousel-cart-preview').html('');
        $('#cart-preview').removeClass('showCartPreview');
	  }	  
	}
}(jQuery));