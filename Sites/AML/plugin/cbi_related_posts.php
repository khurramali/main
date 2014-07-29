<?php
/*
Plugin Name: TGBD Related Posts
Version:     1.0
Description: Get related posts by tags & title and if nothing found, pulls some random posts
Author:      Khurram Ali
*/

define( 'CBI_MAX_RP', 5 );

/**
 * Main function to generate the cbi related posts output
 */
function cbi_show_related_posts() {
    $related_posts_ids = cbi_related_posts_ids();
    if($related_posts_ids != null) {
        echo '<div class="row col-sm-offset-1 col-sm-10 omega alpha"><hr class="dot-under"></div>';
        echo '<div class="row related"><div class="col-sm-4 col-xs-4 center-block text-center"><h3>RELATED</h3></div></div>';

        foreach($related_posts_ids as $related_post_id) {
            $post_data = get_post($related_post_id);
            $post_type = get_post_type($related_post_id);
            $post_excerpt = get_post_meta($related_post_id, '_'. $post_type . '_excerpt', true);
            $post_excerpt = ($post_excerpt != '') ? $post_excerpt : $post_data->post_excerpt;
            
            if($post_type == "video") {
                $attributes = "class='content_anch tgbd-popup-video' ";
                $attributes .= "href='".get_post_meta($related_post_id, '_'. $post_type . '_url', true)."'";
            } else if ( $post_type == "audio" ) {
                $attributes = "class='content_anch tgbd-popup-audio' ";
                $attributes .= "href='#audio-pod".$related_post_id."'";
                $pod_div = "<div id='audio-pod".$related_post_id."' style='display: none;'>".
                        get_post_meta($related_post_id, '_'. $post_type . '_embed', true)."</div>";
            } else {
                $attributes = "class='content_anch' ";
                $attributes .= "href='".  get_permalink($related_post_id)."'";
            } ?>
            <div class="row article">
			<div class="col-sm-10 col-sm-offset-1 beta delta related-posts">
                <article>
                    <div class="row">
                        <a <?php echo $attributes; ?> data-ptype="<?php echo $post_type; ?>">
                            <div class="hover-container">
                                <div class="news-item">
                                    <?php $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_data->ID ), 'medium' ); ?>
                                    <div class="cat-logo cat-<?php echo $post_type; ?>" style="background: url('<?php echo $feature_img[0]; ?>') no-repeat center center;"> <span class="icon icon-philtrum_rev philtrum">

                                    </div>
                                    <div class="col-sm-10 col-xs-9 cat-meta">
                                        <h2 class="entry-title-home"><?php echo $post_data->post_title; ?></h2>           
										<span class="icon icon-<?php echo $post_type; ?> mini-<?php echo $post_type; ?>"></span>

                                    </div>
                                </div>
                                <div class="<?php echo $post_type; ?>"></div>
                            </div>
                        </a>
                        <?php 
                            echo ($post_type == "audio") ? $pod_div : "";
                        ?>
                    </div>  
                </article>
            </div>
            </div>
            <?php
        }
       
    }
	
}


/**
 * Main function to generate the cbi related posts ids
 */
function cbi_related_posts_ids() {
    $post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact');
    $cbi_related_posts = array();
    $cbi_related_posts = get_cbi_related_posts_by_tags($post_types);
    $posts_matched_by_tag = count($cbi_related_posts);
    if($posts_matched_by_tag < CBI_MAX_RP) {
        $exclude_post_ids = (count($cbi_related_posts) > 0 ) ? implode(",", $cbi_related_posts) : "";
        $cbi_related_posts_by_title = 
                get_cbi_related_posts_by_title($post_types, 
                        $posts_matched_by_tag, 
                        $exclude_post_ids);
    }
    if(count($cbi_related_posts_by_title) > 0) {
        if($cbi_related_posts == null) $cbi_related_posts = array();
        foreach($cbi_related_posts_by_title as $related) {
            array_push($cbi_related_posts, $related->ID);
        }
    }
    
    if($cbi_related_posts == null) {
        $cbi_related_posts = array();
        global $post;
        $args = array( 'numberposts' => '8', 
            'post_type' => $post_types, 'post_status' => 'publish',
            'post__not_in' => array($post->ID) );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
            array_push($cbi_related_posts, $recent["ID"]);
	}
        shuffle($cbi_related_posts);
    }
    return $cbi_related_posts;
}


/**
 * Fetch related posts IDs by using post title.
 */
function get_cbi_related_posts_by_tags($post_types) {
    global $wpdb, $post;
    $tags = wp_get_post_tags($post->ID);
    $related_post_ids = array();
    if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args=array(
                'post_type' => $post_types,
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'showposts'=>$cbi_max_related_posts,
                'caller_get_posts'=>1,
                'fields' => 'ids'
        );
        $my_query = new wp_query($args);
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                array_push($related_post_ids, get_the_ID());
            }	
	}
        wp_reset_query();
        return $related_post_ids;
    }

}

/**
 * Fetch related posts IDs by using post title.
 */
function get_cbi_related_posts_by_title($post_types, $matched = 2, $exclude_post_ids = '', $daily_range = 1000) {
    global $wpdb, $post;
    $limit = ($matched < CBI_MAX_RP) ? CBI_MAX_RP - $matched : 0 ;
    $stuff = $post->post_title;
    $fields = "post_title";
                
    // Make sure the post is not from the future
    $time_difference = get_option( 'gmt_offset' );
    $now = gmdate( "Y-m-d H:i:s", ( time() + ( $time_difference * 3600 ) ) );

    // Limit the related posts by time
    $daily_range = $daily_range - 1;
    $current_date = strtotime( '-' . $daily_range . ' DAY' , strtotime( $now ) );
    $current_date = date ( 'Y-m-d H:i:s' , $current_date );

    $args = array(
            $stuff,
            $now,
            $current_date,
            $post->ID,
    );
    $sql = "
        SELECT DISTINCT ID
        FROM ".$wpdb->posts."
        WHERE MATCH (" . $fields . ") AGAINST ('%s')
        AND post_date < '%s'
        AND post_date >= '%s'
        AND post_status = 'publish'
        AND ID != %d";  
    if ( '' != $exclude_post_ids ) $sql .= " AND ID NOT IN (" . $exclude_post_ids . ") ";
    $sql .= " AND ( ";
    $multiple = false;
    foreach ( $post_types as $post_type ) {
            if ( $multiple ) $sql .= ' OR ';
            $sql .= " post_type = '%s'";
            $multiple = true;
            $args[] = $post_type;	// Add the post types to the $args array
    }
                    
    $args[] = $limit;
    $sql .= " ) LIMIT %d";
    $results = $wpdb->get_results( $wpdb->prepare( $sql, $args ) );
    return $results;
}    

/**
 * Create FULLTEXT index on activation.
 */
function cbi_related_posts_activate() {
    global $wpdb;

    $wpdb->hide_errors();
    $wpdb->query( 'ALTER TABLE ' . $wpdb->posts . ' ADD FULLTEXT cbi_related_title (post_title);' );
    $wpdb->show_errors();
	
}
register_activation_hook( __FILE__, 'cbi_related_posts_activate' );