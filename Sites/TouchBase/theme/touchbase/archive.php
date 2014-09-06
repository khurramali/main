<?php get_header(); ?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-md-9 col-xs-12 mob-margin">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="hidden-lg hidden-md filter-mob" data-status="hide"><img src="<?php echo get_template_directory_uri(); ?>/images/filter.png" class="responsive-img" /></div>
                            <?php if ( have_posts() ) : ?>
                                <header class="archive-header">
                                        <h1 class="archive-title"><?php
                                            if ( is_month() ) :
                                                    printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
                                            elseif ( is_year() ) :
                                                    printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
                                            endif;
                                        ?></h1>
                                </header><!-- .archive-header -->

                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                            get_template_part( 'content', get_post_format() );
                                    endwhile;
                                    ?>

                                    <?php else : ?>
                                            <?php //get_template_part( 'content', 'none' ); ?>
                                    <?php endif;
                                
                                    if ($wp_query->max_num_pages > 1) : ?>
                                    <div class="row">
                                        <div class="col-xs-2"></div>
                                        <nav class="post-nav col-xs-10 omega alpha center-block">
                                            <ul class="pager">
                                              <li class="previous"><?php next_posts_link('<< Older Posts', $wp_query->max_num_pages); ?></li>
                                              <li class="next"><?php previous_posts_link('Newer Posts >>'); ?></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <?php 
                                    endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php get_template_part( 'sider', get_post_format() ); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>