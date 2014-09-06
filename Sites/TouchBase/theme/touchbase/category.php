<?php get_header(); ?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if ( have_posts() ) : ?>
                                    <header class="archive-header">
                                            <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
                                    </header><!-- .archive-header -->

                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                            get_template_part( 'content', get_post_format() );
                                    endwhile;
                                endif;
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