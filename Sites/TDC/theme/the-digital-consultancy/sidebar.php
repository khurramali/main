<div id="sidebar">
	<?php
	if (is_page()) {
		$sidebar = carbon_get_post_meta(get_the_id(), 'page_custom_sidebar');
	}
	if ( empty($sidebar) ) {
		$sidebar = 'default-sidebar';
	}
	dynamic_sidebar($sidebar);
	?>
</div>