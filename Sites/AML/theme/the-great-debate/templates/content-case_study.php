<?php
$case_study = new WP_Query(array('post_type' => array('case_study'), 
                            'paged' => get_query_var('paged')));

if (!$case_study->have_posts()) : ?>
    <div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		 <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
 		 </div>
	 </div>
 </div>
    <?php //get_search_form(); ?>
<?php endif;


if ($case_study->have_posts()):
    while ($case_study->have_posts()): $case_study->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; ?>

<?php wp_reset_query(); ?>
<?php if ($case_study->max_num_pages > 1) : ?>
<?php //wp_pagenavi(array( 'query' => $case_study )); 
get_template_part('templates/content', 'paging'); ?>
<?php endif; ?>