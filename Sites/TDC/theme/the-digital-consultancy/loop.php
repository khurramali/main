<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class('post') ?>>
			<h3>
				<?php if (!is_single()): ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php endif ?>
				<?php the_title(); ?>
				<?php if (!is_single()): ?>
					</a>
				<?php endif ?>
			</h3>
			<?php if ( $post->post_type == 'post' ): ?>
				<p class="postmetadata">
					<?php the_time('F jS, Y') ?> | 
					<?php the_tags(__('Tags: '), ', ', ' | '); ?> 
					<?php _e('Posted in '); the_category(', '); ?> | 
					<?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
				</p>
			<?php endif ?>

			<div class="entry">
				<?php 
				if (is_single()) {
					the_content(); 
				} else {
					the_excerpt();
				}
				
				?>
			</div>

			<?php tdc_social_sharing_buttons(); ?>

			<?php 
			if (is_single()) {
				comments_template();
			}
			?>
			
		</div>
	<?php endwhile; ?>

	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></div>
		</div>
	<?php endif; ?>
	
<?php else : ?>
	<div id="post-0" class="post error404 not-found">
		<h2>Not Found</h2>
		
		<div class="entry">
			<?php  
			if ( is_category() ) { // If this is a category archive
				printf("<p>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				echo("<p>Sorry, but there aren't any posts with this date.</p>");
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf("<p>Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
			} else if ( is_search() ) {
				echo("<p>No posts found. Try a different search?</p>");
			} else {
				echo("<p>No posts found.</p>");
			}
			get_search_form(); 
			?>
		</div>
	</div>
<?php endif; ?>