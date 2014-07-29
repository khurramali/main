<?php get_header(); ?>
<div class="shell">
	<?php get_sidebar(); ?>
	<div class="content-wrapper">
		<div class="content">
			<div class="content-inner">
				<?php tdc_title_area();	?>
				<p><?php printf(__('Please check the URL for proper spelling and capitalization. %1$sIf you\'re having trouble locating a destination, try visiting the <a href="%2$s">home page</a>'), '<br />', home_url('/')); ?></p>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>