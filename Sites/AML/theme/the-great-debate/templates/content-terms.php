<?php
    $cat_parent = array();
    $cat_child = array();
    $terms = get_the_terms(get_the_ID(), 'category');
    foreach( $terms as $term ) {
		if($term->parent == 0)
            $cat_parent[] = array('id' => $term->term_id, 'slug' => $term->slug, 'title' => $term->name);
        else
            $cat_child[$term->parent][] = array('id' => $term->term_id, 'slug' => $term->slug, 'title' => $term->name);
    }
    $cbi_menu_status = (get_option('_cbi_subnav')) ? get_option('_cbi_subnav') : "off";
    $parent_count = 1;
    foreach($cat_parent as $parent) {
		$term_link = get_term_link( $parent['id'], 'category' );
        echo '<a class="cat-button" href="' . esc_url( $term_link ) . '">' . $parent['title'] . '</a>';
        if($cbi_menu_status != "off") {
            $parent_id = $parent['id'];
            $child_count = 1;
            echo ": ";
            foreach($cat_child[$parent_id] as $child) {
                $term_link = get_term_link( $child['id'], 'category' );
                echo '<a href="' . esc_url( $term_link ) . '">' . $child['title'] . '</a>';
                echo (count($cat_child[$parent_id]) == $child_count) ? "<br/>" : " | ";
                $child_count++;
            }
        } else {
            echo (count($cat_parent) != $parent_count) ? ' | ' : '';
        }
        $parent_count++;
    }

?>