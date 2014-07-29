<?php
    register_post_type('case_study', array(
            'labels' => array(
                'name' => __('Case Studies'),
                'singular_name' => __('Case Study'),
                'view_item' => __('View Case Study'),
                'edit' => __('Edit Case Study'),
                'edit_item' => __('Edit Case Study'),
                'add_new' => __('Add Case Study'),
                'add_new_item' => __('Add Case Study')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-search',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('opinion', array(
            'labels' => array(
                'name' => __('Opinion Articles'),
                'singular_name' => __('Opinion Article'),
                'view_item' => __('View Opinion Article'),
                'edit' => __('Edit Opinion Article'),
                'edit_item' => __('Edit Opinion Article'),
                'add_new' => __('Add Opinion Article'),
                'add_new_item' => __('Add Opinion Article')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-chat',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('event', array(
            'labels' => array(
                'name' => __('Event Items'),
                'singular_name' => __('Event Item'),
                'view_item' => __('View Event Item'),
                'edit' => __('Edit Event Item'),
                'edit_item' => __('Edit Event Item'),
                'add_new' => __('Add Event Item'),
                'add_new_item' => __('Add Event Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('news_item', array(
            'labels' => array(
                'name' => __('News Items'),
                'singular_name' => __('News Item'),
                'view_item' => __('View News Item'),
                'edit' => __('Edit News Item'),
                'edit_item' => __('Edit News Item'),
                'add_new' => __('Add News Item'),
                'add_new_item' => __('Add News Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('video', array(
            'labels' => array(
                'name' => __('Video Items'),
                'singular_name' => __('Video Item'),
                'view_item' => __('View Video Item'),
                'edit' => __('Edit Video Item'),
                'edit_item' => __('Edit Video Item'),
                'add_new' => __('Add Video Item'),
                'add_new_item' => __('Add Video Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-video',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('audio', array(
            'labels' => array(
                'name' => __('Audio Items'),
                'singular_name' => __('Audio Item'),
                'view_item' => __('View Audio Item'),
                'edit' => __('Edit Audio Item'),
                'edit_item' => __('Edit Audio Item'),
                'add_new' => __('Add Audio Item'),
                'add_new_item' => __('Add Audio Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-audio',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('text_fact', array(
            'labels' => array(
                'name' => __('Text Fact Items'),
                'singular_name' => __('Text Fact Item'),
                'view_item' => __('View Text Fact Item'),
                'edit' => __('Edit Text Fact Item'),
                'edit_item' => __('Edit Text Fact Item'),
                'add_new' => __('Add Text Fact Item'),
                'add_new_item' => __('Add Text Fact Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-filled',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('graphic_fact', array(
            'labels' => array(
                'name' => __('Graphic Fact Items'),
                'singular_name' => __('Graphic Fact Item'),
                'view_item' => __('View Graphic Fact Item'),
                'edit' => __('Edit Graphic Fact Item'),
                'edit_item' => __('Edit Graphic Fact Item'),
                'add_new' => __('Add Graphic Fact Item'),
                'add_new_item' => __('Add Graphic Fact Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-filled',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
    
    register_post_type('toolkit', array(
            'labels' => array(
                'name' => __('Toolkit Files'),
                'singular_name' => __('Toolkit File'),
                'view_item' => __('View Toolkit Files'),
                'edit' => __('Edit Toolkit File'),
                'edit_item' => __('Edit Toolkit File'),
                'add_new' => __('Add Toolkit File'),
                'add_new_item' => __('Add Toolkit File')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-tools',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
        
    register_post_type('factsheet_fact', array(
            'labels' => array(
                'name' => __('Factsheet Fact Items'),
                'singular_name' => __('Factsheet Fact Item'),
                'view_item' => __('View Factsheet Fact Item'),
                'edit' => __('Edit Factsheet Fact Item'),
                'edit_item' => __('Edit Factsheet Fact Item'),
                'add_new' => __('Add Factsheet Fact Item'),
                'add_new_item' => __('Add Factsheet Fact Item')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-filled',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
        )
    );
        
    register_post_type('campaign_ad', array(
            'labels' => array(
                'name' => __('Campaign Ads'),
                'singular_name' => __('Campaign Ad'),
                'view_item' => __('View Campaign Ad'),
                'edit' => __('Edit Campaign Ad'),
                'edit_item' => __('Edit Campaign Ad'),
                'add_new' => __('Add Campaign Ad'),
                'add_new_item' => __('Add Campaign Ad')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => TRUE,
        'query_var' => true,
        'menu_position' => 100,
        'menu_icon' => 'dashicons-megaphone',
        'has_archive' => true,
        'capability_type' => 'campaign_ad',
        'supports' => array('title', 'editor', 'thumbnail', 'revisions')
        )
    );
?>
