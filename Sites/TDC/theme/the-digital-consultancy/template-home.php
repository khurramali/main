<?php
/*
Template Name: Home
*/
get_header();
the_post();
?>

<?php if (($home_header = carbon_get_theme_option('homepage_head')) && !empty($home_header)) : ?>
    <div class="shell">
        <p class="home-head"><?php echo $home_header; ?></p>
    </div>
<?php endif ?>

<div class="shell">
	<div class="boxes">
		<?php dynamic_sidebar('home-widgets'); ?>

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end of boxes -->
</div>

<?php get_footer(); ?>