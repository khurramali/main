jQuery(document).ready(function(){
    jQuery("a#news-inline").fancybox();
    
    jQuery('#cbi_newsletter').submit(function(){
        jQuery('#newsletter .message').hide('slow');
        var formData = jQuery('#cbi_newsletter').serialize();
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=cbi_store_data&nonce='+passedvars.nonce+'&ctype=newsletter&'+formData,
            success:function(results){
                jQuery('#newsletter .message').html(results).show('slow');
                //jQuery('#cbi_newsletter button').prop('disabled',true);
                jQuery('#newsletter').animate({height: "20px"}, 500);
                jQuery('#cbi_newsletter').hide('slow');
                //alert(results);
            }
        });
        return false;
    });
    
    /*jQuery("#show-search").click(function(e){
        e.preventDefault();
        jQuery(".search-form").show('slow').animate({margin: 0}, 200);
        jQuery(this).hide();
    });*/
    
    jQuery("#show-search").click(function(e){
        e.preventDefault();
        jQuery(this).html('<span class="icon icon-search icon-search-mobile"></span>');
        jQuery(".search-field").show('slow').animate({margin: 0}, 200);
        setTimeout(function(){jQuery(".search-field").focus(); },100);
    });
    
     jQuery(".tgbd-popup-audio").fancybox();
    
    jQuery(".tgbd-popup-video").click(function() {
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