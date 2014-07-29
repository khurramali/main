<?php
global $query_string;
$post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');

$post_types = (isset($_POST['p_type']) && $_POST['p_type'] != "") ? array($_POST['p_type']) : $post_types;
$orderBy = (isset($_POST['order_by']) && $_POST['order_by'] != "") ? $_POST['order_by'] : "ASC";
$args = array( 
              'post_type' => $post_types,
              'order' => $orderBy,
              'order_by' => 'title',
              's' => get_search_query(),
              'paged' => get_query_var('paged')
        );

if(isset($_POST['c_type']) && $_POST['c_type'] != "") {
    $args['cat'] = $_POST['c_type'];
}
if(isset($_POST['loc']) && $_POST['loc'] != "") {
    $args['meta_value'] = $_POST['loc'];
}

$search_items = new WP_Query($args);
if (!$search_items->have_posts()) : ?>
<div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
    	<div class="alert alert-warning">
    	<?php _e('Sorry, no search results were found.', 'roots'); ?>
        </div>
  </div>
</div>
  <?php //get_search_form(); ?>
<?php endif;

if ($search_items->have_posts()):
	echo "<div class='col-sm-7 col-sm-offset-1 beta delta omega alpha'><h1 class='entry-title' style='margin: 0px 0px 10px;'>search results: <span class='search-query'>".$args['s']."</span></h1></div>"; 
 get_template_part('templates/search', 'filters'); 
    while ($search_items->have_posts()): $search_items->the_post();
        get_template_part('templates/content');
    endwhile; 
endif; ?>

<?php if ($search_items->max_num_pages > 1) :
    tgbd_pagination($search_items);
    //wp_pagenavi( array( 'query' => $search_items) );
?>
<?php endif; ?>
<?php wp_reset_query(); ?>
