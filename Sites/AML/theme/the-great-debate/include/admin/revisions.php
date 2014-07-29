<?php
// -----------------------------------------------------------
// Guide: Please assign any new post types and respective custom
// fields to the following two functions:-
// tgbd_get_all_custom_fields - hardcode custom fields
// tgbd_get_custom_fields - assign custom post and custom fields
//                          for the post
// -----------------------------------------------------------

function tbgd_plugin_save_post( $post_id, $post ) {
    $parent_id = wp_is_post_revision( $post_id );
    if ( $parent_id ) {
        $custom_fields_keys = tgbd_get_custom_fields($parent_id);
        foreach($custom_fields_keys["keys"] as $key) {
            $tbgd_meta = get_post_meta( $parent_id, $key, true );
            if ( false !== $tbgd_meta )
                add_metadata( 'post', $post_id, $key, $tbgd_meta );
        }
    }

}
add_action( 'save_post', 'tbgd_plugin_save_post', 10 , 2 );

function tbgd_plugin_restore_revision( $post_id, $revision_id ) {
    $custom_fields_keys = tgbd_get_custom_fields($revision_id, false);
    foreach($custom_fields_keys["keys"] as $key) {
        $tbgd_meta  = get_metadata( 'post', $revision_id, $key, true );
        if ( false !== $tbgd_meta )
            update_post_meta( $post_id, $key, $tbgd_meta );
        else
            delete_post_meta( $post_id, $key );
    }
}
add_action( 'wp_restore_post_revision', 'tbgd_plugin_restore_revision', 10, 2 );

function tbgd_plugin_revision_fields( $fields ) {
    $custom_fields_keys = tgbd_get_all_custom_fields();
    for($item = 0; $item < count($custom_fields_keys["keys"]); $item++) {
        $key = $custom_fields_keys["keys"][$item];
        $fields[$key] = $custom_fields_keys["title"][$item];
    }

    return $fields;

}
add_filter( '_wp_post_revision_fields', 'tbgd_plugin_revision_fields' );

function tbgd_plugin_revision_field( $value, $field ) {
	global $revision;
	return get_metadata( 'post', $revision->ID, $field, true );
}
add_filter( '_wp_post_revision_field_my_meta', 'tbgd_plugin_revision_field', 10, 2 );


function tgbd_get_all_custom_fields () {    
    $tgbd_custom_fields = array( "keys" => array ( '_case_study_excerpt', '_case_study_hero',
        '_case_study_line1', '_case_study_suburb', '_case_study_town', '_case_study_county',
        '_case_study_postcode', '_case_study_src', '_opinion_excerpt', '_opinion_hero', 
        '_opinion_src', '_event_excerpt', '_event_hero', '_event_sdate', '_event_stime',
        '_event_edate', '_event_etime', '_event_url', '_event_line1', '_event_suburb', 
        '_event_town', '_event_county', '_event_postcode', '_news_item_excerpt', '_news_item_hero',
        '_video_excerpt', '_video_url', '_audio_excerpt', '_audio_embed', '_text_fact_excerpt',
        '_text_fact_hero', '_text_fact_src', '_graphic_fact_excerpt', '_graphic_fact_hero',
        '_graphic_fact_src', '_data_fact_excerpt', '_data_fact_hero', '_data_fact_embed', 
        '_data_fact_src', '_factsheet_fact_excerpt', '_factsheet_fact_hero',
        '_factsheet_fact_url', '_factsheet_fact_src' ),
                            "title" => array ( 'Introduction', 'Hero Image', 'Building number and street name',
        'Suburb', 'Town', 'County', 'Postcode', 'Source', 'Introduction', 'Hero Image', 'Author',
        'Introduction', 'Hero Image', 'Start Date', 'Start Time', 'End Date', 'End Time', 'Url',
        'Building number and street name', 'Suburb', 'Town', 'County', 'Postcode', 'Introduction',
        'Hero Image', 'Introduction', 'Url', 'Introduction', 'Embedded Code', 'Introduction', 
        'Hero Image', 'Source', 'Introduction', 'Hero Image', 'Source', 'Introduction', 'Hero Image', 
        'Embedded HTML',  'Source', 'Introduction',  'Hero Image', 'PDF Url', 'Source' ));
    
    return $tgbd_custom_fields; 
}

function tgbd_get_custom_fields($postID = null, $is_parent = true) {
    $post_type = ($is_parent) ? get_post_type($postID) : get_post_type(wp_is_post_revision($post_id));
    $custom_fields = array();

    switch($post_type):
        case "case_study":
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', '_'.$post_type.'_hero',
                '_'.$post_type.'_line1', '_'.$post_type.'_suburb', '_'.$post_type.'_town',
                '_'.$post_type.'_county', '_'.$post_type.'_postcode', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'Building number and street name',
                'Suburb', 'Town', 'County', 'Postcode', 'Source'));
            break;
 
        case 'opinion':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', 
                                    '_'.$post_type.'_hero', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'Author'));
            break;
        
        case 'event':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', '_'.$post_type.'_hero', 
                '_'.$post_type.'_sdate', '_'.$post_type.'_stime', '_'.$post_type.'_edate', '_'.$post_type.'_etime', 
                '_'.$post_type.'_url', '_'.$post_type.'_line1', '_'.$post_type.'_suburb', '_'.$post_type.'_town',
                '_'.$post_type.'_county', '_'.$post_type.'_postcode'),
                                    "title" => array('Introduction', 'Hero Image', 'Start Date', 'Start Time',
                'End Date', 'End Time', 'Url', 'Building number and street name', 'Suburb', 'Town', 'County', 'Postcode'));
            break;
        
        case 'news_item':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', '_'.$post_type.'_hero'),
                                    "title" => array('Introduction', 'Hero Image'));
            break;
        
        case 'video':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', '_'.$post_type.'_url'),
                                    "title" => array('Introduction', 'Url'));
            break;
        
        case 'audio':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', '_'.$post_type.'_embed'),
                                    "title" => array('Introduction', 'Embedded Code'));
            break;
        
        case 'text_fact':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', 
                                    '_'.$post_type.'_hero', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'Source'));
            break;
        
        case 'graphic_fact':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt', 
                                    '_'.$post_type.'_hero', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'Source'));
            break;
        
        case 'data_fact':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt' , '_'.$post_type.'_hero',
                                    '_'.$post_type.'_embed', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'Embedded HTML', 'Source'));
            break;
        
        case 'factsheet_fact':
            $custom_fields = array( "keys" => array ( '_'.$post_type.'_excerpt',  '_'.$post_type.'_hero',  
                                    '_'.$post_type.'_url', '_'.$post_type.'_src'),
                                    "title" => array('Introduction', 'Hero Image', 'PDF Url', 'Source'));
            break;
    endswitch;
    return $custom_fields;
}
?>