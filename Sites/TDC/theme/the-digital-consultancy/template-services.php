<?php 
/*
Template Name: Services
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

				if ($services = carbon_get_post_meta(get_the_ID(), 'services', 'complex')) {
					?>
					<div class="accordion">
						<ul>
							<?php foreach ($services as $s): ?>
								<li>
									<span class="arr"></span>
									<h5><?php echo $s['title']; ?></h5>
									<div class="cnt">
										<?php echo wpautop($s['content']); ?>
									</div>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
					<?php	
				}

				tdc_social_sharing_buttons();
				?>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>