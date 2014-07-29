<?php

function theme_init_theme() {
	# Enqueue jQuery
	wp_enqueue_script('jquery');

	# Front end scripts and styles won't be included in admin area
	if (is_admin()) {
		return;
	}

	# Enqueue custom scripts
	wp_enqueue_script('jquery-flexslider', get_bloginfo('stylesheet_directory') . '/js/jquery.flexslider-min.js', array('jquery'), '2.1');
	wp_enqueue_script('jquery-ba-bbq', get_bloginfo('stylesheet_directory') . '/js/jquery.ba-bbq.js', array('jquery'), '1.2.1');
	wp_enqueue_script('jquery-fullscreen', get_bloginfo('stylesheet_directory') . '/js/fullscreen.js', array('jquery'), '1.0');
	wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', array('jquery'), '3.0');
	wp_enqueue_script('jquery-theme-custom', get_bloginfo('stylesheet_directory') . '/js/functions.js', array('jquery'), '1.0');
	wp_enqueue_script('jquery-maps-markerWithLabel', get_bloginfo('stylesheet_directory') . '/js/marketWithLabel.js', array('jquery'), '1.0');

	# Enqueue custom styles
	wp_enqueue_style('jquery-flexslider', get_bloginfo('stylesheet_directory') . '/css/flexslider.css', array(), '2.1');
}
add_action('init', 'theme_init_theme');


add_action('after_setup_theme', 'theme_setup_theme');

# To override theme setup process in a child theme, add your own theme_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'theme_setup_theme' ) ):
function theme_setup_theme() {
	include_once('lib/common.php');
	include_once('lib/carbon-fields/carbon-fields.php');

	# Theme supports
	add_theme_support('automatic-feed-links');
	add_theme_support('menus');

	# Register Theme Menu Locations
	register_nav_menus(array(
		'main-menu'=>__('Main Menu'),
	));

	# Register CPTs
	include_once('options/post-types.php');
	
	# Attach custom widgets
	include_once('options/widgets.php');
	
	# Add Actions
	add_action('widgets_init', 'theme_widgets_init');
	add_action('wp_head', '_print_ie6_styles');
	add_action('carbon_register_fields', 'attach_theme_options');

}
endif;

# Register Sidebars
# Note: In a child theme with custom theme_setup_theme() this function is not hooked to widgets_init
function theme_widgets_init() {
	$default_sidebars = array(
		'Default Sidebar',
		'Home Widgets'
	);

	foreach ($default_sidebars as $sidebar_name) {
		register_sidebar(
			array(
				'name' => $sidebar_name,
				'id' => sanitize_title_with_dashes($sidebar_name),
			) + tdc_sidebar_options()
		);
	}
}

function attach_theme_options() {
	# Attach fields
	include_once('options/theme-options.php');
	include_once('options/custom-fields.php');
}

function tdc_sidebar_options() {
	return array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
}

function tdc_add_http_to_url($url) {
	//For testing purposes
	if ($url == '#') {
		return '#';
	}
	$url = trim($url);
	$has_http = stristr($url, 'http://');
	if (!$has_http) {
		$url = 'http://' . $url;
	}
	return $url;
}

function tdc_remove_http_from_url($url) {
	//For testing purposes
	if ($url == '#') {
		return '#';
	}
	$url = trim($url);
	$has_http = stristr($url, 'http://');
	if ($has_http) {
		$url = str_replace('http://', '', $url);
	}
	$last_slash = strrpos($url, '/');
	if ($last_slash == strlen($url) - 1) {
		$url = preg_replace('~(.*)\/~', '$1', $url);
	}
	return $url;
}

function tdc_title_area() {
	if(is_page()) {
		global $post;
		$title = carbon_get_post_meta(get_the_ID(), 'page_custom_title');
		if (!$title) {
			$title = get_the_title();
		}
	} elseif(is_home() || is_single()) {
		$title = '';
	} elseif (is_search()) {
		$title = 'Search Results';
	} elseif(is_category()) {
		$title = single_cat_title('', false);
	} elseif(is_tag()) {
		$title = single_tag_title('', false);
	} elseif(is_day()) {
		$title = 'Archive for ' . get_the_time('F jS, Y');
	} elseif(is_month()) {
		$title = 'Archive for ' . get_the_time('F, Y');
	} elseif(is_year()) {
		$title = 'Archive for ' . get_the_time('Y');
	} elseif(is_author()) {
		$title = 'Author Archive';
	} elseif(is_404()) {
		$title = 'Error 404 - Not Found';
	} else {
		$title = 'Archives';
	}
	if (empty($title)) {
		return;
	}
	?>
	<div id="main-title" <?php echo !is_page() ? 'class="on-blog"' : ''; ?>>
		<h3><?php echo nl2br($title); ?></h3>
	</div>
	<?php
}

add_filter('excerpt_more', 'tdc_excerpt_more');
function tdc_excerpt_more($more) {
	return '...';
}

function tdc_social_sharing_buttons() {
	/*global $post;
	?>
	<div class="socials">
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style" addthis:url="<?php the_permalink(); ?>">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:href="<?php the_permalink(); ?>"></a>
			<a class="addthis_button_tweet" tw:url="<?php the_permalink(); ?>"></a>
			<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-519f6e3e6d8f2183"></script>
		<!-- AddThis Button END -->
	</div>
	<!-- end of socials -->
	<?php*/
}

function tdc_get_menus_dropdown() {
	$all_menus = wp_get_nav_menus();
	$pretty_menus = array(0 => 'None');
	if ($all_menus) {
		foreach ($all_menus as $m) {
			$pretty_menus[$m->term_id] = $m->name;
		}
	}
	return $pretty_menus;
}

function tdc_get_timthumb($src, $w, $h, $crop = 1) {
	$url = get_bloginfo('stylesheet_directory') . '/lib/timthumb.php?';
	$url .= 'src=' . urlencode($src);
	$url .= '&w=' . $w;
	$url .= '&h=' . $h;
	$url .= '&zc=' . $crop;
	return $url;
}

register_sidebar( array(
	'name' => 'TDC Widget within a page',
	'id' => 'tdc-page-widget',
	'before_widget' => '<div id="tdc-page-widget">',
	'after_widget' => '</div>',
	'before_title' => false,
	'after_title' => false
) );

add_action( 'tdc_custom_widget', 'tdc_page_widget' );

function tdc_page_widget() {
    dynamic_sidebar( 'tdc-page-widget' );
}

?>