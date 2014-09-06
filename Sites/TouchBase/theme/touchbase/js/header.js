jQuery(document).ready(function(){
    jQuery('.mobile-main-menu').click(function() {
        jQuery('.primary-nav').slideToggle('slow');
    });
    
    jQuery('.mobile-sec-menu').click(function() {
        jQuery('.sec-nav').slideToggle('slow');
    });
    
    jQuery('.primary-nav .primary-mob-menu li a').click(function(e) {
        var ul_parent = jQuery(this).closest('li').parent();
        if(ul_parent.hasClass('sub-menu')) {
            return true;
        } else {
            jQuery(this).closest('li').children('ul').slideToggle('slow');
            jQuery('.primary-nav .primary-mob-menu li a').not(this).closest('li').children('ul').slideUp('slow');
            return false;
        }
    });
});