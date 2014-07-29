jQuery(document).ready(function(){
    jQuery('#p_type').change(function(){
        var pType = jQuery(this).val();
        if(pType === 'case_study' || pType === 'event') {
            jQuery('#loc').removeAttr("disabled");
        } else {
            jQuery('#loc').attr("disabled", "disabled");
        }
    });
    
    jQuery('#show-hide').click(function(e){
        e.preventDefault();
        var status = jQuery(this).attr('data-state');
        if(status === 'show') {
            jQuery(this).attr('data-state', 'hide');
            jQuery(this).html('Close');
			jQuery('.search-filters').fadeIn('slow');
        } else {
            jQuery(this).attr('data-state', 'show');
            jQuery(this).html('Advanced Search');
			jQuery('.search-filters').fadeOut('slow');
        }
    });
});