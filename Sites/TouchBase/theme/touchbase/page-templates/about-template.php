<?php
/*
  Template Name: Template - About Us
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-about'); ?>
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

<div class="expanded-bg480"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Founding Principles</h1>
            <p><?php echo $page_meta['_about_header'][0];  ?></p>
            <div class="row">
                <div class="col-sm-4">
                    <div class="principlebubble">
                        <h2>People</h2>
                        <p><?php echo $page_meta['_about_people'][0];  ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="principlebubble">
                        <h2>Clients</h2>
                        <p><?php echo $page_meta['_about_clients'][0];  ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="principlebubble">
                        <h2>Proposition</h2>
                        <p><?php echo $page_meta['_about_proposition'][0];  ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="principlebubble">
                        <h2>Fiscal</h2>
                        <p><?php echo $page_meta['_about_fiscal'][0];  ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="principlebubble">
                        <h2>Operational Excellence</h2>
                        <p><?php echo $page_meta['_about_o_excellence'][0];  ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Leadership Team</h1>
            <div class="row leadership-sec">
                <div class="col-sm-8 col-xs-12">
                    <div class="row hidden-xs">
                        <?php $team_members = get_post_meta(get_the_ID(), '_about_member', true);
                        $is_active = true;
                        if($team_members) {
                            foreach($team_members as $member) { ?>
                                <div class="col-md-3 col-sm-4 col-xs-4 member" >
                                    <img src="<?php echo $member["img"]; ?>"
                                        data-member="<?php echo str_replace(" ", "_", strtolower($member["name"])); ?>"
                                        class="responsive-img mob-img-roll" <?php echo (!$is_active) ? "" : "style='display: none;'"; ?>>
                                    <div class="member-roll <?php echo str_replace(" ", "_", strtolower($member["name"])); ?>" 
                                        <?php echo ($is_active) ? "" : "style='display: none;'"; ?>>
                                        <h2><?php echo str_replace(" ", "<br />", $member["name"]); ?> <span class="hidden-xs">></span></h2>
                                        <div class="separator"></div>
                                        <p><?php echo $member["title"]; ?></p>
                                    </div>
                                </div>
                        <?php $is_active = false; } 
                        } ?>
                    </div>
                    <div class="row hidden-lg hidden-md hidden-sm">
                        <div class="col-xs-12">
                        <?php $team_members = get_post_meta(get_the_ID(), '_about_member', true);
                        $is_active = true;
                        if($team_members) {
                            foreach($team_members as $member) { ?>
                                <div class="member" >
                                    <img src="<?php echo $member["img"]; ?>"
                                        data-member="<?php echo str_replace(" ", "_", strtolower($member["name"])); ?>"
                                        class="responsive-img mob-img-roll" <?php echo (!$is_active) ? "" : "style='display: none;'"; ?>>
                                    <div class="member-roll <?php echo str_replace(" ", "_", strtolower($member["name"])); ?>" 
                                        <?php echo ($is_active) ? "" : "style='display: none;'"; ?>>
                                        <h2><?php echo str_replace(" ", "<br />", $member["name"]); ?> <span class="hidden-xs">></span></h2>
                                        <div class="separator"></div>
                                        <p><?php echo $member["title"]; ?></p>
                                    </div>
                                </div>
                        <?php $is_active = false; } 
                        } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden-xs">
                    <div class="row">
                        <?php 
                        $is_active = true;
                        if($team_members) {
                            foreach($team_members as $member) { ?>
                                <div class="col-xs-12 members <?php echo str_replace(" ", "_", strtolower($member["name"])); ?>"
                                    <?php echo ($is_active) ? "" : "style='display: none;'"; ?>>
                                    <img src="<?php echo $member["img"]; ?>" class="responsive-img">
                                    <div class="memberbubble">
                                        <p><?php echo $member["about"]; ?></p>
                                        <span class="memberbubble-triangle"></span>
                                    </div>
                                </div>
                        <?php $is_active = false; } 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg330"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Our Investors</h1>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <?php echo $page_meta['_about_inv_content'][0];  ?>
                    <div class="hidden-lg hidden-md inv-img-mob">
                        <img src="<?php echo $page_meta['_about_inv_img'][0]; ?>" class="responsive-img">
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs inv-img">
                    <img src="<?php echo $page_meta['_about_inv_img'][0]; ?>" class="responsive-img">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Opportunities</h1>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $page_meta['_about_opp_content'][0];  ?>
                    <h2><a href="<?php echo get_the_permalink($page_meta['_about_opp_link'][0]);  ?>">Find our more > </a></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg230"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Social Responsibility</h1>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <?php echo $page_meta['_about_sr_content'][0];  ?>
                    <div class="hidden-lg hidden-md sr-img-mob">
                        <img src="<?php echo $page_meta['_about_sr_img'][0]; ?>" class="responsive-img">
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs sr-img">
                    <img src="<?php echo $page_meta['_about_sr_img'][0]; ?>" class="responsive-img">
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>