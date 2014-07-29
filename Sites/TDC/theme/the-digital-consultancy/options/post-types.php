<?php  

register_post_type('client', array(
	'labels' => array(
		'name'	 => 'Clients',
		'singular_name' => 'Client',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Client' ),
		'view_item' => 'View Client',
		'edit_item' => 'Edit Client',
	    'new_item' => __('New Client'),
	    'view_item' => __('View Client'),
	    'search_items' => __('Search Clients'),
	    'not_found' =>  __('No clients found'),
	    'not_found_in_trash' => __('No clients found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'page-attributes'),
));

?>