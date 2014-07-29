/*jQuery(document).ready(function() { 
	var header = $(".container-fixed").first();
	var headerHeight = header.height();
	var offset = headerHeight + 40;
	var sticking = false;
	var clearingSticky = false;
	jQuery(document).bind('ready scroll',function() {
		var docScroll = jQuery(document).scrollTop();
		if(docScroll >= offset) {
			if(!sticking){
				header.hide();
			}
			header.addClass('sticky');
			$('body').css('padding-top',headerHeight + "px");
			header.slideDown(250);
			sticking = true;
		} else {
			if(sticking && !clearingSticky){
				clearingSticky=true;
				header.stop().slideUp(100, function(){
					header.removeClass('sticky');
					sticking = false;
					header.fadeIn(150);
					$('body').css('padding-top','0');
					clearingSticky=false;
				});
			};
		}
	});
});*/

jQuery(document).ready(function() { 
	var header = $(".container-fixed").first();
	var logo = header.find("div.logo");
	var h2 = header.find("h2");
	var navbar = header.find(".navbar-collapse");
	var pageWidth = $(window).width();
	var navHeight = $(".navbar-header").height();
	$( window ).resize(function() {
		pageWidth = $( window ).width();
		$(document).trigger("scroll");
		navHeight = $(".navbar-header").height();
	});

	
	var headerHeight = header.height();
	var offset = $("nav").first().offset().top;
	var sticking = false;
	var clearingSticky = false;

	if(pageWidth < 768){
		$('body').css('padding-top',navHeight + "px");
	}
	jQuery(document).bind('ready scroll',function() {
		if(pageWidth > 767){
			var docScroll = jQuery(document).scrollTop();
			if(docScroll >= offset) {
				stickyRun();
			} else {
				stickyClear(true);
			}
		} else {
			$('body').css('padding-top',navHeight + "px");
			stickyClear(false);
		}
	});
	
	function stickyRun(){
		header.addClass('sticky');
		$('body').css('padding-top',headerHeight + "px");
		navbar.stop().animate({
			paddingLeft: "75px",
			paddingTop: "5px"
		},150, 'linear', function(){
		});
		$("span.logo-icon").stop().show().animate({
			left: "0px",
			opacity: '1'
		},150, 'linear');
		sticking = true;
	}
	
	function stickyClear(clearPadding){
		header.removeClass('sticky');
		sticking = false;
		if(clearPadding){
			$('body').css('padding-top','0');
		}
		clearingSticky=false;
		navbar.stop().animate({
			paddingLeft: "0",
			paddingTop: "0"
		}, 150, 'linear', function(){
		});
		$("span.logo-icon").stop().animate({
			left: "-75px",
			opacity: '0'
		},150, 'linear', function(){
			$(this).hide();
		});
		
	}
});