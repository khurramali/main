<?php
$media = new WP_Query(array('post_type' => array('video', 'audio'), 
                                'paged' => get_query_var('paged')));

if (!$media->have_posts()) : ?>
    <div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		 <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
 		 </div>
	 </div>
 </div>
    <?php //get_search_form(); ?>
<?php endif;


if ($media->have_posts()):
    while ($media->have_posts()): $media->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; ?>

<?php if ($media->max_num_pages > 1) : ?>
<?php tgbd_pagination($media); ?>
<?php endif; ?>
<?php wp_reset_query(); ?>