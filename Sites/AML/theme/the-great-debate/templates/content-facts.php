<?php
$facts = new WP_Query(array('post_type' => array('text_fact', 'graphic_fact',
                                'data_fact', 'factsheet_fact'), 'paged' => get_query_var('paged')));

if (!$facts->have_posts()) : ?>
    <div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		 <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
 		 </div>
	 </div>
 </div>
    <?php //get_search_form(); ?>
<?php endif;

if ($facts->have_posts()):
    while ($facts->have_posts()): $facts->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; ?>

<?php if ($facts->max_num_pages > 1) : ?>
<?php tgbd_pagination($facts); ?>
<?php endif; ?>
<?php wp_reset_query(); ?>