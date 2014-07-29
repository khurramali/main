<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="wrapper">
		<div class="background">
			<?php if ($bg = carbon_get_theme_option('global_background_image')): ?>
				<img src="<?php echo $bg; ?>" alt="" />
			<?php endif ?>
			<span class="overlay"></span>
		</div>
		<!-- end of background -->

		<div class="ajax">
			<div class="ajax-holder">
				<div id="header">
					<div class="shell">
						<h1 id="logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>

						<div id="navigation">
							<a href="#" class="menu-btn"></a>
							<?php wp_nav_menu('theme_location=main-menu&fallback_cb=&container='); ?>
						</div>
						<!-- end of navigation -->

						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<!-- end of header -->

				<div class="main-holder">
					<div class="main">