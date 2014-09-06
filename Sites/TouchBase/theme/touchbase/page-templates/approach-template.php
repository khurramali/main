<?php
/*
  Template Name: Template - Approach
 */
?>
<?php get_header(); ?>
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

<div class="expanded-bg640"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <img class="alignleft responsive-img hidden-xs" src="<?php echo get_template_directory_uri(); ?>/images/design.png">
            <h1 class="mobile-padd">Design</h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="process-margin">
                        <?php echo $page_meta['_approach_d_header'][0];  ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 process-img">
                    <div class="process-margin">
                        <img src="<?php echo $page_meta['_approach_d_img'][0];  ?>" class="responsive-img" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row process-margin">
                    <?php 
                        $processes = get_post_meta(get_the_ID(), '_approach_d_process', true);
                        if($processes) {
                            foreach($processes as $process) { ?>
                                <div class="col-sm-6 col-xs-12 process-wrapper">
                                    <h2><?php echo $process["title"]; ?></h2>
                                    <p><?php echo $process["content"]; ?></p>
                                </div>
                            <?php }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <img class="alignleft responsive-img hidden-xs" src="<?php echo get_template_directory_uri(); ?>/images/transition.png" />
            <h1 class="mobile-padd">Transition</h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="process-margin">
                        <?php echo $page_meta['_approach_t_header'][0];  ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 process-img">
                    <div class="process-margin">
                        <img src="<?php echo $page_meta['_approach_t_img'][0];  ?>" class="responsive-img" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row process-margin">
                    <?php 
                        $processes = get_post_meta(get_the_ID(), '_approach_t_process', true);
                        if($processes) {
                            foreach($processes as $process) { ?>
                                <div class="col-sm-6 col-xs-12 process-wrapper">
                                    <h2><?php echo $process["title"]; ?></h2>
                                    <p><?php echo $process["content"]; ?></p>
                                </div>
                            <?php }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg690"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <img class="alignleft responsive-img hidden-xs" src="<?php echo get_template_directory_uri(); ?>/images/manage.png" />
            <h1 class="mobile-padd">Manage</h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="process-margin">
                        <?php echo $page_meta['_approach_m_header'][0];  ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 process-img">
                    <div class="process-margin">
                        <img src="<?php echo $page_meta['_approach_m_img'][0];  ?>" class="responsive-img" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row process-margin">
                    <?php 
                        $processes = get_post_meta(get_the_ID(), '_approach_m_process', true);
                        if($processes) {
                            foreach($processes as $process) { ?>
                                <div class="col-sm-6 col-xs-12 process-wrapper">
                                    <h2><?php echo $process["title"]; ?></h2>
                                    <p><?php echo $process["content"]; ?></p>
                                </div>
                            <?php }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>