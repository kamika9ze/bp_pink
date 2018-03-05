
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
      $('.box-video').fadeOut('400', function() {});
    }
  }
  function stopVideo() {
    player.stopVideo();
  }
$(document).ready(function(){
  $(document).on('click', '.btn-norm', function() {
    $('.skin-type').slideUp('400', function() {});
    $('.want-morning-evening-norm').slideDown('400', function() {});
  });
  $(document).on('click', '.btn-such', function() {
    $('.skin-type').slideUp('400', function() {});
    $('.want-morning-evening-such').slideDown('400', function() {});
  });
  // Запуск видео
  $(document).on('click', '.player-btn-close', function() {
    player.stopVideo();
    $('.box-video').fadeOut('400', function() {});
  });
  $(document).on('click', '.slider-top-btn-video', function() {
    $('.box-video').fadeIn('400', function() {});
    player.playVideo();
  });
  // Убираем первую подложку
  $('.slider-top-btn-next').click(function(eventObject){
    $(".slider-top").fadeOut('400');
  });
  $('.slick-next').click(function(eventObject){
    if ($(this).hasClass('slick-btn')) {
      // до первого нажатия
      $('#2').delay(30).animate({
          width: '-=45%'
      }, 2000, function () {
        $(".slick-next").fadeOut();
        $(".Block button").removeClass('slick-btn');
      });
      $('#1').delay(30).animate({
          width: '+=45%'
      }, 2000, function () {
      });
    }
    else {
      $('.slick-next').fadeOut();
      $('#2').delay(30).animate({
          width: '-=90%'
      }, 2000, function () {
        $('.slick-prev').show();
      });
      $('#1').delay(30).animate({
          width: '+=90%'
      }, 2000, function () {
      });
    }
  });
  $('.slick-prev').click(function(eventObject){
    if ($(this).hasClass('slick-btn')) {
      $('#1').delay(30).animate({
          width: '-=45%'
      }, 2000, function () {
        $('.slick-prev').fadeOut();
        $(".Block button").removeClass('slick-btn');
      });
      $('#2').delay(30).animate({
          width: '+=45%'
      }, 2000, function () {
      });
    }
    else {
      $('.slick-prev').fadeOut();
      $('#1').delay(30).animate({
          width: '-=90%'
      }, 2000, function () {
        $('.slick-next').show();
      });
      $('#2').delay(30).animate({
          width: '+=90%'
      }, 2000, function () {
      });
    }
  });
});