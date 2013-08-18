// Youtube and Vimeo Flexslider Control
// Partly from Duppi on GitHub, partly from digging into the YouTube API
// Need to set this up to use classes instead of IDs

var tag = document.createElement('script');
tag.src = "http://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

jQuery(window).load(function($) {

  var $ = jQuery.noConflict();
 
    $("#main-gallery")
    .fitVids()
    .flexslider({
        useCSS: true,
        animation: "fade",
        directionNav: true,
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        pauseOnAction: true,
        pauseOnHover: false,
        video: true,
    });

    $("#press-gallery")
    .flexslider({
        animation: "slide",
        directionNav: true,
        controlNav: false,
        animationLoop: true,
        slideshow: true,
        pauseOnAction: true,
        pauseOnHover: false
    });

var vimeoPlayers = $('#main-gallery').find('iframe'), player;

for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
        player = vimeoPlayers[i];
        $f(player).addEvent('ready', ready);
}

function addEvent(element, eventName, callback) {
    if (element.addEventListener) {
        element.addEventListener(eventName, callback, false)
    } else {
        element.attachEvent(eventName, callback, false);
    }
}

function ready(player_id) {
    var froogaloop = $f(player_id);
    froogaloop.addEvent('play', function(data) {
     $('#main-gallery').flexslider("pause");
    });

    froogaloop.addEvent('pause', function(data) {
        $('#main-gallery').flexslider("play");
    });
}

$("#main-gallery")

.flexslider({
    before: function(slider){
        if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
           $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
           /* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
           playVideoAndPauseOthers($('.play3 iframe')[0]);
    }


});

function playVideoAndPauseOthers(frame) {
$('iframe').each(function(i) {
var func = this === frame ? 'playVideo' : 'stopVideo';
this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
});
}

/* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
/*
$('.flex-next, .flex-prev').click(function() {
playVideoAndPauseOthers($('.play3 iframe')[0]);
});

*/

//YOUTUBE STUFF

function controlSlider(event) {
    console.log(event);
    var playerstate=event.data;
    console.log(playerstate);
    if(playerstate==1 || playerstate==3){
        $('#main-gallery').flexslider("pause");
    };
    if(playerstate==0 || playerstate==2){
        $('#main-gallery').flexslider("play");
    };
};

var player = new YT.Player('youtubevideo', {
    events: {
      'onReady': onPlayerReady
    }
  }); 

  function onPlayerReady(event){
    $(".button-video").on('click', function(e) {
        e.preventDefault();
        $(".flex-active-slide img").fadeOut('slow', function(){
            $(".flex-active-slide .fluid-width-video-wrapper").fadeIn('slow');
            $(".flex-active-slide iframe").fadeIn('slow');
        });
        $(".flex-active-slide .flex-caption").fadeOut('slow');
        player.playVideo();
    });
  }


});
