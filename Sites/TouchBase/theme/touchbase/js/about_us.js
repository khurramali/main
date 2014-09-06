jQuery(document).ready(function(){
    jQuery(".member img").click(function() {
        var member_id = jQuery(this).attr('data-member');
        jQuery('.member-roll').hide();
        jQuery('.members').hide();
        jQuery('.member img').show();
        
        jQuery(this).hide();
        jQuery('.'+member_id).show();
    });
});