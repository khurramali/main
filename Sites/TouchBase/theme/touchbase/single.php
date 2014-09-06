<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-sm-10 col-sm-offset-1">
                <?php while ( have_posts() ) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo "Posted: " . get_the_date('dS M Y') . " by " . get_the_author(); ?></p>
                        <?php the_content(); ?>

                        <nav class="nav-single">
                            <h2></h2>
                                <span class="pull-left"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
                                <span class="pull-right"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
                        </nav><!-- .nav-single -->
                        
                <?php endwhile; // end of the loop. ?>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>