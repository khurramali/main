<?php get_header(); ?>

<div class="shell">
	<?php get_sidebar(); ?>

	<div class="content-wrapper">
		<div class="content">
			<div class="content-inner">
				<?php tdc_title_area(); ?>
				<?php get_template_part( 'loop' ) ?>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>