// Smooth scroll blocking
document.addEventListener( 'DOMContentLoaded', function() {
	if ( 'onwheel' in document ) {
		window.onwheel = function( event ) {
			if( typeof( this.RDSmoothScroll ) !== undefined ) {
				try { window.removeEventListener( 'DOMMouseScroll', this.RDSmoothScroll.prototype.onWheel ); } catch( error ) {}
				event.stopPropagation();
			}
		};
	} else if ( 'onmousewheel' in document ) {
		window.onmousewheel= function( event ) {
			if( typeof( this.RDSmoothScroll ) !== undefined ) {
				try { window.removeEventListener( 'onmousewheel', this.RDSmoothScroll.prototype.onWheel ); } catch( error ) {}
				event.stopPropagation();
			}
		};
	}

	try { $('body').unmousewheel(); } catch( error ) {}
});
//----Include-Function----
function include(urllink){ 
  document.write('<script src="js/'+ urllink + '"></script>'); 
  return false ;
}

/* panel */
include('jquery.cookie.js');
//alert($(window).width());
/* if($(window).width() < 765){ 
$(document).ready(function(){
 $('head').append('<link rel="stylesheet" href="css/tm_docs.css" type="text/css" media="screen">');
 $('body').prepend('<div id="panel"><div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" id="advanced"><span class="trigger"><strong></strong><em></em></span><div class="container"><div class="navbar-header"><button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div><nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation"><ul class="nav navbar-nav"><li class="home"><a href="index" class="fa fa-home"></a></li><li class="divider-vertical"></li><li><a href="about">About Us</a></li><li><a href="review">Reviews</a></li><li><a href="gallery">Gallery</a></li><li><a href="contact">Contact</a></li></ul></nav></div></div></div>'); 
});
}  */
$(window).scroll(
    function(){
        if (
            $(this).scrollTop() > 0) {
                $("#advanced").css({position:'fixed'});
            }else{
                $("#advanced").css({position:'relative'});
            }
        }
);  
$(function(){
    var
        strCookies1 = $.cookie('panel1')
    ,   isAnimate = false
    ,   isOpen = false
    ;
    if(strCookies1==null){
        $.cookie('panel1', 'closed');
        strCookies1 = $.cookie('panel1');
        isOpen = false;
    }

    if(strCookies1=='opened'){
        $("#advanced").css({marginTop:'0px'}).removeClass('closed');
        isOpen = true;
        $('#stuck_container').trigger('rePosition', 50); //for sticky menu
    }else{
        $("#advanced").css({marginTop:'-50px'}).addClass('closed');
        isOpen = false;
        $('#stuck_container').trigger('rePosition', 0); //for sticky menu
    }

    $("#advanced .trigger").click(
        function(){
            if(!isOpen){
                $(this).find('strong').animate({opacity:0}).parent().parent('#advanced').removeClass('closed').animate({marginTop:'0px'}, 300);
                $.cookie('panel1','opened');
                strCookies1=$.cookie('panel1');

                isOpen = true;
                $('#stuck_container').trigger('rePosition', 50);
            }else{
                $(this).find('strong').animate({opacity:1}).parent().parent('#advanced').addClass('closed').animate({marginTop:'-50px'}, 300)
                $.cookie('panel1','closed');
                strCookies1=$.cookie('panel1');
                
                isOpen = false;
                $('#stuck_container').trigger('rePosition', 0); //for sticky menu
            }
        }
    )
});
/*--------- end panel *------------*/

//year sccript

var currentYear = (new Date).getFullYear();
$(document).ready(function() {
$("#copyright-year").text( (new Date).getFullYear() );
});


/* DEVICE.JS
========================================================*/
include('device.min.js');

/* Stick up menu
========================================================*/
include('tmstickup.js');
$(window).load(function() { 
  if ($('html').hasClass('desktop')) {
      $('#stuck_container').TMStickUp({
      })
  }  
});
include('superfish.js');
/* DEVICE.JS AND SMOOTH SCROLLIG
========================================================*/
include('jquery.mousewheel.min.js');
include('jquery.simplr.smoothscroll.min.js');
$(function () { 
  if ($('html').hasClass('desktop')) {
      $.srSmoothscroll({
        step:150,
        speed:800
      });
  }   
});
/* Stellar.js
========================================================*/
include('stellar/jquery.stellar.js');
$(document).ready(function() { 
  if ($('html').hasClass('desktop')) {
      $.stellar({
        horizontalScrolling: false,
        verticalOffset:0
      });
      

  }  
});
/*-----*/
include('jquery.ui.totop.js');
$(function () {   
  $().UItoTop({ easingType: 'easeOutQuart' });
});

jQuery(function(){
      jQuery('.sf-menu').mobileMenu();
    })
$(function(){
// IPad/IPhone
  var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
    ua = navigator.userAgent,
 
    gestureStart = function () {
        viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
    },
 
    scaleFix = function () {
      if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
        document.addEventListener("gesturestart", gestureStart, false);
      }
    };
scaleFix();

// Menu Android
if(window.orientation!=undefined){
 var regM = /ipod|ipad|iphone/gi,
  result = ua.match(regM)
 if(!result) {
  $('.sf-menu li').each(function(){

   if($(">ul", this)[0]){
    $(">a", this).toggle(
     function(){
      return false;
     },
     function(){
      window.location.href = $(this).attr("href");
     }
    );
   } 
  })
 }
}
});
/* ------ fi fixed position on Android -----*/
var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')
/*--------------*/