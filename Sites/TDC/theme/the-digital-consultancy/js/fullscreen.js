/**
* Fullscreenr - lightweight full screen background jquery plugin
* By Jan Schneiders
* Version 1.0
* www.nanotux.com
// You need to specify the size of your background image here (could be done automatically by some PHP code)
var FullscreenrOptions = {  width: 1024, height: 683, bgID: '#bgimg' };
// This will activate the full screen background!
jQuery.fn.fullscreenr(FullscreenrOptions);
**/
(function($){	
	$.fn.fullscreenr = function(options) {

		var defaults = { width: 1280,  height: 1024, bgID: 'bgimg' };
		var options = $.extend({}, defaults, options); 
		$(document).ready(function() { $(options.bgID).fullscreenrResizer(options);	});
		$(window).bind("resize", function() { $(options.bgID).fullscreenrResizer(options); });		
		return this; 		
	};	
	$.fn.fullscreenrResizer = function(options) {
		// Set bg size
		var ratio = options.height / options.width;	
		// Get browser window size
		var browserwidth = $(window).width();
		var areaHeight = $(window).height();
		// Scale the image
		if ((areaHeight/browserwidth) > ratio){
		    $(this).height(areaHeight);
		    $(this).width(areaHeight / ratio);
		} else {
		    $(this).width(browserwidth);
		    $(this).height(browserwidth * ratio);
		}
		// Center the image
		$(this).css('left', (browserwidth - $(this).width())/2);
		$(this).css('top', (areaHeight - $(this).height())/2);
		return this; 		
	};
})(jQuery);