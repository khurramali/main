jQuery(function($) {
	var Cache = {
		storage: {},
		write: function (key, value) {
			this.storage[key] = value;
		},
		read: function (key) {
			
			if (!this.has_key(key)) {
				return false;
			}

			return this.storage[key];
		},
		has_key: function(key) {
			return typeof this.storage[key] != "undefined";
		}
	};


	$(document).on('focusin', '.field, textarea', function() {
		if(this.title==this.value) {
			this.value = '';
		}
	}).on('focusout', '.field, textarea', function(){
		if(this.value=='') {
			this.value = this.title;
		}
	});
        
	//vars
	var bg = $('.background');

	//accordion expanding
	$(document).on('click', '.accordion ul li h5', function() {
		var selected = $(this);
		var parentLi = selected.parent('li');
		var otherLi = parentLi.siblings('li');

		otherLi.removeClass('active');
		parentLi.toggleClass('active');

		otherLi.find('.cnt').slideUp();
		selected.next('.cnt').stop(true).slideToggle( function() {
			realHeight(true);
		});

		return false;
	});

	//mobile navigation expanding
	$(document).on('click', '#navigation a.menu-btn', function() {
		$(this).parent().toggleClass('expanded');
		$(this).next('ul').stop(true).slideToggle();

		return false;
	});

	function tgc_initialize_map() {
		if (!document.getElementById('map')) {
			return false;
		}
		var coords = jQuery('#map').data('coords').split(',');
		var fixed_coords = [parseFloat(coords[0]), parseFloat(coords[1])];
		coords = fixed_coords;

		var mapOptions = {
			zoom: 16,
			center: new google.maps.LatLng(coords[0], coords[1]),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		var myLatLng = new google.maps.LatLng(coords[0], coords[1]);
		/*var beachMarker = new google.maps.MarkerWithLabel({
			position: myLatLng,
			map: map
		}); */
                var marker = new MarkerWithLabel({
                    position: myLatLng,
                    map: map,
                    labelContent: "<p style='color: red; font-weight: bold;'>The Digital Consultancy</p>",
                    labelAnchor: new google.maps.Point(-10, 20)
                  });
                google.maps.event.addListener(marker);
	}

	$(document).on('ready reload', function () {
		//init homepage slideshow
		$('.logos-slider').flexslider({
			controlNav: false,
			directionNav: false
		});

		//logo vertical align
		$('.logos a').each(function() {
			var logo = $(this);
			var logoH =  logo.height();
			var logoImg = logo.find('img');
			var logoImgH = logoImg.height();

		//	logoImg.css({'padding-top': (logoH-logoImgH)/2});
		});
                
                $('.member').hide();
                var interval = 1;
		//fade in background image
		bg.animate({'opacity': 1});

		//fullscreen init for background image
		bg.find('img').each(function(){
			$.fn.fullscreenr({
				width:$(this).width(),
				height:$(this).height(),
				bgID: $(this)
			});
		});

		tgc_initialize_map();
                
                var total_count = $('.logos').attr('data-count');
                if($('.logos').width() > 140) {
                    if($('.main > .shell').width() > 939) {
                        height_logos = (Math.ceil(total_count/4)*134) + 18;
                        //$('.logos').height(width_logos);
                        $('.main-holder').css({'height': height_logos+320});
                        $('.main > .shell').css({'height': height_logos+320});
                        $('.content-wrapper').css({'height': height_logos+220});
                    } else {
                        height_logos = (Math.ceil(total_count/4)*134) + 18;
                        //$('.logos').height(width_logos);
                        $('.main-holder').css({'height': height_logos+580});
                        $('.main > .shell').css({'height': height_logos+520});
                        $('.content-wrapper').css({'height': height_logos+150});
                    }
                } else if($('.logos').width() <= 140) {
                    height_logos = total_count*134;
                    //$('.logos').height(height_logos);
                    $('.main-holder').css({'height': height_logos+320});
                    $('.main > .shell').css({'height': height_logos+320});
                    $('.content-wrapper').css({'height': height_logos+220});
                }

	});

	$(document).on('click', '#navigation ul li a, #logo a, #sidebar .widget ul li a', function() {
		var target = $(this).attr('href');

		$.bbq.pushState( target, 2 );

		return false;
	});

	//add class inner-page
	$(document).on('click', '#sidebar .widget ul li a', function() {
		$('body').addClass('inner-page')

		return false;
	});

	//remove class inner-page
	$(document).on('click', '#navigation ul li a, #logo a', function() {
		$('body').removeClass('inner-page')

		return false;
	});

	function realHeight(animate) {
		var animate;
		var content = $('.content');
		var contentH = content.outerHeight();
		var contentWrapper = $('.content-wrapper');
		var shell = $('.main > .shell');
		var shellH = shell.outerHeight();
		var sidebarH = $('#sidebar').outerHeight();

		if (content.length) {
			if ($(window).width() <= 940 ) {
				contentWrapper.css({'height': contentH});
				shell.css({'height': (contentWrapper.outerHeight() + sidebarH)});
			} else {
				contentWrapper.css({'height': contentH});
				shell.css({'height': contentWrapper.outerHeight()});
			};

			var realHeight = shell.outerHeight();
		} else {
			var realHeight = shellH;
		};
		
		if (animate == true) {
			$('.main-holder').animate({'height': realHeight});
		} else {
			$('.main-holder').css({'height': realHeight});
		};
	};

	function slideContent() {
		realHeight();
		
		if ($('body.inner-page').length) {
			$('.content').css({'top': '100%'}).animate({'top': '0%'});
		} else {
			$('.main').css({'left': '100%'}).animate({'left': '0%'});
		};
	};

	function addThis() {
		var script = '//s7.addthis.com/js/250/addthis_widget.js#domready=1';
		if (window.addthis) {
		    window.addthis = null;
		    window._adr = null;
		    window._atc = null;
		    window._atd = null;
		    window._ate = null;
		    window._atr = null;
		    window._atw = null;
		}
		$.getScript(script);	
	};

	$(window).on('hashchange', function () {
		var target = $.param.fragment();

		if ( !Cache.has_key(target) ) {
			
			$.get( target, function(res) {
				Cache.write(target, res);

				function ajaxLoad() {
					$('.ajax').html($(res).find('.ajax-holder'));
					slideContent();

					$(document).trigger("reload");

					addThis();
				};

				if ($('body.inner-page').length) {
					$('.content').animate({'top': '-100%'}, function() {
						ajaxLoad();
					});
				} else {
					$('.main').animate({'left': '-100%'}, function() {
						ajaxLoad();
					});
				};
			});
		} else {
			var cached = Cache.read(target);

			function cacheLoad() {
				$('.ajax').html($('.ajax-holder', cached));
				slideContent();
				
				$(document).trigger("reload");

				addThis();
			}

			if ($('body.inner-page').length) {
				$('.content').animate({'top': '-100%'}, function() {
					cacheLoad();
				});
			} else {
				$('.main').animate({'left': '-100%'}, function() {
					cacheLoad();
				});
			};
		}
	});

	if ($.param.fragment() != '') {
		$(window).trigger( 'hashchange' );
	}

	$(window).on('load', function() {
		realHeight();
	});

	$(window).on('resize', function() {
		realHeight();
	});
        
        var interval = 1;
        $(document).on('click', '.members-list .member-sec', function(event) {
            event.preventDefault();
            var content_height = $('.content-wrapper').height();
            var sec_id = $(this).attr('data-member');
            var member_height = $('.member-'+sec_id).height();
            if(interval > 1) {
                $('.content-wrapper').css({height: (content_height - member_height)+'px'});
                $('.main-holder').css({height: (content_height - member_height - 100)+'px'});
                content_height = $('.content-wrapper').height();
            }
            $('.member').hide('slow');
            $('.member-'+sec_id).show('slow');
            $('.main-holder').animate({height: (content_height + member_height + 100)+'px'}, 500);
            $('.content-wrapper').animate({height: (content_height+ member_height)+'px'}, 500);
            interval++;
        });
});