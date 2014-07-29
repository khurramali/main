<?php wp_enqueue_script('cbi-carousel'); ?>
<?php 
    $category = get_category(get_query_var('cat'));
    $current_slug = $category->slug;
    $carousel_items = array();
    if($category->category_parent == 0) {
        $carousel_items = json_decode(get_option('_cbi_catpage'));
    } else {
        $carousel_items = json_decode(get_option('_cbi_sub_catpage'));        
    }
    //$post_ids = array(1,2,3,4); 
    $post_ids = $carousel_items->$current_slug; 
    if(count($post_ids) > 0 && $post_ids[0] != "") {
    shuffle($post_ids);
?>
<div class="row featured-carousel">
	<div class="col-lg-12 beta delta">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php for($item=1; $item <=count($post_ids); $item++) { ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $item-1; ?>" 
                class="<?php echo (($item-1) == 0) ? "active" : ""; ?>"></li>
            <?php } ?>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php for($item=1; $item <=count($post_ids); $item++) { 
                $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $homepage_option->feature ), 'single-post-thumbnail' );
                ?>
                <div class="<?php echo ($item==1) ? "active" : ""; ?> item">
                    <img src="<?php echo $feature_img[0] ."&text=" . str_replace(" ", "+", get_the_title($post_ids[$item-1])); ?>" alt="" class="img-responsive">
                  <!--<div class="carousel-caption">
                      Random Category Post <br /><?php //echo get_the_title($post_ids[$item-1]); ?>
                  </div>-->
                </div>
            <?php } ?>
          </div>
        
          
        </div>
    </div>
</div>
    <?php } ?>