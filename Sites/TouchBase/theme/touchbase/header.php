<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Welcome to Touchbase</title>

    <meta http-equiv="X-UA-Compatible" content="IE=9" />

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->

    
    <?php wp_head(); ?>
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/style-responsive.css" />
</head>
<body <?php body_class(); ?>>
    <div class="expanded-bg75"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 header-top">
                <div class="row">
                    <div class="col-xs-7">
                        <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/TBlogo.png" class="responsive-img" /></a>
                    </div>
                    
                    <div class="col-xs-5">
                        <span class="pull-right">
                            <a href="/contact-us" class="btn btn-contact">
                                Contact Us
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(is_archive() || is_single()) {
        $page = get_page_by_title( 'News' );
        $header_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ),  'full' );        
    } else {
        $header_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),  'full' );
    }
    ?>
    <div class="hidden-lg hidden-md">
        <div class="mobile-main-menu"><img src="<?php echo get_template_directory_uri(); ?>/images/mobnavgrey.png" class="responsive-img" /><span>MENU</span></div>
        <nav class="nav-main primary-nav" role="navigation">
            <?php
              if (has_nav_menu('primary-menu')) :
                wp_nav_menu(array('theme_location' => 'primary-menu', 
                'menu_class' => 'nav nav-pills primary-menu primary-mob-menu'));
              endif;
            ?>
        </nav>
        <div class="mobile-sec-menu"><img src="<?php echo get_template_directory_uri(); ?>/images/mobnavwht.png" class="responsive-img" /><span>About</span></div>
        <nav class="nav-main sec-nav" role="navigation">
            <?php
              if (has_nav_menu('secondary-menu')) :
                wp_nav_menu(array('theme_location' => 'secondary-menu', 
                    'menu_class' => 'nav nav-pills secondary-menu'));
              endif;
            ?>
        </nav>
    </div>
    <div class="header-img" style="background: url('<?php echo (has_post_thumbnail( get_the_ID()) || is_archive() || is_single()) ? $header_image[0] : "http://placehold.it/1600x310"; ?>') no-repeat center;"></div>
    <div class="container">
        <div class="row hidden-sm hidden-xs">
            <div class="col-lg-10 col-lg-offset-1">
                <nav class="nav-main primary-nav" role="navigation">
                    <?php
                      if (has_nav_menu('primary-menu')) :
                        wp_nav_menu(array('theme_location' => 'primary-menu', 
                        'menu_class' => 'nav nav-pills primary-menu'));
                      endif;
                    ?>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 header-title">
                <h1><span>TOUCHBASE</span></h1>
                <h2><span><?php echo get_touchbase_title(); ?></span></h2>
            </div>
        </div>
        <div class="row hidden-sm hidden-xs">
            <div class="col-lg-10 col-lg-offset-1">
                <nav class="nav-main" role="navigation">
                    <?php
                      if (has_nav_menu('secondary-menu')) :
                        wp_nav_menu(array('theme_location' => 'secondary-menu', 
                            'menu_class' => 'nav nav-pills secondary-menu'));
                      endif;
                    ?>
                </nav>
            </div>
        </div>
    </div>