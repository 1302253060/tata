/*-----------------------------------------------------------------------------------
/*
/* Main JS
/*
-----------------------------------------------------------------------------------*/  

(function($) {
	
$(document).ready(function(){
    $("#timer").load("./time.php");
});

	/*---------------------------------------------------- */
  	/* Preloader
   ------------------------------------------------------ */ 
  	$(window).load(function() {

   	// will first fade out the loading animation 
    	$("#status").fadeOut("slow"); 

    	// will fade out the whole DIV that covers the website. 
    	$("#preloader").delay(500).fadeOut("slow").remove();     
      
    	// $('.js #hero .hero-image img').addClass("animated fadeInUpBig"); 
        // $('.js #hero .buttons a.trial').addClass("animated shake");    

  	}) 
	
	
	// close the toggle menu if user clicks outside of the menu

		$(document).click(function(event) {
		  if(
			$('.toggle > input').is(':checked') &&
			!$(event.target).parents('.toggle').is('.toggle')
		  ) {
			$('.toggle > input').prop('checked', false);
		  }
		})


	
	
$(document).ready(function(){
	$('.acc_container').hide();
	$('.acc_trigger').click(function(){
		if( $(this).next().is(':hidden') ) { 
			$('.acc_trigger').removeClass('active').next().slideUp(); 
			$(this).toggleClass('active').next().slideDown(); 
		}
		return false; 
	});
});




	/*----------------------------------------------------*/
   	/* piechart
   	/*----------------------------------------------------*/
	
	$(function() {
		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			barColor:	'#4671BF',
			trackColor:	'rgba(0,0,0,0.2)',
			scaleColor:	'rgba(0,0,0,0.2)',
			lineWidth:	'20',
			size:	'160',
			lineCap:	'butt'
		});
	
	});
	/*---------------------------------------------------- */
  	/* Calculator
   ------------------------------------------------------ */ 
   
	
	jQuery(document).ready(function($){
		//open popup
		$('.cd-popup-trigger').on('click', function(event){
			event.preventDefault();
			$('.cd-popup').addClass('is-visible');
		});
		
		//close popup
		$('.cd-popup').on('click', function(event){
			if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
				event.preventDefault();
				$(this).removeClass('is-visible');
			}
		});
		//close popup when clicking the esc keyboard button
		$(document).keyup(function(event){
			if(event.which=='27'){
				$('.cd-popup').removeClass('is-visible');
			}
		});
	});
	
	
  	/*---------------------------------------------------- */
  	/* Mobile Menu
   ------------------------------------------------------ */  
  	var toggle_button = $("<a>", {                         
                        id: "toggle-btn", 
                        html : "Menu",
                        title: "Menu",
                        href : "#" } 
                        );
  	var nav_wrap = $('nav#nav-wrap')
  	var nav = $("ul#nav");  

  	/* id JS is enabled, remove the two a.mobile-btns 
  	and dynamically prepend a.toggle-btn to #nav-wrap */
  	nav_wrap.find('a.mobile-btn').remove(); 
  	nav_wrap.prepend(toggle_button); 

  	toggle_button.on("click", function(e) {
   	e.preventDefault();
    	nav.slideToggle("fast");     
  	});

  	if (toggle_button.is(':visible')) nav.addClass('mobile');
  	$(window).resize(function(){
   	if (toggle_button.is(':visible')) nav.addClass('mobile');
    	else nav.removeClass('mobile');
  	});

  	$('ul#nav li a').on("click", function(){      
   	if (nav.hasClass('mobile')) nav.fadeOut('fast');      
  	});


  	/*----------------------------------------------------*/
  	/* FitText Settings
  	------------------------------------------------------ */
  	setTimeout(function() {

   	$('h1.responsive-headline').fitText(1.2, { minFontSize: '34px', maxFontSize: '34px' });

  	}, 100);

		
		
	
  	/*----------------------------------------------------*/
  	/* Smooth Scrolling
  	------------------------------------------------------ */


	
