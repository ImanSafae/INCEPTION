(function($) {
    "use strict";
    // sticky menu
    var header = $('.menu-sticky');
    var win = $(window);

    win.on('scroll', function() {
       var scroll = win.scrollTop();
       if (scroll < 150) {
           header.removeClass("sticky");
       } else {
           header.addClass("sticky");
       }
    });    

    // Floating Contact Show/Hide
    if ($('.floating-icons').length){
         $(".floating-icons").on(' click ', function() {
            $(".floating-bar").slideToggle( "fast" );
            $(".floating-bar").toggleClass( "show" );
            $(this).toggleClass("float-close");
         });
    }
    //Popups
    $("button.search").on( 'click', function() {
      $(".search-popup").addClass("visible");
    });

    $(".search-popup .btn-close").on( 'click', function() {
      $(".search-popup").removeClass("visible");
    });

    $(document).keyup(function(e) {
          if (e.key === "Escape") { // escape key maps to keycode `27`
            $(".search-popup").removeClass("visible");
        }
    });

    // Slider init
    if ($('.ts-slider-carousel').length) {
        $('.ts-slider-carousel').slick({
            centerPadding: '0px',
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
        });
    }


    
    // scrollTop init
    var win=$(window);
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    }); 


    var toggle = document.getElementById("theme-toggle");
    if (toggle){

    var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
    if (storedTheme)
        document.documentElement.setAttribute('data-theme', storedTheme)


    toggle.onclick = function() {
        var currentTheme = document.documentElement.getAttribute("data-theme");
        var targetTheme = "light";

        if (currentTheme === "light") {
            targetTheme = "dark";
        }

        document.documentElement.setAttribute('data-theme', targetTheme)
        localStorage.setItem('theme', targetTheme);
    };
}

    $( '#ts-header .mobile-menu-link a' ).click(function(){
        $('#ts-header .navbar-menu').toggleClass('menu-active'); 
        var element = document.querySelector( '.navbar-menu.menu-active' );
        if( element ) {
        $(document).on('keydown', function(e) {
            var focusable = element.querySelectorAll( 'input, a, button' );
            focusable = Array.prototype.slice.call( focusable );
            focusable = focusable.filter( function( focusableelement ) {
                return null !== focusableelement.offsetParent;
            } );
            var firstFocusable = focusable[0];
            var lastFocusable = focusable[focusable.length - 1];
            focus_trap( firstFocusable, lastFocusable, e );
            })
        }
    });
    
    $('.main-menu-close').click(function() {
        $('#ts-header .navbar-menu').removeClass('menu-active');
        var focusElement = $( this ).data( 'focus' );
        $( focusElement ).focus();
    });
    var KEYCODE_TAB = 9;
    function focus_trap( firstFocusable, lastFocusable, e ) {
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === lastFocusable ) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    } 
    /**
     * Primary menu sub-toggle
     */
    $('<a class="sub-toggle" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>').insertAfter('#primary-menu .menu-item-has-children>a, #primary-menu .page_item_has_children>a');

    $('body').on( 'click', '#primary-menu .sub-toggle', function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle();
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle();
        $(this).children('.fa').first().toggleClass('fa-angle-right').toggleClass('fa-angle-down');
    });
})(jQuery);

