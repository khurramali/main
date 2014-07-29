jQuery(document).ready(function() { 
    jQuery('.carousel').carousel({
  		interval: 5000 
	});
    
    var blinkInterval = null;
    var setAnimateTimeout = null;
    
    $('.carousel').on('slid.bs.carousel', function (e) {
    	var active = $(this).find('.item.active');
	    	var delay = 2500;
	    	var t1 = active.find(".text-one");
	    	var t2 = active.find(".text-two");
	    	var t3 = active.find(".text-three");
	    	var img =active.find(".main");
	    	
	    	clearInterval(blinkInterval);
	    	$('.gt-flash').css('visibility', 'hidden');
	    	$("img.main").stop(true, true).css({marginLeft : '0'});
	    	$(".carousel .text-one").stop(true, true).css({left : '-50%'});
	    	$(".carousel .text-two").stop(true, true).css({right : '-50%'});
	    	$(".carousel .text-three").stop(true, true).css({top : '-100%'});
	    
	    if(active.hasClass("animate")){
    		$('.carousel').carousel('pause');
	    	
	    	t1.delay(500).animate({left: '0px'}, 500, function(){
	    		t2.delay(delay).animate({right: '0px'}, 750, function(){
	    			t3.delay(delay).animate({top: '0px'},750, function(){
	
	    			    var elem = $('.gt-flash');
	    			    blinkInterval = setInterval(function() {
	    			        if (elem.css('visibility') == 'hidden') {
	    			            elem.css('visibility', 'visible');
	    			        } else {
	    			            elem.css('visibility', 'hidden');
	    			        }    
	    			    }, 1000);

	    	    		setAnimateTimeout = setTimeout(function(){$('.carousel').carousel('cycle')},2000);
	    			});
	    		})
	    		t1.delay(delay).animate({left: '-50%'},500);
	    		img.delay(delay).animate({marginLeft: '-48%'},750);
	    	});
    	};
    });
        
    jQuery(".carousel-inner a.various").click(function() {
        jQuery.fancybox({
            padding: 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'href'          : this.href.replace(new RegExp("watch.*v=","i"), "v/"),
            'type'          : 'iframe'
        });
        return false;
    });
});