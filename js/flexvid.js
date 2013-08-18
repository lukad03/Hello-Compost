jQuery(document).ready(function($) {

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
        $('.flexslider').flexslider("pause");
      });
      froogaloop.addEvent('pause', function(data) {
        $('.flexslider').flexslider("play");
      });
      }

      $('.flexslider').flexslider({
      animation: "slide",
      useCSS: false,
      animationLoop: true,
      smoothHeight: true,
      before: function(slider){
      	$f(player).api('pause');
      });

});