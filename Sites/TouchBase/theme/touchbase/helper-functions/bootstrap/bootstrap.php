<?php
if(!is_admin()) {
}
function load_bootstrap_js() {
    wp_enqueue_script('bootstrap',(get_bloginfo('template_directory').'/helper-functions/bootstrap/js/bootstrap.min.js'),false,false,false,true);
}
add_action('wp_footer','load_bootstrap_js');

function load_bootstrap_css() { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/helper-functions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/helper-functions/bootstrap/css/bootstrap-theme.min.css">
<?php
}
add_action('wp_head','load_bootstrap_css');