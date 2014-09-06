<?php
if(!is_admin()) {
}
function load_bxslider_js() {
    wp_enqueue_script('bxslider',(get_bloginfo('template_directory').'/helper-functions/bxslider/jquery.bxslider.min.js'),false,false,false,true);
}
add_action('wp_footer','load_bxslider_js');

function load_bxslider_css() { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/helper-functions/bxslider/jquery.bxslider.css">
<?php
}
add_action('wp_head','load_bxslider_css');