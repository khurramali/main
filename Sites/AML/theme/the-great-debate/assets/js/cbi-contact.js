jQuery(document).ready(function(){
    jQuery('#cbi_contactus').submit(function(){
        jQuery('.message').hide('slow');
        var formData = jQuery('#cbi_contactus').serialize();
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=cbi_store_data&nonce='+passedvars.nonce+'&ctype=contact&'+formData,
            success:function(results){
                jQuery('.message').html(results).show('slow');
                //jQuery('#cbi_contactus button').prop('disabled',true);
                jQuery('#cbi_contactus').hide('slow');
                //console.log(results);
            }
        });
        
        return false;
    });
});