<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <?php
  	if(isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	{
		 header('X-UA-Compatible: IE=edge');
	}
  ?>
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
  
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/gbd-styles.css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/icons.css" />
  <link rel="stylesheet" media="print" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/print.css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/fancybox.css" />
  
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  
  <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/respond.min.js"></script>
</head>