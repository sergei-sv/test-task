jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function video_streaming_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function video_streaming_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var video_streaming_Keyboard_loop = function (elem) {
    var video_streaming_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var video_streaming_firstTabbable = video_streaming_tabbable.first();
    var video_streaming_lastTabbable = video_streaming_tabbable.last();
    /*set focus on first input*/
    video_streaming_firstTabbable.focus();

    /*redirect last tab to first input*/
    video_streaming_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            video_streaming_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    video_streaming_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            video_streaming_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        video_streaming_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

jQuery('document').ready(function($){
    $('.main-search span a').click(function(){
        $(".searchform_page").slideDown(500);
        video_streaming_Keyboard_loop($('.searchform_page'));
    });

    $('.close a').click(function(){
        $(".searchform_page").slideUp(500);
    });
}); 

jQuery(document).ready(function() {
    var owl = jQuery('#slider .owl-carousel');
        owl.owlCarousel({
            nav: true,
            autoplay:false,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            loop: true,
            navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
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
});