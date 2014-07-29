<?php if( get_post_type() != 'campaign_ad') { ?>
<?php get_template_part('templates/head'); ?>
<?php $cbi_menu_statuss = (get_option('_cbi_subnav')) ? get_option('_cbi_subnav') : "off"; ?>
<body <?php body_class(); ?> <?php if($cbi_menu_statuss=='on') { echo "id='subnav-on'"; } ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main>
    </div>
  </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
<?php } else { ?>
    <div class="content row">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main>
    </div>
  </div>
<?php } ?>