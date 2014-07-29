<?php 
/*
Template Name: Contact
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

				?>

				<div class="contacts">
					<?php 
					if ($address = carbon_get_theme_option('general_address')) {
						echo wpautop(str_replace(',', "\n", $address));
					}

					if ($phone = carbon_get_theme_option('stationary_phone')) {
						echo '<p class="phone"><a href="tel:' . $phone . '">' . $phone . '</a></p><br />';
					}
					?>
					
					<a href="mailto:<?php bloginfo('admin_email'); ?>" class="mail"><?php bloginfo('admin_email'); ?></a>

					<?php if ($map = carbon_get_theme_option('general_map')): 
						$map_coords = get_option('general_map_lat') . ',' . get_option('general_map_lng');
						?>
						<div class="map">
							<div class="map-canvas" id="map" data-coords="<?php echo $map_coords; ?>"></div>
							<a href="#" class="enlarge-btn">Click map to enlarge</a>

							<div class="cl">&nbsp;</div>
						</div>

					<?php endif ?>
				</div>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>