$(function(){
    var shrinkHeader = 1;
    $(window).scroll(function() {
        var scroll = getCurrentScroll();
        if ( scroll >= shrinkHeader ) {
            $('#header-menu').addClass('shinker');
        }
        else {
            $('#header-menu').removeClass('shinker');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});
  	/*----------------------------------------------------*/

	/*----------------------------------------------------*/
  	/* FitVids
  	/*----------------------------------------------------*/
   $(".fluid-video-wrapper").fitVids();


   /*----------------------------------------------------*/
  	/* Waypoints Animations
   ------------------------------------------------------ */
  
	
	$('#headline-p-text').css('opacity', 0);
  	$('#headline-p-text').waypoint(function() {
   	$('#headline-p-text').addClass( 'animated bounceInUp delay-05s show' );    
  	}, { offset: '100%' });
	
	$('#headline-p-text').css('opacity', 0);
  	$('#headline-p-text').waypoint(function() {
   	$('#headline-p-text').addClass( 'animated bounceInUp delay-05s show' );    
  	}, { offset: '100%' });
   
	$('#headline-h1-text').css('opacity', 0);
  	$('#headline-h1-text').waypoint(function() {
   	$('#headline-h1-text').addClass( 'animated bounceInDown show' );    
  	}, { offset: '100%' });
	
	$('#headline-p-text').css('opacity', 0);
  	$('#headline-p-text').waypoint(function() {
   	$('#headline-p-text').addClass( 'animated bounceInUp delay-05s show' );    
  	}, { offset: '100%' });
	
	

  	
  	/*----------------------------------------------------*/
  	/* Flexslider
  	/*----------------------------------------------------*/
  	$('.flexslider').flexslider({
   	namespace: "flex-",
      controlsContainer: ".flex-container",
      animation: 'slide',
      controlNav: false,
      directionNav: false,
      smoothHeight: true,
      slideshowSpeed: 7000,
      animationSpeed: 600,
      randomize: false,
   });
	

$('.banner').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 3000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: false              //  Support responsive design. May break non-responsive designs
});

   

   /*----------------------------------------------------*/
   /* ImageLightbox
   /*----------------------------------------------------*/

   if($("html").hasClass('cssanimations')) {

      var activityIndicatorOn = function()
      {
       	$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
      },
      activityIndicatorOff = function()
      {
       	$( '#imagelightbox-loading' ).remove();
      },

      overlayOn = function()
      {
       	$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
      },
      overlayOff = function()
      {
       	$( '#imagelightbox-overlay' ).remove();
      },

      closeButtonOn = function( instance )
      {
       	$( '<a href="#" id="imagelightbox-close" title="close"><i class="fa fa fa-times"></i></a>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });
      },
      closeButtonOff = function()
      {
       	$( '#imagelightbox-close' ).remove();
      },

      captionOn = function()
      {
      	var description = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'alt' );
        	if( description.length > 0 )
         	$( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );        
      },
      captionOff = function()
      {
       	$( '#imagelightbox-caption' ).remove();
      };     

      var instanceA = $( 'a[data-imagelightbox="a"]' ).imageLightbox(
      {
         onStart:   function() { overlayOn(); closeButtonOn( instanceA ); },
         onEnd:     function() { overlayOff(); captionOff(); closeButtonOff(); activityIndicatorOff(); },
         onLoadStart: function() { captionOff(); activityIndicatorOn(); },
         onLoadEnd:   function() { captionOn(); activityIndicatorOff(); }

      });
        
    }      
    else {
         
      /*----------------------------------------------------*/
   	/* prettyPhoto for old IE
   	/*----------------------------------------------------*/
      $("#screenshots").find(".item-wrap a").attr("rel","prettyPhoto[pp_gal]");

      $("a[rel^='prettyPhoto']").prettyPhoto( {

      	animation_speed: 'fast', /* fast/slow/normal */
      	slideshow: false, /* false OR interval time in ms */
      	autoplay_slideshow: false, /* true/false */
      	opacity: 0.80, /* Value between 0 and 1 */
      	show_title: true, /* true/false */
      	allow_resize: true, /* Resize the photos bigger than viewport. true/false */
      	default_width: 500,
      	default_height: 344,
      	counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
      	theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
      	hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
      	wmode: 'opaque', /* Set the flash wmode attribute */
      	autoplay: true, /* Automatically start videos: True/False */
      	modal: false, /* If set to true, only the close button will close the window */
      	overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
      	keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
      	deeplinking: false,
      	social_tools: false

      }); 

    }

	

})(jQuery);