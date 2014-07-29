<?php //get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'carousel-cat'); ?>

<div class="row margin-bottom">
    <?php get_template_part('templates/content', 'survey'); ?>
</div>


            
                <?php if (!have_posts()) : ?>
                  <div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		 <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
 		 </div>
	 </div>
 </div>
                  <?php //get_search_form(); ?>
                <?php else : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/content', 'category_content'); ?>
                    <?php //get_template_part('templates/content'); ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php if ($wp_query->max_num_pages > 1) : ?>
                    <?php tgbd_pagination($wp_query); ?>
                <?php endif; ?>