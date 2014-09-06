jQuery(document).ready(function(){
    jQuery('#tb_join_us').submit(function(){
        var formData = jQuery(this).serialize();
        jQuery.ajax({
            url: siteUrl + "/wp-admin/admin-ajax.php",
            type:'POST',
            data:'action=tb_join_us&nonce='+passedvars.nonce+'&'+formData,
            success:function(results){
                jQuery('.message').html(results).show('slow');
                jQuery('#tb_join_us button').prop('disabled',true);
                //console.log(results);
            }
        });
        return false;
    });
});
/*
window.marker = null;
function initialize() {
    var map;
    var nottingham = new google.maps.LatLng(52.934658, -1.131450);
    var mapOptions = {
        // SET THE CENTER
        center: nottingham,
        // SET THE MAP STYLE & ZOOM LEVEL
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom:9,
        // SET THE BACKGROUND COLOUR
        backgroundColor:"#eeeeee",
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    google.maps.event.addDomListener(window, 'load', initialize);
    
}*/