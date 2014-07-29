<div class="row margin-bottom">
    <?php get_template_part('templates/content', 'survey'); ?>
</div>
<?php
    $homepage_option = json_decode(get_option('_cbi_homepage'));
    $sticky_feature  = $homepage_option->feature_sticky;
    
    $number_of_rows = ($sticky_feature != '0') ? $sticky_feature/2 : 0;
    if($number_of_rows != 0) {
        $counter = 0;
        $features = $homepage_option->features;
        for($count=1; $count <= $number_of_rows; $count++) {
            echo '<div class="row sp hidden-xs">';
                for($articles=0; $articles <2; $articles++) {
                    $sticky_article = get_post($features[$counter]);
                    $class = ($articles == 0) ? "col-sm-5 beta col-sm-offset-1" : "col-sm-5 beta";
                    $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $sticky_article->ID ), 'large' );
                    
                    if($sticky_article->post_type == "video") {
                        $attributes = "class='content_anch tgbd-popup-video' ";
                        $attributes .= "href='".get_post_meta($sticky_article->ID, '_'. $sticky_article->post_type . '_url', true)."'";
                    } else if ( $sticky_article->post_type == "audio" ) {
                        $attributes = "class='content_anch tgbd-popup-audio' ";
                        $attributes .= "href='#audio-pod".$sticky_article->ID."'";
                        $pod_div = "<div id='audio-pod".$sticky_article->ID."' style='display: none;'>".
                                get_post_meta($sticky_article->ID, '_'. $sticky_article->post_type . '_embed', true)."</div>";
                    } else {
                        $attributes = "class='content_anch' ";
                        $attributes .= "href='".  get_the_permalink($sticky_article->ID)."'";
                    }
                    ?>
                    <div class="<?php echo $class; ?>">
                        <article <?php post_class(); ?>>
                                <a <?php echo $attributes; ?> data-ptype="<?php echo $sticky_article->post_type; ?>">
                                    <div class="hover-container">
                                        <div class="sticky-news-item">
                                            <div class="sticky-cat-logo cat-<?php echo $sticky_article->post_type; ?>" style="background: url('<?php echo $feature_img[0]; ?>') no-repeat center;"><span class="icon icon-philtrum_rev_h philtrum-ninety"></span></div>
                                            <div class="col-xs-12 sticky-cat-meta">
                                                <h2 class="entry-title-home"><?php echo $sticky_article->post_title; ?></h2>
                                                <span class="icon icon-<?php echo $sticky_article->post_type; ?> mini-<?php echo $sticky_article->post_type; ?>"></span>
                                            </div>
                                        </div>
                                        <div class="<?php echo $sticky_article->post_type; ?>"></div>
                                    </div>
                                </a>
                                <?php 
                                    echo ($sticky_article->post_type == "audio") ? $pod_div : "";
                                ?>
                        </article>
                    </div>
                    <?php
                    $counter++;
                }
            echo '</div>';
        }
    }
    
$post_types = array('case_study', 'opinion', 'event', 
        'news_item', 'video', 'audio', 'text_fact', 
        'graphic_fact', 'data_fact', 'factsheet_fact');
$home_query = new WP_Query(array('post_type' => $post_types, 
                    'posts_per_page' => 4));
if ($home_query->have_posts()):
    while ($home_query->have_posts()): $home_query->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; 
wp_reset_query(); ?>

<div class="row show-more">
    <div class="col-sm-2 center-block text-center">
        <a href="/search/+">Show&nbsp;more</a>
    </div>
</div>

<div class="row">
	<div class="col-sm-4 col-sm-offset-1 beta hidden-xs" style="height: 150px; overflow: hidden;">
        <?php if($homepage_option->sticky_type == "dropdown") {
            $post = get_post($homepage_option->sticky_dropdown);
            $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            ?>
            <a href="<?php echo get_post_permalink($post->ID); ?>"><div class="sticky-post" style="background: url('<?php echo $feature_img[0]; ?>') no-repeat center; text-align: center; position: relative; height:100%;">
    		<?php echo '<h3>'.$post->post_title.'</h3>'; ?>
            </div></a>
        <?php } elseif($homepage_option->sticky_html) {
                echo stripslashes($homepage_option->sticky_html);
             } else { ?>
                <div class="sticky-post" style="background: red; text-align: center; position: relative; height:100%;">
                    <h3>Sticky Placeholder</h3>
                </div>
             <?php } ?>
	</div>
    <div class="col-sm-6 beta delta" style="margin-top: -15px">
    	 <div class="row" style="margin-right: 0px;">
        	<hr class="dot-under-twitter" />
        </div>
    	<div class="col-sm-5 col-xs-6 center-block text-center omega alpha twitter">
        	<h3><a href="http://twitter.com/bizdebate" target="_blank">follow tgbd</a></h3>
        </div>
       	<?php include roots_sidebar_path(); ?>
        
	</div>
</div>