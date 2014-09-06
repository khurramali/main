jQuery(document).ready(function(){
    var review_width = jQuery("#review_slider div").width();
    var tot_slides = (jQuery("#review_slider").width() < 680) ? 1 : 2;
    if(jQuery("#review_slider").width() < 360) {
        jQuery( ".speechbubble p" ).each(function() {
            var text = jQuery(this).text();
            if(text.length >= 180) {
                text = text.substr(0,180) + '... "';
                jQuery(this).text(text);
            }
        });
    }
    jQuery('#review_slider').bxSlider({
        slideWidth: review_width,
        minSlides: tot_slides,
        maxSlides: tot_slides,
        moveSlides: 1,
        slideMargin: 10,
        pager: false,
        auto: true
    });
});