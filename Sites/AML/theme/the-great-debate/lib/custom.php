<?php
/**
 * Custom functions
 */

    require_once(get_template_directory() . '/include/admin/post_types.php');           // Enable Custom Post Types
    require_once(get_template_directory() . '/include/admin/post_metacall.php');        // Enable Post Meta
    require_once(get_template_directory() . '/include/admin/homepage_settings.php');    
    require_once(get_template_directory() . '/include/admin/category_settings.php');    
    require_once(get_template_directory() . '/include/admin/sub_category_settings.php');    
    require_once(get_template_directory() . '/include/admin/export_data.php');          
    require_once(get_template_directory() . '/include/admin/theme_options.php');        
    require_once(get_template_directory() . '/include/ajax_functions.php');             // Load ajax function calls
    require_once(get_template_directory() . '/include/admin/revisions.php');

    // -----------------------------------------------------------
    // Register Taxonomies for custom post types
    // -----------------------------------------------------------
    add_action('init', 'reg_custom_taxonomies', 0);
    function reg_custom_taxonomies() {
        $post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');
        foreach($post_types as $post_type) {
            register_taxonomy_for_object_type('category', $post_type);
            register_taxonomy_for_object_type('post_tag', $post_type);
        }
    }
    
    // -----------------------------------------------------------
    // Remove comments page in menu if disabled
    // -----------------------------------------------------------
    add_action('admin_menu', 'tgbd_disable_comments_admin_menu');
    function tgbd_disable_comments_admin_menu() {
        $user = wp_get_current_user();
        $allowed_roles = array('editor', 'author', 'contributor', 'subscriber');
        if( array_intersect($allowed_roles, $user->roles ) ) {
            remove_menu_page('edit-comments.php');
            remove_menu_page( 'edit.php?post_type=page' );
            remove_menu_page( 'tools.php' );
            remove_menu_page('upload.php');
        }
        remove_menu_page('edit.php');
    }
    
    // -----------------------------------------------------------
    // Allow contributors to view post types
    // -----------------------------------------------------------
    function add_capability() {
        // gets the author role
        $role = get_role( 'contributor' );
        $role->add_cap( 'edit_pages' ); 
        $role->add_cap( 'edit_others_pages' );
    }
    add_action( 'admin_init', 'add_capability');
    
    // -----------------------------------------------------------
    // Removing admin dashboard footer text
    // -----------------------------------------------------------
    function cbi_remove_dashboard_footer_text () {
        echo '';
    }
    add_filter('admin_footer_text', 'cbi_remove_dashboard_footer_text');
    
    // -----------------------------------------------------------
    // Remove post type class on calling post_type() function
    // -----------------------------------------------------------
    function category_id_class($classes) {
        global $post;
        if($post) {
            $post_type = get_post_type($post->ID);
            $pos = array_search($post_type, $classes);
            if($pos != -1) unset($classes[$pos]);
        }
        return $classes;
    }
    add_filter('post_class', 'category_id_class');
    add_filter('body_class', 'category_id_class');
    
    // -----------------------------------------------------------
    // Auto assign parent category if not assigned
    // -----------------------------------------------------------
    function auto_assign_parent_category($post_id) {
        $post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');
        if(in_array($_POST['post_type'], $post_types)) {
            $post_categories = wp_get_post_categories( $post_id );
            foreach($post_categories as $post_category) {
                $cat = get_category($post_category);
                $parentId = $cat->parent;
                if(!in_array($parentId, $post_categories) && $parentId != 0) {
                    wp_set_post_categories( $post_id, array($parentId), true );
                }
            }
        }
    }
    add_action( 'save_post', 'auto_assign_parent_category' );
    
    // -----------------------------------------------------------
    // Adding text to header nav menu
    // -----------------------------------------------------------
    class mainnav_walker extends Roots_Nav_Walker {
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
            $item_html = '';
            parent::start_el($item_html, $item, $depth, $args);

            if ($item->is_dropdown && ($depth === 0)) {
                $item_html = str_replace('<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', '<a class="dropdown-toggle" data-target="#"', $item_html);
                $item_html = str_replace('</a>', '</a><div class="triangle"></div>', $item_html);
            }

            $item_html = apply_filters('roots_wp_nav_menu_item', $item_html);
            $output .= $item_html;
        }
    }
    
    class quick_links_walker extends Roots_Nav_Walker {
         function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
            $item_html = '';
            parent::start_el($item_html, $item, $depth, $args);

            global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="col-sm-2 col-xs-12 '. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            
            $span_title = preg_replace('/[^A-Za-z0-9\-\']/', '', $item->title);
            $prepend = "<span class='icon icon-". strtolower($span_title) ."'></span>";
            
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

           // $item_html = apply_filters('roots_wp_nav_menu_item', $item_html);
           // $output .= $item_html;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
    
    // -----------------------------------------------------------
    // Hide active menu on single page templates
    // -----------------------------------------------------------    
    function roots_cpt_active_menu($menu) {
        $post_type = get_post_type();
        $post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');
        if (in_array($post_type, $post_types) && is_single(get_the_ID()) ) {
            $menu = str_replace('active', '', $menu);
        }

        return $menu;
        
    }
    add_filter('nav_menu_css_class', 'roots_cpt_active_menu', 400);
    
    // -----------------------------------------------------------
    // Change positioning of menu items
    // -----------------------------------------------------------
    add_filter('custom_menu_order', 'my_custom_menu_order');
    add_filter('menu_order', 'my_custom_menu_order');
    function my_custom_menu_order($menu_ord) {
        if (!$menu_ord) return true;
        $post_types = array('case_study', 'opinion', 'event', 
        'news_item', 'video', 'audio', 'text_fact', 
        'graphic_fact', 'data_fact', 'factsheet_fact', 'toolkit');
        $arr[] = 'index.php';
        foreach($post_types as $post_type) {
            $arr[] = 'edit.php?post_type='.$post_type;
        }
        return $arr;
    }
    
    // -----------------------------------------------------------
    // Trim the content to specific character length
    // -----------------------------------------------------------
    function neat_trim($str, $link, $n, $show_more = true, $delim = 'Show&nbsp;more') {
        $len = strlen($str);
        if ($len > $n) {
            preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
            if($show_more)
                return rtrim($matches[1]) . "... " . $delim . "";
            else
                return rtrim($matches[1]) . "...";
        } else {
            if($show_more)
                return $str . " " . $delim . "";
            else
                return $str;
        }
    }
    
    // -----------------------------------------------------------
    // Custom pagination for tgbd_site
    // -----------------------------------------------------------
    function tgbd_pagination($tgbd_query) {
        $big = 999999999; // need an unlikely integer

        $pages = paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '/%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $tgbd_query->max_num_pages,
                'type'  => 'array',
                'prev_text'    => __('<'),
                'next_text'    => __('>'),
            ) );
        if( is_array( $pages ) ) {
            echo '<div class="row">'
                . '<div class="col-sm-10 col-sm-offset-1 pagination-wrap"><ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div></div>';
        }
    }