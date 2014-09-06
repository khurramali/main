<?php
/*
  Template Name: Template - Home Page
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-home'); ?>
<?php $page_meta = get_post_meta(get_the_ID()); ?>
<div class="container">
    <div class="row home-wrapper">
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



<div class="expanded-bg255"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-5 col-md-6 col-sm-12 hidden-lg hidden-md hidden-sm section-img">
            <img src="<?php echo $page_meta['_homepage_section_img'][0];  ?>" class="responsive-img" />
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-md-6 col-sm-12 approach-mob">
            <h1><?php echo $page_meta['_homepage_section_title'][0];  ?></h1>
            <?php echo $page_meta['_homepage_section_content'][0];  ?>
            <a href="<?php echo get_permalink($page_meta['_homepage_section_link'][0]);  ?>">Find out more > </a>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 hidden-xs section-img">
            <img src="<?php echo $page_meta['_homepage_section_img'][0];  ?>" class="responsive-img" />
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Technology</h1>
            <div class="row home-technology-wrapper">
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/Icon_Collaboration.png" class="responsive-img">
                    <h2>Collaboration</h2>
                    <p class="collaboration">Our Collaboration solution include: <span>IP Telephony</span>, 
                    <span>IM & Presence</span>, <span>Video</span>, <span>Web Conferencing</span> and
                    <span>Contact Centre</span>.</p>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/Icons_EnterpriseNetworking.png" class="responsive-img">
                    <h2>Enterprise Networking</h2>
                    <p class="e-networking">Our Enterprise Network solution include: <span>Switches</span>, 
                    <span>Routers</span>, <span>Wireless</span> and 
                    <span>Network Management</span>.</p>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/Icons_Security.png" class="responsive-img">
                    <h2>Security</h2>
                    <p class="security">Our Security solution include: <span>Network Security</span>, 
                    <span>Content Security</span> and <span>Policy & Management</span>.</p>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/Icons_Datacentre.png" class="responsive-img">
                    <h2>Data Centre</h2>
                    <p class="data-centre">Our Data Centre solution include: <span>Unified Fabric</span> and 
                    <span>Unified Compute</span>.</p>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/Icons_NetworkServices.png" class="responsive-img">
                    <h2>Network Services</h2>
                    <p class="n-services">Our Network Services solution include: <span>SIP Trunking</span> and  
                    <span>Next Generation WAN</span>.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="expanded-bg355"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1 speech-wrapper">
            <h1>Delivering Business Impact Impact Across Your Business</h1>
            <div class="row">
                    <?php 
                    $highlights = get_post_meta(get_the_ID(), '_homepage_highlight', true);
                    foreach($highlights as $highlight) { ?>    
                        <div class="col-sm-4 col-xs-12 mobile-margin">
                            <div class="speechbubble">
                                <h2><?php echo $highlight["type"]; ?></h2>
                                <p>" <?php echo $highlight["content"]; ?> "</p>
                                <div class="by"><?php echo $highlight["by"]; ?></div>
                            </div>
                            <span class="speechbubble-triangle"></span>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper mob_client_slider">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row" id="client_slider">
                <?php $clients = get_post_meta($page_meta['_homepage_client'][0], '_client_client', true); 
                foreach($clients as $client) {
                    echo "<div class='col-sm-2 slide'>" 
                    . "<a href='". $client['link'] ."' target='_blank'>"
                    . "<img src='". $client['logo'] ."' /></a>"
                    . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg410"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 supporting-map">
            <h1><?php echo $page_meta['_homepage_supporting_title'][0];  ?></h1>
            <?php echo $page_meta['_homepage_supporting_content'][0];  ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>