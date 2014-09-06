<?php
/*
  Template Name: Template - Technology Pages
 */
?>
<?php get_header(); ?>
<?php $page_meta = get_post_meta(get_the_ID()); //print_r($page_meta); ?>
<div class="container">
    <div class="row tech-content-wrapper">
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

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row technology-wrapper">
                <?php $sectors = get_post_meta(get_the_ID(), '_technology_sector', true);
                if($sectors) {
                    foreach($sectors as $sector) { ?>
                    <div class="col-sm-6 col-xs-12 section" id="<?php echo str_replace(" ", "_", strtolower($sector["head"])); ?>">
                            <img class="alignleft" src="<?php echo $sector["img"]; ?>" class="responsive-img">
                            <h1><?php echo $sector["head"]; ?></h1>
                            <p><?php echo $sector["content"]; ?></p>
                        </div>
                <?php } 
                } ?>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg672"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="approach-section">
                <h1>Approach</h1>
                <p><?php echo $page_meta['_technology_app_content'][0];  ?></p>
            </div>
            
            <div class="row approach-section-wrapper">
                <div class="col-md-4 col-xs-12">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/design.png" class="responsive-img">
                    <h2>Design</h2>
                    <p><?php echo $page_meta['_technology_design'][0];  ?></p>
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/transition.png" class="responsive-img">
                    <h2>Transition</h2>
                    <p><?php echo $page_meta['_technology_transition'][0];  ?></p>
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/manage.png" class="responsive-img">
                    <h2>Manage</h2>
                    <p><?php echo $page_meta['_technology_manage'][0];  ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 section-divider"></div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 approach-speech">
                    <div class="speechbubble">
                        <h1>Delivering Business Impact Across Your Business</h1>
                        <p>“<?php echo $page_meta['_technology_app_quote'][0];  ?>”</p>
                        <div class="by"><?php echo $page_meta['_technology_app_by'][0];  ?></div>
                    </div>
                    <span class="speechbubble-triangle"></span>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>