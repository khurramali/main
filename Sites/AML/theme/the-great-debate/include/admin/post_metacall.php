<?php

// -----------------------------------------------------------
// Custom post place holder
// -----------------------------------------------------------

require_once(get_template_directory() . '/include/admin/MetaBox.php');
require_once(get_template_directory() . '/include/admin/MediaAccess.php');

$meta_attach = new WPAlchemy_MediaAccess();
// include css to help style our custom meta boxes
if (is_admin()) {
    wp_enqueue_style('custom_meta_css', get_bloginfo('template_url') . '/include/admin/css/meta.css');
    wp_enqueue_style('icons_css', get_bloginfo('template_url') . '/assets/css/icons.css');
    wp_enqueue_style('select2_css', get_bloginfo('template_url') . '/include/admin/css/select2.css');
    
    wp_register_script('custom_meta_js', get_bloginfo('template_url') . '/include/admin/js/meta.js');
    wp_register_script('select2_js', get_bloginfo('template_url') . '/include/admin/js/select2.js');
    wp_enqueue_script('custom_meta_js');
    wp_enqueue_script('select2_js');
}

/**** Custom options for custom post types ******/
$custom_metabox_cs = new WPAlchemy_MetaBox(array
    (
    'id' => '_cs',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/cs_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_case_study_',
    'types' => array('case_study')
    )
);

$custom_metabox_op = new WPAlchemy_MetaBox(array
    (
    'id' => '_op',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/opinion_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_opinion_',
    'types' => array('opinion')
    )
);

$custom_metabox_ev = new WPAlchemy_MetaBox(array
    (
    'id' => '_ev',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/event_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_event_',
    'types' => array('event')
    )
);

$custom_metabox_ni = new WPAlchemy_MetaBox(array
    (
    'id' => '_ni',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/news_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_news_item_',
    'types' => array('news_item')
    )
);

$custom_metabox_vi = new WPAlchemy_MetaBox(array
    (
    'id' => '_vi',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/video_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_video_',
    'types' => array('video')
    )
);

$custom_metabox_au = new WPAlchemy_MetaBox(array
    (
    'id' => '_au',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/audio_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_audio_',
    'types' => array('audio')
    )
);

$custom_metabox_txt = new WPAlchemy_MetaBox(array
    (
    'id' => '_txt',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/text_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_text_fact_',
    'types' => array('text_fact')
    )
);

$custom_metabox_gf = new WPAlchemy_MetaBox(array
    (
    'id' => '_gf',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/graphic_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_graphic_fact_',
    'types' => array('graphic_fact')
    )
);

$custom_metabox_df = new WPAlchemy_MetaBox(array
    (
    'id' => '_df',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/data_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_data_fact_',
    'types' => array('data_fact')
    )
);

$custom_metabox_tk = new WPAlchemy_MetaBox(array
    (
    'id' => '_tk',
    'title' => 'File Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/toolkit_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_toolkit_',
    'types' => array('toolkit')
    )
);

$custom_metabox_ff = new WPAlchemy_MetaBox(array
    (
    'id' => '_ff',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/factsheet_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_factsheet_fact_',
    'types' => array('factsheet_fact')
    )
);

$custom_metabox_ca = new WPAlchemy_MetaBox(array
    (
    'id' => '_ca',
    'title' => 'Custom Information',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/campaign_ad_meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'hide_editor' => TRUE,
    'prefix' => '_campaign_ad_',
    'types' => array('campaign_ad')
    )
);