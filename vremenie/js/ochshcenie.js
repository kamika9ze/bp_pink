
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      height: '100%',
      width: '100%',
      videoId: 'aiJYzJvx_Sc',
      playerVars: { 'autoplay': 0, 'controls': 0, 'disablekb':0, 'iv_load_policy':3, 'modestbranding':1, 'showinfo':0, 'border':0},
      events: {
        'onStateChange': onPlayerStateChange
      }
    });
  }
  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    event.target.playVideo();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED && !done) {
      jQuery('.box-video').fadeOut('400', function() {});
    }
  }
  function stopVideo() {
    player.stopVideo();
  }
jQuery(document).ready(function(){
  jQuery(document).on('click', '.nav-tabs li a', function() {
    jQuery('.btn-reset-filter').show();
    jQuery(this).parents('.want-morning-evening').addClass('active');
  });
  jQuery(document).on('click', '.btn-reset-filter', function() {
    // jQuery('.skin-type').show();
    jQuery('.want-morning-evening').hide();
    jQuery('.btn-reset-filter').hide();
    jQuery('.nav-tabs li a.active').removeClass('show');
    jQuery('.nav-tabs li a.active').removeClass('active');
    jQuery('.tab-pane.active').removeClass('show');
    jQuery('.tab-pane.active').removeClass('active');
    jQuery('.want-morning-evening').removeClass('active');
    jQuery('.box-want-product-item-popap').hide();
    jQuery('.box-want-morning, .box-want-evening, .block-ideal-means').removeClass('popap');
    jQuery('body').removeClass('popap');
  });
  jQuery(document).on('click', '.box-want-product-item a.open_popap', function() {
    // jQuery('.tab-content').addClass('popap');
    jQuery('body').addClass('popap');
    jQuery('.box-want-morning, .box-want-evening, .block-ideal-means').addClass('popap');
    jQuery(this).parents('.box-want-product-item').find('.box-want-product-item-popap').show();
  });
  jQuery(document).on('click', '.product-popap-close', function() {
    jQuery(this).parents('.box-want-product-item-popap').hide();
    jQuery('.box-want-morning, .box-want-evening, .block-ideal-means').removeClass('popap');
    // jQuery('.tab-content').removeClass('popap');
    jQuery('body').removeClass('popap');
  });
  jQuery(document).on('click', '.btn-norm', function() {
    // jQuery('.skin-type').slideUp('400', function() {});
    jQuery('.want-morning-evening-such').fadeIn('400', function() {});
    jQuery('.want-morning-evening-norm').fadeOut('400', function() {});
  });
  jQuery(document).on('click', '.btn-such', function() {
    // jQuery('.skin-type').slideUp('400', function() {});
    jQuery('.want-morning-evening-norm').fadeIn('400', function() {});
    jQuery('.want-morning-evening-such').fadeOut('400', function() {});
  });
  // Запуск видео
  jQuery(document).on('click', '.player-btn-close', function() {
    player.stopVideo();
    jQuery('.box-video').fadeOut('400', function() {});
  });
  jQuery(document).on('click', '.slider-top-btn-video', function() {
    jQuery('.box-video').fadeIn('400', function() {});
    player.playVideo();
  });
  // Убираем первую подложку
  jQuery('.slider-top-btn-next').click(function(eventObject){
    jQuery(".slider-top").fadeOut('400');
    jQuery(".slider-block2").fadeIn('400');    
    jQuery('.slider-product1').fadeIn('400');
    jQuery('.slider').addClass('slider-active');
    // добавить подсказку в мобилы
    if (jQuery(window).width()<768) {
      jQuery('.slider-hint').fadeIn('400');      
    }
    // убрать подсказку из мобилы
    setTimeout(function() {
      jQuery('.slider-hint').fadeOut('400');
    }, 2000);

  });
  jQuery('.slick-next').click(function(eventObject){
    jQuery('.slider-evening-right.slider-product1').fadeOut('400');
    if (jQuery(this).hasClass('slick-btn')) {
      // до первого нажатия
      jQuery(".slider-block2").fadeOut('400');  
      jQuery('#2').width('5%');
        jQuery(".slick-next").fadeOut();
        jQuery(".Block button").removeClass('slick-btn');
        jQuery('.img-morning').fadeIn();
        jQuery('.slider-morning-right.slider-product2').delay(2000).fadeIn('400');
      jQuery('#1').width('94%');
    }
    else {
      jQuery('.slick-next').fadeOut();
      jQuery('.Block2 > div ').fadeOut('400');
        jQuery('.img-evening').fadeOut();
        setTimeout(function() {
          jQuery('#2').width('5%');
            jQuery('.slick-prev').delay(2000).show();
            jQuery('.img-morning').delay(2000).fadeIn();
            jQuery('.Block1 > div ').delay(2000).fadeIn('400');
          jQuery('#1').width('94%');
        }, 200);
    }
  });
  jQuery('.slick-prev').click(function(eventObject){
    jQuery('.slider-morning-left.slider-product1').fadeOut('400');
    if (jQuery(this).hasClass('slick-btn')) {
      jQuery(".slider-block2").fadeOut('400');  
      jQuery('#2').width('94%');
      jQuery('#1').width('5%');
        jQuery('.slick-prev').delay(2000).fadeOut();
        jQuery('.img-evening').delay(2000).fadeIn();
        jQuery('.slider-evening-right.slider-product2').delay(2000).fadeIn('400');
        jQuery(".Block button").delay(2000).removeClass('slick-btn');
    }
    else {
      console.log('slick-prev');
        jQuery('.slick-prev').fadeOut();
        jQuery('.img-morning').fadeOut();
        jQuery('.Block1 > div ').fadeOut('400');
        setTimeout(function() {
          jQuery('#1').width('5%');
            jQuery('.slick-next').delay(2000).show();
            jQuery('.img-evening').delay(2000).fadeIn();
            jQuery('.Block2 > div ').delay(2000).fadeIn('400');
          jQuery('#2').width('94%');
        }, 200);
    }
  });
  setTimeout(function() {
    jQuery('#bp-carousel-new').slick({
      dots: true, 
      arrows: true, 
      slidesToShow: 3, 
      slidesToScroll: 3,
      infinite: false, 
      responsive:[
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
            settings: "unslick"
        }   
      ]
    });
  }, 2000);
  // var sld = function() {
  //   if ($(window).width() > 767) {
  //   } else {
  //     // jQuery('#bp-carousel-new').destroySlider();
  //   }
  // };
  // sld();
  // jQuery(window).resize(sld);


  jQuery('.ochishchenie-new-product').on('click', function(){
      jQuery('#bp-carousel-new').slick('slickFilter','.new-product-teaser');
  });
  jQuery('.ochishchenie-all-product').on('click', function(){
      jQuery('#bp-carousel-new').slick('slickUnfilter');
  });
  var obj = document.getElementById('sat');
  var width_box_swipe = jQuery('.slider-mobile-swipe').outerWidth();
  var width_box_btn_swipe = jQuery('.btn-swipe').outerWidth();
  var initialPoint;
  var finalPoint;
  /*Ловим касание*/
  obj.addEventListener('touchstart', function(event) {
    event.preventDefault();
    event.stopPropagation();
    initialPoint=event.changedTouches[0];
    if (event.targetTouches.length == 1) {
      var touch=event.targetTouches[0];
      touchOffsetX = touch.pageX - touch.target.offsetLeft;
    }
  }, false);
  /*Передвигаем объект*/
  obj.addEventListener('touchmove', function(event) {
    if (event.targetTouches.length == 1) {
      var touch = event.targetTouches[0];
      if ((touch.pageX-touchOffsetX)>=(-5) && (touch.pageX-touchOffsetX+width_box_btn_swipe)<=jQuery('.slider-mobile-swipe').outerWidth()+5) {
      }
      jQuery('.container-promo').removeClass('slider-swipe-active');
        obj.style.left = touch.pageX-touchOffsetX + 'px';
    }
  }, false);
  /*отпустили объект*/
  obj.addEventListener('touchend', function(event) {
    event.preventDefault();
    event.stopPropagation();
    finalPoint=event.changedTouches[0];
    var xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
    var yAbs = Math.abs(initialPoint.pageY - finalPoint.pageY);
      jQuery('.container-promo').addClass('slider-swipe-active');
      jQuery('.container-promo').addClass('not-slider-swipe');
      jQuery('.block-ideal-means').fadeIn('400');
      if (xAbs > yAbs) {
        if (finalPoint.pageX < initialPoint.pageX) {
          obj.style.left = '0px';
          jQuery('.container-promo').addClass('slider-swipe-morning');
          jQuery('.container-promo').removeClass('slider-swipe-evening');
        }
        else {
          jQuery('.container-promo').removeClass('slider-swipe-morning');
          jQuery('.container-promo').addClass('slider-swipe-evening');
          obj.style.left = jQuery('.slider-mobile-swipe').outerWidth()-width_box_btn_swipe + 'px';
        }
      }
    if (xAbs > 20 || yAbs > 20) {
    }
  }, false);
  function width_windows() {
    jQuery('.Block > img').width(jQuery(window).width());
  }
  width_windows();
  // скрипт выравнивания изображений продукта в фильтре
  // jQuery('.nav-tabs .nav-link').on('click', function(){
  //   if (jQuery(window).width()>767) {
  //     // jQuery('.box-want-product-item a img').width(jQuery('.box-want-product-item a img').width());
  //     var width_windows = jQuery(window).width();
  //     console.log($(this).parents('.want-evening'));
  //     setTimeout(function() {  
  //       $(this).parents('.want-evening').find('.box-want-product-item > a > img').each(function(i,elem) {
  //         console.log(jQuery(this).width()/(15));    
  //         jQuery(this).css('max-widrh', jQuery(this).width());
  //         jQuery(this).width(jQuery(this).width()/(15)+'vw') ;
  //       });
  //     }, 200);
  //   }  
  // });
  
});