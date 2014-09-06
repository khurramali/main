<?php
/*
  Template Name: Template - News / Events
 */
?>
<?php get_header(); ?>
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php 
//$urlLong = urlencode('http://touchbase/event/touchbase-webinar-the-power-of-video/');
//$hmtlBitly = file_get_contents('http://api.bit.ly/v3/shorten?login=simplesharebuttons&apiKey=R_555eddf50da1370b8ab75670a3de2fe6&longUrl=' . $urlLong); 
//var_dump($hmtlBitly);?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-md-9 col-xs-12 mob-margin">
                    <div class="hidden-lg hidden-md filter-mob" data-status="hide"><img src="<?php echo get_template_directory_uri(); ?>/images/filter.png" class="responsive-img" /></div>
                    <h1>Upcoming Events</h1>
                    <?php 
                        $events = new WP_Query(array('post_type' => 'event', 
                            'post_status' => array( 'publish', 'future' ), 
                            'posts_per_page' => -1, 'order' => 'ASC')); 
                        if ( $events->have_posts() ) :
                            while ( $events->have_posts() ) : $events->the_post();
                            if(get_post_meta(get_the_ID(), '_event_status', true)) {
                                get_template_part( 'content', get_post_format() );
                            }
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <h1>News</h1>
                            <?php 
                                $posts = new WP_Query(array('post_type' => 'post', 
                                    'paged' => get_query_var('paged'))); 
                                if ( $posts->have_posts() ) :
                                    while ( $posts->have_posts() ) : $posts->the_post();
                                        get_template_part( 'content', get_post_format() );
                                    endwhile;
                                endif;
                                
                                if ($posts->max_num_pages > 1) : ?>
                                <div class="row">
                                    <div class="col-xs-2"></div>
                                    <nav class="post-nav col-xs-10 omega alpha center-block">
                                        <ul class="pager">
                                          <li class="previous"><?php next_posts_link('<< Older Posts', $posts->max_num_pages); ?></li>
                                          <li class="next"><?php previous_posts_link('Newer Posts >>'); ?></li>
                                        </ul>
                                    </nav>
                                </div>
                                <?php 
                                endif; 
                                wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
                <?php get_template_part( 'sider', get_post_format() ); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>