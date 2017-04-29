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
        function stickyFooter() {
          var footer_height = document.querySelector('.footer').offsetHeight;
          document.querySelector('.wrap').style.paddingBottom = footer_height + "px";
          document.querySelector('#footer').style.marginTop = "-" + footer_height + "px";
        }
        // Fix for KocoJeans
        function fillRemainingSpace(){
          var footerHeight = document.querySelector('.footer').offsetHeight;
          var contentHeight = document.querySelector('.content').offsetHeight;
          var totalHeight = footerHeight + contentHeight;
          if(totalHeight < window.innerHeight){
            var fill = window.innerHeight - totalHeight;
            document.querySelector('.document section:not(.breadcrumb)').style.paddingBottom = fill + "px";
          }
        }
        $(window).on('load resize', function () {
          stickyFooter();
          fillRemainingSpace();
        });
        // Hide navbar collapse button if there are no items in menu
        if(document.querySelectorAll('.menu-item').length == 0){
          document.querySelector('.navbar-toggle').style.display = 'none';
        }
        // Initialize videos and save the instances in a variable
        players = plyr.setup();
        players.forEach(function (player) {
          // Check if video is into a slider
          var plyrNode = player.getContainer();
          var container = plyrNode.parentNode.parentNode;
          if(!container.classList.contains('item-full_responsive')){
            player.on('ready', function(event) {
              if (plyrNode.classList.contains('plyr--youtube') || 
                  plyrNode.classList.contains('plyr--vimeo')) {
                plyrNode.querySelector('iframe').style.maxHeight = container.offsetHeight + 'px';
              }
              else{
                plyrNode.querySelector('.plyr__video-wrapper').style.height = '100%'; 
                plyrNode.querySelector('video').classList.toggle('vertical-center');
                plyrNode.querySelector('video').style.maxHeight = '100%';
              }
            });
          }
        });
        $( ".video__icon" ).on( "click", function() {
          $(this.dataset.target).modal();
        });
        // Play video on modal open
        $('.video__modal').on('shown.bs.modal', function (e){
          plyr.get('#' + this.id)[0].play();
        });
        // Pause video on modal close
        $('.video__modal').on('hide.bs.modal', function (e) {
          plyr.get('#' + this.id)[0].pause();
        });
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
            "<i class='fa fa-angle-left fa-lg' aria-hidden='true'></i>",
            "<i class='fa fa-angle-right fa-lg' aria-hidden='true'></i>"
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
            "<i class='fa fa-angle-left fa-lg' aria-hidden='true'></i>",
            "<i class='fa fa-angle-right fa-lg' aria-hidden='true'></i>"
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
          if(navbar.innerHeight() > 76){ // check if we've got 2 lines
            navbar.addClass('collapsed');// force collapse mode
          }
        }

        $(document).on('ready', autocollapse);
        $(window).on('resize', autocollapse);

      $(function() {
        $('.navbar a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            if ($('#nav-sec').hasClass('fx')) {
              $('html, body').animate({
              scrollTop: target.offset().top - 130
              }, 1000);
            }else{
              $('html, body').animate({
              scrollTop: target.offset().top - 50
              }, 1000);
            }
            return false;
          }
          }
        });
        });
        (function($){
          $(document).ready(function(){
            $('a.dropdown-toggle[data-toggle=dropdown]').on('click', function(event) {
              event.preventDefault();
              event.stopPropagation();
              $(this).parent().siblings().removeClass('open');
              $(this).parent().toggleClass('open');
            });
          });
        })(jQuery);
        $(document).ready(function(){
        $(window).scroll(function() {
          if ($(document).scrollTop() > 350) {
          $("#nav-sec").addClass('vivible');
          $("#nav-sec").removeClass('not-vivible');
          } else {
          $("#nav-sec").removeClass('vivible');
          $("#nav-sec").addClass('not-vivible');
          }
        });
        });
        $(window).click(function() {
          $('#myNavbar.collapse.in').removeClass('in');
        });
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
