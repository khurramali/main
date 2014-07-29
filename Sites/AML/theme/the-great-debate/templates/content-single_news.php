<?php $pType = get_post_type(); $Pmeta = get_post_meta(get_the_ID()); ?>

<div class="row article">
    <div class="col-sm-12 beta delta omega alpha hero">
    <?php while (have_posts()) : the_post(); ?>
   
    	<?php if(!empty($Pmeta['_'. $pType .'_hero'][0])) { ?>
   
    	<img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />      
    	
        <img src="<?php echo $Pmeta['_'. $pType .'_hero'][0]; ?>" class="img-responsive" style="width: 100%;" alt="carousel image" />
        
        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                
        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
        
        <?php } ?>
        
        </div>
  <div class="col-sm-10 col-sm-offset-1 beta delta">
        <article <?php post_class(); ?>>
            <header>
              <h1 class="entry-title"><?php the_title(); ?></h1>
              <?php get_template_part('templates/entry-meta'); ?>
            </header>
            <div class="entry-content">
              <?php the_content(); ?>
                <div class="row">
                <div class="col-sm-7 omega alpha beta delta categories">
                    <?php get_template_part('templates/content', 'terms'); ?>
       			   </div>
                   <div class="col-sm-5 beta delta share text-right">
                        <a href="http://www.addthis.com/bookmark.php" class="addthis_button" style="text-decoration:none;">
                        Share <span class="icon icon-share"></span></a> 
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-506eb97a051aee97"></script>
                                        
                  </div>
              </div>
            </div>
            <footer>
              <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
        </article>            
    <?php endwhile; ?>
    </div>
</div>
    <?php if( function_exists( 'cbi_show_related_posts' ) ) {
        cbi_show_related_posts();
    } ?>