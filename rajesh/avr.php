<? include 'includes/header.php'; 
$one=15;
$two=5;
$three=10;
$four=30;
$five=30;
$total_vote=($one+$two+$three+$four+$five);
$one1=(1*$one);
$two1=(2*$two);
$three1=(3*$three);
$four1=(4*$four);
$five1=(5*$five);
$ave=($one1+$two1+$three1+$four1+$five1)/$total_vote;
echo round($ave,2).'<i class="fa fa-star-half"></i>';

$rating_percent=(round($ave,2)/5 * 100);
?>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?=$rating_percent; ?>%" aria-valuenow="<?=$rating_percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: <?=$rating_percent; ?>%" aria-valuenow="<?=$rating_percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<style>
.rating_books {
    font-size: 1.2em;
    color: white;
    padding-top: 5px;
    vertical-align: middle;
    text-align: center;
    font-family: Verdana;
}.wrapper_books {
    width: 100px;
    border: 2px white solid;
    overflow: hidden;
    background: #ccc;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ccc', endColorstr='#eee');
    background: -webkit-gradient(linear, left top, left bottom, from(#ccc), to(#eee));
    background: -moz-linear-gradient(top, #ccc, #eee);
    -moz-border-radius: 9px;
    -webkit-border-radius: 9px;
    border-radius: 9px;
}
.inner_books {
    width: 0px;
    height: 30px;
    border: 5px white;
    background-color: #e600e2;
    -moz-border-radius: 9px;
    -webkit-border-radius: 9px;
    border-radius: 9px;
}</style>


<div class="book_rating"><?=round($ave,1);?></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
var ratingconfig = {
animate:true,
duration:1000,
ease:"easeOutBounce",
maxRating: 5,
wrapperWidth:1000,
showText: false,
wrapperClass:"wrapper_books",
innerClass:"inner_books",
textClass: "rating_books"
}
//$('.book_rating').ratingbar(ratingconfig);
});
</script>
<script>
/**
 * jQuery ratingbar
 * --------------------------------------------------------------------------
 *
 * jQuery ratingbar creates a customizable bar rating automatically.
 *
 * Dual licensed under the MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 *
 * @version     0.3
 * @since       09.09.2010
 * @author      Matthias Endler
 * @link        http://matthias-endler.de
 * @twitter     http://twitter.com/matthiasendler
 * @license     http://www.opensource.org/licenses/mit-license.php MIT 
 * @license     http://www.gnu.org/licenses/gpl.html GPL
 * @package     jQuery Plugins
 *
 */

(function($) {

  // Ratingbar methods
  var methods = {
    init : function( options ) {
      // Define rating object with some default config settings
      var config = $.extend({
        animate: false, // Bar gets expanded on page load
        duration: 1000, // Animation time
        ease: "linear", // Animation easing effect
        maxRating: 100, // Highest rating that can be achieved
        wrapperWidth: 100,// Width of container for rating
        showText: true, // Show original rating text
        ratingClass: "", // CSS class that contains the rating
        wrapperClass: "ratingbar_wrapper", // Custom class for rating container
        innerClass: "ratingbar_inner", // Custom class for actual rating
        textClass: "ratingbar_text", // Custom class for rating text
        wrapperMarkup: '', // Custom markup for bar
        innerMarkup: '',
        textMarkup: ''
      }, options);

      // Use defaults or properties supplied by user
      config.ratingClass = this;
      // Check for custom markup or create own
      if (!config.wrapperMarkup) {
         config.wrapperMarkup = "<div class='" + config.wrapperClass + "' />";
      }
      if (!config.innerMarkup) {
         config.innerMarkup   = "<div class='" + config.innerClass   + "' />";
      }
      if (!config.textMarkup) {
         config.textMarkup    = "<div class='" + config.textClass    + "' />";
      }

      // Create rating bar
      $(config.ratingClass)
        .wrapInner(config.textMarkup)
        .wrapInner(config.innerMarkup)
        .wrapInner(config.wrapperMarkup);

      // Set width of wrapper bar
      $("." + config.wrapperClass).width(config.wrapperWidth);

      // Show rating
      methods.update(config);

      // Check if rating text should be displayed
      if (!config.showText) {
        // Remove original rating text
        $('.' + config.textClass).css("display", "none");
      }
      // Return the jquery object for chaining
      return this;
    },
    update : function( config ) {
      // Set the proper rating for each bar
      $("." + config.innerClass).each(
        function() {
          // Get rating (and possibly rating scale)
          var ratingValues = $('.' + config.textClass, this).text().match(/[0-9.]+/g);

          // Do we have a valid rating?
          if($.isArray(ratingValues)) {
            var rating = parseFloat(ratingValues.shift());

            // Always take second value as rating scale (ratings like 3 out of 5).
            var scale = parseFloat(ratingValues.shift());

            // Check if valid scale
            if (isNaN(scale)) {
              scale = config.maxRating;
            }

            // Set rating bar width
            var innerWidth = rating/scale * config.wrapperWidth;

            if(config.animate) {
              $(this).animate({ 
                width: innerWidth
              }, config.duration, config.ease );
            } else {
              $(this).width(innerWidth);
            }
          }
        }
      );
      return this;
    }
  };

  $.fn.ratingbar = function( method ) {
    // Method calling logic
    if ( methods[method] ) {
      // Call internal methods
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      // Call default init method
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.ratingbar' );
    }
  };
})(jQuery);
</script>
<script>
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
 </script>
 