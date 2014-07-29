jQuery(document).ready(function(){
    jQuery(".export_data").click(function(){
        var formData = jQuery(this).attr('data-type');
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=export_to_file&type='+formData,
            success:function(results){
                window.location = jQuery.parseJSON(results);
                //console.log(jQuery.parseJSON(results));
            }
        });
        return false;
    });
    
    jQuery(".showIt").click(function(){
        var tableId = jQuery(this).attr("data-tableId");
        if( jQuery(this).is(':checked')) {
            jQuery("#"+tableId).show('slow');
        } else {
            jQuery("#"+tableId).hide('slow');
        }
    });
    
    if(jQuery(".cbi_select")) {
       jQuery(".cbi_select").select2();
    }
    
    jQuery(".add-more").click(function(){
        jQuery('#survey_data tr.end-row').before("<tr><td class='cbi_width15 cbi_texttop'></td>" + 
                "<td class='cbi_width50 cbi_texttop'><input type='text' name='cbi_survey[ans][]' " + 
                "id='cbi_survey[ans][]' class='cbi_width95 cbi_field' value='' /> <a href='#' " + 
                "class='rem_row'>X</a></td><td class='cbi_width35 cbi_texttop'></td></tr>");
        
        return false;
    });
    
    jQuery("#survey_data").on("click", ".rem_row", function(){
        jQuery(this).closest('tr').remove();
        return false;
    });
    
    jQuery(".add-more-cat").click(function() {
        var item_type = jQuery(this);
        var table_type = jQuery(this).attr("data-cat");
        var cat_type = jQuery(this).attr("data-type");
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=cbi_select_menu&cat_slug='+table_type+'&cat_type='+cat_type,
            success:function(results){
                jQuery(item_type).before(results);
                jQuery("#cbi_category_form").submit();
            }
        });
        return false;
    });
    
    jQuery("#cbi_category_table").on("click", ".rem_table", function(){
        jQuery(this).closest('table').remove();
        return false;
    });
    
    if(jQuery('#charNum').attr('data-counter')) {
        calculate_char_count(jQuery('#charNum').attr('data-counter'), jQuery('#excerpt'));
    }
    jQuery('#excerpt').keyup(function () {
        var max = jQuery('#charNum').attr('data-counter');
        calculate_char_count(max, jQuery(this));
    });
    
    jQuery('.feature_sticky').click(function(){
        var show = jQuery(this).val();
        if(show === '2') {
            jQuery('.show-four').hide("slow");
            jQuery('.show-two').show("slow");
        } else if (show === '4') {
            jQuery('.show-two').show("slow");
            jQuery('.show-four').show("slow");
        } else {
            jQuery('.show-two').hide("slow");
            jQuery('.show-four').hide("slow");
        }
    });
    
    jQuery('#camp_ad_table .camp_ad').click(function() {
        var checkbox_val = jQuery(this).val();
        jQuery("#camp_ad_table .camp_ad_input").hide("slow");
        jQuery("#camp_ad_table .camp_ad_"+checkbox_val).show("slow");
    });
    
    jQuery('#tgbd_sticky_table .sticky_type').click(function() {
       var checkbox_val = jQuery(this).val();
       jQuery("#tgbd_sticky_table .sticky_input").hide("slow");
       jQuery("#tgbd_sticky_table .sticky_"+checkbox_val).show("slow");
    });
});

function calculate_char_count(max, item) {
    var len = item.val().length;
    var char = max - len;
    jQuery('#charNum').text('( '+char+' chars remaining)');
}