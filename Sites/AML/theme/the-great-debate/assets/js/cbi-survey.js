jQuery(document).ready(function(){
    jQuery("a#inline").fancybox();
    setTimeout(function() {jQuery("a.tgbn-auto-popup").trigger('click');}, 4e3);
    
    jQuery('#cbi_survey').submit(function(){
        jQuery('#survey_data .message').hide('slow');
        var formData = jQuery('#cbi_survey').serialize();
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=cbi_store_data&nonce='+passedvars.nonce+'&ctype=survey&'+formData,
            success:function(results){
                jQuery('#survey_data .message').html(results).show('slow');
                //jQuery('#cbi_survey button').prop('disabled',true);
                jQuery('#survey_data').animate({height: "20px"}, 500);
                jQuery('#cbi_survey').hide('slow');
                //alert(results);
            }
        });
        return false;
    });
});