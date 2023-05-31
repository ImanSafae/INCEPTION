jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

jQuery(function($){
  "use strict";
  jQuery('.main-menu > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast'
  });
});

// sticky header
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('.is-sticky-on').addClass('sticky-head');
  }
  else {
    jQuery('.is-sticky-on').removeClass('sticky-head');
  }
});

jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    kindergarten_school_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function kindergarten_school_trapFocus( element, namespace ) {
  var kindergarten_school_focusableEls = element.find( 'a, button' );
  var kindergarten_school_firstFocusableEl = kindergarten_school_focusableEls[0];
  var kindergarten_school_lastFocusableEl = kindergarten_school_focusableEls[kindergarten_school_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  kindergarten_school_firstFocusableEl.focus();

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) { 
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === kindergarten_school_firstFocusableEl ) {
        kindergarten_school_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === kindergarten_school_lastFocusableEl ) {
        kindergarten_school_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

(function( $ ) {
  jQuery(document).ready(function() {
    var owl = jQuery('#slider-cat .owl-carousel');
      owl.owlCarousel({
        nav: true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        loop: true,
        navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
        }
      }
    })
  })
})( jQuery );

jQuery(document).ready(function() {
	jQuery('.srchicon').click(function() {
		jQuery('.searchtop').toggle();
		jQuery('.topsocial').toggle();
	});	
});

jQuery(document).ready(function() {
  jQuery('.ftr-4-box h5').each(function(index, element) {
    var heading = jQuery(element);
    var word_array, last_word, first_part;

    word_array = heading.html().split(/\s+/); // split on spaces
    last_word = word_array.pop();             // pop the last word
    first_part = word_array.join(' ');        // rejoin the first words together

    heading.html([first_part, ' <span>', last_word, '</span>'].join(''));
  });
});

/* ===============================================
  SCROLL TOP
============================================= */

jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery(window).on("scroll", function () {
    document.getElementById("button").style.display = "block";
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
  });
