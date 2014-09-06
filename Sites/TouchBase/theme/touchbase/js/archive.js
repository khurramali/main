jQuery(document).ready(function(){
    jQuery(".expand").click(function() {
        var expand_id = jQuery(this).attr('data-eId');
        jQuery('.sub-expand').fadeOut('slow');
        jQuery('.expand').html(' + ');
        jQuery(this).html(' - ');
        jQuery('#'+expand_id).fadeIn('slow');
    });
    
    jQuery(".filter-mob").click(function(){
        var status = jQuery(this).attr("data-status");
        if(status === "hide") {
            jQuery(".mob-margin").animate({ 'margin-left': '-70%' }, 1000);
            jQuery(".hide-mobile").show("slow");
            jQuery(this).attr("data-status", "show");
        } else {
            jQuery(".mob-margin").animate({ 'margin-left': '0' }, 1000);
            jQuery(".hide-mobile").hide("slow");
            jQuery(this).attr("data-status", "hide");
        }
    });
});