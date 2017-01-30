/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        var players = plyr.setup();
        $('.video__icon').click(function() {
          $(this).hide();
          $('.video__player').show();
          players[0].play();
        })
        $('#highlights').owlCarousel({
          items: 4,
          loop: true,
          margin: 30,
          responsiveClass: true,
          responsive : {
            0 : {
              items : 1,
              dots: false,
            },
            768 : {
              dots : 4,
            }
          },
          nav: true,
          navText: [
            "<img src='/wp-content/themes/swapps/assets/images/back.svg'>",
            "<img src='/wp-content/themes/swapps/assets/images/next.svg'>"
          ],
        });
        $('.owl-carousel').owlCarousel({
          items: 1,
          loop: true,
          margin: 10,
          responsiveClass: true,
          responsive : {
              0 : {
                  dots : false,
              },
              768 : {
                  dots : true,
              }
          },
          nav: true,
          navText: [
            "<img src='/wp-content/themes/swapps/assets/images/back.svg'>",
            "<img src='/wp-content/themes/swapps/assets/images/next.svg'>"
          ],
        });

        $("a.gallery__item").attr('rel', 'gallery').fancybox({
          'transitionIn'  : 'elastic',
          'transitionOut' : 'elastic',
          'speedIn'   : 600, 
          'speedOut'    : 200, 
          'overlayShow' : true,
          'showCloseButton' : true,
          'overlayColor' : '#666',
          'opacity': true

        });
        function autocollapse(){
          var navbar = $('#autocollapse');
          navbar.removeClass('collapsed'); // set standart view
          if(navbar.innerHeight() > 76) // check if we've got 2 lines
            navbar.addClass('collapsed'); // force collapse mode
        }

        $(document).on('ready', autocollapse);
        $(window).on('resize', autocollapse);
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
