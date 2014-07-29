<?php if(is_page('Sitemap')) {
    get_template_part('templates/content', 'sitemap');
} ?>
<?php if(is_page('Contact')) {
                get_template_part('templates/content', 'contact_us');
}else{ ?>
            
<div class="row article">

    	<div class="col-sm-10 col-sm-offset-1 beta delta pagina">
			<?php while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            
              <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
            <?php endwhile; ?>
		</div>

</div>
<?php } ?>