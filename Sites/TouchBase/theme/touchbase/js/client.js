jQuery(document).ready(function(){
    jQuery('#client_slider').bxSlider({
        slideWidth: 140,
        minSlides: 2,
        maxSlides: 5,
        moveSlides: 1,
        slideMargin: 10,
        pager: false,
        auto: true
    });
    
    jQuery('#client_video_slider').bxSlider({
        slideWidth: 140,
        minSlides: 2,
        maxSlides: 5,
        moveSlides: 1,
        slideMargin: 10,
        pager: false,
        auto: true
    });
    
    jQuery(".client_video_slider").click(function() {
       jQuery.fancybox({
            padding: 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'href'          : this.href.replace(new RegExp("watch.*v=","i"), "v/"),
            'type'          : 'iframe',
            afterClose : function(){
                jQuery('.bx-wrapper .bx-controls-direction a').css('z-index', 9999);
           },
           afterLoad :   function() {
                jQuery('.bx-wrapper .bx-controls-direction a').css('z-index', -1);
            }
        });
        return false;
    });
});