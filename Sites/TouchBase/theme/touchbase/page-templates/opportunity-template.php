<?php
/*
  Template Name: Template - Opportunity
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-review'); ?>
<?php $page_meta = get_post_meta(get_the_ID()); //print_r($page_meta); ?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
			echo get_the_content();
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</div>

<div class="expanded-bg410"></div>
<div class="container">
    <div class="row content-wrapper mob_client_slider">
        <div class="col-lg-10 col-lg-offset-1 review-slider">
            <h1>What Our People Say</h1>
            <div class="row">
                <div class="col-xs-1"></div>
                <div id="review_slider">
                    <?php $reviews = get_post_meta(get_the_ID(), '_opportunity_review', true);
                    foreach($reviews as $review) { ?>    
                        <div class="col-md-5 col-xs-10">
                            <div class="speechbubble">
                                <p>" <?php echo $review["content"]; ?> "</p>
                                <div class="by"> - <?php echo $review["by"]; ?></div>
                            </div>
                            <span class="speechbubble-triangle"></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">            
            <h1>Current Opportunities</h1>
            <p><?php echo $page_meta['_opportunity_header'][0]; ?></p>
            <div class="row">
                <?php 
                    $jobs = get_post_meta(get_the_ID(), '_opportunity_job', true);
                    if($jobs) {
                        foreach($jobs as $job) { ?>
                            <div class="col-sm-6 job-item">
                                <h2><?php echo $job["title"]; ?></h2>
                                <p><?php echo $job["detail"]; ?></p>
                                <?php echo do_shortcode('[ssba]'); ?>
                            </div>
                        <?php }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg150"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Want To Join?</h1>
            <p><?php echo $page_meta['_opportunity_join_us'][0];  ?></p>
        </div>
    </div>
</div>


<?php get_footer(); ?>