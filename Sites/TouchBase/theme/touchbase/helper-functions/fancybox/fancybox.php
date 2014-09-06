<?php
if(!is_admin()) {
}
function load_fancybox_js() {
    wp_enqueue_script('fancybox',(get_bloginfo('template_directory').'/helper-functions/fancybox/fancybox.js'),false,false,false,true);
}
add_action('wp_footer','load_fancybox_js');

function load_fancybox_css() { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/helper-functions/fancybox/fancybox.css">
<?php
}
add_action('wp_head','load_fancybox_css');