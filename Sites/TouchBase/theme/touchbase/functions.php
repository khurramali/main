<?php
add_theme_support('post-thumbnails');

//load foundation scripts
function enqueue_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

if (!is_admin()) {
    add_action('get_header', 'enqueue_jquery', 11);
}

/* Disable WordPress Admin Bar for all users. */
show_admin_bar(false);

/*** Load files before loading the site ***/
add_action('after_setup_theme', 'tb_setup');
function tb_setup() {
    require_once(get_template_directory() . '/helper-functions/bootstrap/bootstrap.php');
    require_once(get_template_directory() . '/helper-functions/bxslider/bxslider.php');
    require_once(get_template_directory() . '/helper-functions/fancybox/fancybox.php');
    require_once(get_template_directory() . '/class/twitterFeed.php');
    flush_rewrite_rules();
}

/*** Load custom jQuery and enqueue them by hooks ***/
add_action('wp_enqueue_scripts', 'wp_scriptSetup');
function wp_scriptSetup() {
    wp_register_script('tb-home', get_template_directory_uri() . '/js/home.js');
    wp_register_script('tb-about', get_template_directory_uri() . '/js/about_us.js');
    wp_register_script('tb-partners', get_template_directory_uri() . '/js/partners.js');
    wp_register_script('tb-archive', get_template_directory_uri() . '/js/archive.js');
    wp_register_script('tb-review', get_template_directory_uri() . '/js/review.js');
    wp_register_script('tb-client', get_template_directory_uri() . '/js/client.js');
    wp_register_script('tb-contact', get_template_directory_uri() . '/js/contact.js');
    wp_enqueue_script('tb-header', get_template_directory_uri() . '/js/header.js');
    
    $nonce = wp_create_nonce("nonce");
    wp_localize_script('tb-contact', 'passedvars', array('nonce' => $nonce));
}

/**** Add header settings *****/
function add_siteUrl_js() {
    echo '<script type="text/javascript">var siteUrl = "'. site_url() .'";</script>';
    echo '<script type="text/javascript">var siteTemplateUrl = "'. get_bloginfo('template_directory') .'";</script>';
    echo '<script type="text/javascript">var siteTemplateDir = "'. get_template_directory() .'";</script>';
}
add_action('admin_head', 'add_siteUrl_js');
add_action('wp_head', 'add_siteUrl_js');

// -----------------------------------------------------------
// Setup Menus
// -----------------------------------------------------------
add_action('init', 'menu_init', 0);
function menu_init() {
    register_nav_menus(
            array(
                'primary-menu' => __('Primary Menu'),
                'primary-mobile-menu' => __('Primary Mobile Menu'),
                'secondary-menu' => __('Secondary Menu'),
                'secondary-mobile-menu' => __('Secondary Mobile Menu'),
                'site-map' => __('Site Map')
            )
    );
}

// -----------------------------------------------------------
// Custom post place holder for dashboard
// -----------------------------------------------------------

// include css to help style our custom meta boxes
if (is_admin()) {
    wp_enqueue_style('custom_meta_css', get_bloginfo('template_url') . '/include/admin/css/meta.css');
}

//****** Dashboard configration ended *******//

/**** Adding custom post type 'Event' ******/
register_post_type('event', array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event'),
                'view_item' => __('View Event'),
                'edit' => __('Edit Event'),
                'edit_item' => __('Edit Event'),
                'add_new' => __('Add Event'),
                'add_new_item' => __('Add Event')
            ),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => FALSE,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'revisions')
        )
    );

/**** Custom options for page templates ******/
include_once 'include/admin/MetaBox.php';
include_once 'include/admin/MediaAccess.php';
include_once 'include/admin/ajax_functions.php';
include_once 'include/admin/theme_options.php';
$meta_attach = new WPAlchemy_MediaAccess();

$custom_metabox_home = new WPAlchemy_MetaBox(array
    (
    'id' => '_homepage_options',
    'title' => 'Homepage Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/homepage.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_homepage_',
    'include_template' => 'page-templates/home-template.php'
    ));

