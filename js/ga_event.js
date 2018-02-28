
function sendGa(category, action, label, val=0){
	var trackerName = ga.getAll()[0].get('name');
	ga(trackerName + '.send', 'event', { eventCategory: category, eventAction: action, eventLabel: label, eventValue: val });
}

function sendFormGa(category){
	var trackerName = ga.getAll()[0].get('name');
	ga(trackerName + '.send', 'event', { eventCategory: category});
}

function eventOrderSuccess(){
	var trackerName = ga.getAll()[0].get('name');
	ga(trackerName + '.send', 'event', { eventCategory: 'order', eventAction: 'success'});
}

(function($) {
	
	
	//иконка поиска
    $('.trigger-search .icon-magnifier').on('click', function() {
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'icon-menu', eventLabel: 'find'});
    });	
    
    //ввод в строку поиска
    $('.search-block input[type="text"]').keyup(function(){
    	 var Value = $('.search-block input[type="text"]').val();

    	  if(Value.length == 1){
    		  var trackerName = ga.getAll()[0].get('name');
    		  ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'search-panel-query'});
    	  }
    });
    

	//иконка Корзина
    $('.trigger-cart').on('click', function() {
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'icon-menu', eventLabel: 'cart'});
    });	
    
    //иконка Корзина (в попапе)
    $('.btn.btn-oval.bg-pink.text-small').on('mousedown', function() { 
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'icon-menu', eventLabel: 'cart'});
	});	
    
	//иконка Сравнение
    $('.compare-status a').on('click', function() {
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'icon-menu', eventLabel: 'compare'});
    });	
    
	//иконка Избранное
    $('.favorite-status a').on('click', function() {
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'icon-menu', eventLabel: 'favorites'});
    });	
    
    
  //Переход по баннеру, параметр нужно задать в контенте баннера
    $('.bp-card-container a').on('click', function() {    	
    	var param = $(this).parent().parent().find(".tat").data("id");    	
    	if(param){
    		var trackerName = ga.getAll()[0].get('name');
    		ga(trackerName + '.send', 'event', { eventCategory: 'header', eventAction: 'slider-banner', eventValue: param});
    	}

    });	
    
    //переход к каналу в инстаграме
    $('.insta-subscribe').on('click', function() {   
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'instagram', eventLabel: 'canal-follow'});
    });	
   
    //переход к конкретному посту в инстаграме
    $('.insta-slide').on('click', function() {    
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'instagram', eventLabel: 'post-follow'});
    });	
    
    //кнопка 'где купить'
    $('.w-buy.buy-product').on('click', function() {    
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'footer', eventAction: 'bye'});
    });	
   
    //кнопка 'подписаться'
    $('.w-buy.subs-prod').on('click', function() {    
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'footer', eventAction: 'subscribe'});
    });	
    
    //выбор фильтра
    $('.catalogue-filters .form-item input').on('click', function() {
    	var trackerName = ga.getAll()[0].get('name');
    	ga(trackerName + '.send', 'event', { eventCategory: 'catalog', eventAction: 'filter-tab'});
    });	
   
    //рейтинг продукта
    $('.fivestar-widget-5').on('click', function() {
	var trackerName = ga.getAll()[0].get('name');	
	ga(trackerName + '.send', 'event', { eventCategory: 'product-page', eventAction: 'rating-click'});
    });	  
   
    
    //отзывы на продукт
    $('.horizontal-tabs a').on('click', function() { 
    	if($(this).parent().data('tab')==5){
    		var trackerName = ga.getAll()[0].get('name');	
    		ga(trackerName + '.send', 'event', { eventCategory: 'product-page', eventAction: 'review-tab'});
    	}
    });	 
    //добавить в корзину (со страницы продукта)
    $('.product-page-controls .commerce-add-to-cart input[type="submit"]').on('mousedown', function() { 
    	var trackerName = ga.getAll()[0].get('name');	
		ga(trackerName + '.send', 'event', { eventCategory: 'product-page', eventAction: 'add-cart'});    	
    });	
    
    //добавить в корзину (ХИТ на главной)
    $('#bp-slideshow-new .commerce-add-to-cart input[type="submit"]').on('mousedown', function() { 
    	var prod_id = $(this).parent().find('input[name="product_id"]').val();
		var trackerName = ga.getAll()[0].get('name');	
		ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'hit', eventLabel: 'add-cart', eventValue: prod_id});
	});	
    
    //добавить в корзину (Выбор месяца)
    $('#block-system-main .commerce-add-to-cart input[type="submit"]').on('mousedown', function() { 
    	var prod_id = $(this).parent().find('input[name="product_id"]').val();
		var trackerName = ga.getAll()[0].get('name');	
		ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'popular', eventLabel: 'add-cart', eventValue: prod_id});
	});	
 
    //начало оформления заказа
	  $('.logged-in .commerce-line-item-views-form #edit-checkout').on("click", function(e) {
		  	var trackerName = ga.getAll()[0].get('name');
		  	ga(trackerName + '.send', 'event', { eventCategory: 'order', eventAction: 'start'});
	  });
	  
    setTimeout(function () {
	
    		//Навигация ХИТ
    	   $('#slideshow-new-wrapper .slick-dots').on('click', function() { 
    		   var trackerName = ga.getAll()[0].get('name');
    		   ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'hit', eventLabel: 'nav-dots'});
    		});	
    	   
    	 //навигация Выбор месяца
    	   $('#block-system-main .slick-arrow').on('click', function() { 
        	   var trackerName = ga.getAll()[0].get('name');
    		   ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'popular', eventLabel: 'nav-arrows'});
	   		});	
    	   
    	   //навигация Выбор месяца
    	   $('#block-system-main .slick-dots').on('click', function() { 
        	   var trackerName = ga.getAll()[0].get('name');
    		   ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'popular', eventLabel: 'nav-dots'});
      		});	
    	   
    	 //навигация Инста-блок
    	   $('#insta-carousel .slick-arrow').on('click', function() { 
    		   var trackerName = ga.getAll()[0].get('name');
    		   ga(trackerName + '.send', 'event', { eventCategory: 'home', eventAction: 'instagram', eventLabel: 'nav-arrows'});
	   		});	
	}, 3000);
    
    setTimeout(function () {

    	   
    	}, 3000);
    
    var timerId = setInterval(function() {
		    //добавить в корзину (со страницы каталога)
	    $('#catalogue-products-view .commerce-add-to-cart input.form-submit:not(.click_event)').on('click', function(e) {
		    	var dsf = $(this).parent().find('input[name="form_build_id"]').val();
		    	var form_token = $(this).parent().find('input[name="form_token"]').val();
		    	var product_id = $(this).parent().find('input[name="product_id"]').val();
		    
		    	var data = {};
		    	data['product_id']=product_id;
		    	data['form_build_id']=dsf;
		    	data['form_id']='commerce_cart_add_to_cart_form_'+product_id;
		    	data['form_token']=form_token;
		    	
		 
		    	
		    	  $.post('/system/ajax', data, function(response) { });
		  		
		          if($(window).width() >= 1200  /*&& parseInt($('.cart-status .indicator').text()) > 0*/) {
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
		            	  $('.cart-status .indicator').addClass('indicator_catalog').removeClass('indicator');
		            //	  $('.cart-status .trigger-cart').removeData('toggle');
		            	  $('.cart-status .trigger-cart').removeAttr('data-toggle');
		            	  
		            	  var text = '';
		                  var qty = parseInt($('.cart-status .indicator_catalog').text().trim());

		                  qty = qty+1;
		                  $('.cart-status .indicator_catalog').text(qty);
		                  if(qty === 1) {
		                      text = '1 продукт';
		                  } else if(qty > 1 && qty < 5) {
		                      text = qty + ' продукта';
		                  } else {
		                      text = qty + ' продуктов';
		                  }

		                  $('.cart-subtotal-products').text(text);
		              }, 500);
		          }
		    	
		         
		    	var prod_id = $(this).parent().find('input[name="product_id"]').val();
		    	var trackerName = ga.getAll()[0].get('name');	
				ga(trackerName + '.send', 'event', { eventCategory: 'product-page', eventAction: 'add-cart', eventValue: prod_id}); 
				return false;
		
		    });	
	    $('#catalogue-products-view .commerce-add-to-cart input.form-submit').addClass('click_event');
    	}, 250);
   
}(jQuery));

