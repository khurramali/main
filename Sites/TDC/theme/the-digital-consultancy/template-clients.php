<?php 
/*
Template Name: Clients
*/
get_header(); 
the_post();
?>
<div class="shell">
	<?php get_sidebar(); ?>

	<div class="content-wrapper">
		<div class="content">
			<div class="content-inner">
				<?php 
				tdc_social_sharing_buttons();

				tdc_title_area();
				the_content(); 

				$total_posts = query_posts('post_type=client&posts_per_page=-1&orderby=menu_order&order=ASC');
                                
				if (have_posts()) {
					?>

					<div class="logos-holder">
						<div class="logos" data-count="<?php echo count($total_posts); ?>">
							<?php
							while(have_posts()) {
								the_post();
								$img = carbon_get_post_meta(get_the_ID(), 'client_logo');
								$link = carbon_get_post_meta(get_the_ID(), 'client_link');
								?>

								<?php if ($link): ?>
									<a href="<?php echo $link; ?>" target="_blank">
								<?php endif ?>
									<img src="<?php echo tdc_get_timthumb($img, 134, 147, 3); ?>" alt="" />
								<?php if ($link): ?>
									</a>
								<?php endif ?>
								
								<?php
							}
							?>
							<div class="cl">&nbsp;</div>
						</div>
						<!-- end of logos -->
					</div>

					<?php
				}
				wp_reset_query();
				?>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>