<header class="banner container" role="banner">
  <div class="row">
  	
    <div class="col-sm-10 col-sm-offset-1">
      <!-- 
      <a class="brand" href="<?php echo home_url('/') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
       -->
      <nav class="nav-main" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
          endif;
        ?>
      </nav>
    </div>
    
  </div>
</header>