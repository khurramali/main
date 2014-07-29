<?php
$news_event = new WP_Query(array('post_type' => array('news_item', 'event'), 
                            'paged' => get_query_var('paged')));

if (!$news_event->have_posts()) : ?>
    <div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		 <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
 		 </div>
	 </div>
 </div>
    <?php //get_search_form(); ?>
<?php endif;

if ($news_event->have_posts()):
    while ($news_event->have_posts()): $news_event->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; ?>

<?php if ($news_event->max_num_pages > 1) : ?>
<?php tgbd_pagination($news_event); ?>
<?php endif; ?>
<?php wp_reset_query(); ?>