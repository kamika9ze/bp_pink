
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
      videoId: 'M1OCdbC7nJ4',
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
  jQuery(document).on('click', '.box-want-product-item a', function() {
      jQuery('.tab-content').addClass('popap');
      jQuery('.box-want-morning, .box-want-evening').addClass('popap');
      jQuery(this).parents('.box-want-product-item').find('.box-want-product-item-popap').show();
    });
  jQuery(document).on('click', '.product-popap-close', function() {
    jQuery(this).parents('.box-want-product-item-popap').hide();
    jQuery('.box-want-morning, .box-want-evening').removeClass('popap');
    jQuery('.tab-content').removeClass('popap');
  });
  jQuery(document).on('click', '.btn-norm', function() {
    jQuery('.skin-type').slideUp('400', function() {});
    jQuery('.want-morning-evening-norm').slideDown('400', function() {});
  });
  jQuery(document).on('click', '.btn-such', function() {
    jQuery('.skin-type').slideUp('400', function() {});
    jQuery('.want-morning-evening-such').slideDown('400', function() {});
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
      jQuery('#1').width('95%');
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
          jQuery('#1').width('95%');
        }, 200);
    }
  });
  jQuery('.slick-prev').click(function(eventObject){
    jQuery('.slider-morning-left.slider-product1').fadeOut('400');
    if (jQuery(this).hasClass('slick-btn')) {
      jQuery(".slider-block2").fadeOut('400');  
      jQuery('#2').width('95%');
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
          jQuery('#2').width('95%');
        }, 200);
    }
  });
  jQuery('#bp-carousel-new').slick({
        dots: true, 
        arrows: true, 
        slidesToShow: 3, 
        slidesToScroll: 1, 
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

  jQuery('.ochishchenie-new-product').on('click', function(){
      jQuery('#bp-carousel-new').slick('slickFilter','.product-carousel-new');
  });
  jQuery('.ochishchenie-all-product').on('click', function(){
      jQuery('#bp-carousel-new').slick('slickUnfilter');
  });
});