$custom_metabox_tech = new WPAlchemy_MetaBox(array
    (
    'id' => '_technology_options',
    'title' => 'Technology Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/technology.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_technology_',
    'include_template' => 'page-templates/technology-template.php'
    ));

$custom_metabox_about = new WPAlchemy_MetaBox(array
    (
    'id' => '_about_options',
    'title' => 'About Us Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/about_us.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_about_',
    'include_template' => 'page-templates/about-template.php'
    ));

$custom_metabox_approach = new WPAlchemy_MetaBox(array
    (
    'id' => '_approach_options',
    'title' => 'Approach Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/approach.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_approach_',
    'include_template' => 'page-templates/approach-template.php'
    ));

$custom_metabox_partners = new WPAlchemy_MetaBox(array
    (
    'id' => '_partners_options',
    'title' => 'Partners Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/partners.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_partners_',
    'include_template' => 'page-templates/partners-template.php'
    ));

$custom_metabox_opportunity = new WPAlchemy_MetaBox(array
    (
    'id' => '_opportunity_options',
    'title' => 'Opportunities Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/opportunity.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_opportunity_',
    'include_template' => 'page-templates/opportunity-template.php'
    ));

$custom_metabox_client = new WPAlchemy_MetaBox(array
    (
    'id' => '_client_options',
    'title' => 'Client Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/client.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_client_',
    'include_template' => 'page-templates/client-template.php'
    ));

$custom_metabox_contact = new WPAlchemy_MetaBox(array
    (
    'id' => '_contact_options',
    'title' => 'Contact Sections',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/contact_us.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_contact_',
    'hide_editor' => TRUE,
    'include_template' => 'page-templates/contact-template.php'
    ));

$custom_metabox_event = new WPAlchemy_MetaBox(array
    (
    'id' => '_event_options',
    'title' => 'Activate / Deactivate Event',
    'template' => TEMPLATEPATH . '/include/admin/meta_templates/event.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_event_',
    'context' => 'side',
    'priority' => 'high',
    'types' => array('event')
    ));

/******* End of custom options *****/


/******* Helper Functons *****/

function get_archive_by_year () { ?>
    <ul class="side-archive">
        <?php
        global $wpdb;
        $current_year = (get_the_date('Y')) ? get_the_date('Y') : date('Y');
        /**/
        $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
        foreach($years as $year) :
        ?>
            <li class="main-expand"><span class="expand" data-eId="sub-<?php echo $year; ?>"><?php echo ($year == $current_year) ? " - " : " + "; ?></span> 
                <a href="<?php echo get_year_link($year); ?> "><?php echo $year; ?></a>
                <ul class="sub-expand" id="sub-<?php echo $year; ?>" <?php echo ($year == $current_year) ? "" : "style='display: none;'"; ?>>
                    <?php	
                    $months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");
                    foreach($months as $month) : ?>
                        <li><a href="<?php echo get_month_link($year, $month); ?>"><?php echo date( 'F', mktime(0, 0, 0, $month) );?></a></li>
                    <?php endforeach;?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul> <?php
}

function get_touchbase_title() {
    if(is_page_template('page-templates/home-template.php')) {
        echo "Specialists in Cisco";
    }
    if(is_page_template('page-templates/technology-template.php')) {
        $pg_title = get_the_title();
        echo $pg_title . " solution";
    }
    if(is_page_template('page-templates/about-template.php')) {
        echo "About Our Company";
    }
    if(is_page_template('page-templates/approach-template.php')) {
        echo "Our approach and methodology";
    }
    if(is_page_template('page-templates/client-template.php')) {
        echo "About our clients";
    }
    if(is_page_template('page-templates/contact-template.php')) {
        echo "Contact us";
    }
    if(is_page_template('page-templates/news-template.php') || is_archive() || is_single()) {
        echo "Events, news & views";
    }
    if(is_page_template('page-templates/opportunity-template.php')) {
        echo "Opportunities to join us";
    }
    if(is_page_template('page-templates/partners-template.php')) {
        echo "Our partnerships";
    }
}

/******* End of Helper Functons *****/