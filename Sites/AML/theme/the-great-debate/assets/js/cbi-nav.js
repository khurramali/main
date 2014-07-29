jQuery(document).ready(function() { 
        jQuery('#menu-primary .dropdown').hover(function() {
			jQuery(this).children('.triangle').show();
		}, function() {
			jQuery(this).children('.triangle').hide();
		});
		
		if(jQuery('.current-category-ancestor').length > 0) {
			jQuery(this).find('.current-category-ancestor .dropdown-menu').show();
			jQuery(this).find('.current-category-ancestor .triangle').show();
		}
});