<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  // set_post_thumbnail_size(150, 150, false);
  // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)

  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
  
    // Define what post types to archieve 
    add_filter('pre_get_posts', 'cbi_cpt');
    function cbi_cpt($query) {
      if((is_category() || is_home() || is_search() ) && $query->is_main_query()) {
        $post_type = get_query_var('post_type');
            if($post_type)
                $post_type = $post_type;
            else
                $post_type = array('case_study', 'opinion', 'event', 
                                    'news_item', 'video', 'audio', 'text_fact', 
                                    'graphic_fact', 'data_fact', 'overview', 'factsheet_fact');
            $query->set('post_type',$post_type);
            return $query;
        }
    }
    
    /*
     * remove user capabilities to add categories or tags
     */
    add_action( 'init', 'remove_editor_manage_categories' ); 
    function remove_editor_manage_categories() {
        $roles = array('editor', 'author', 'contributor', 'subscriber');
        foreach($roles as $role) {
            $update_role = get_role( 'editor' );
            $update_role->remove_cap( 'manage_categories' );
        }
    }
    
    define(EXCERPT_COUNT, 100);
}
add_action('after_setup_theme', 'roots_setup');