        <div class="footer-bg"></div>
        <div class="container">
            <div class="row footer">
                <div class="col-lg-4 col-lg-offset-1 col-sm-5 col-xs-8">
                    <h1>Site Map</h1>
                    <?php
                      if (has_nav_menu('site-map')) :
                        wp_nav_menu(array('theme_location' => 'site-map', 
                            'menu_class' => 'site-map-menu'));
                      endif;
                    ?>
                </div>
                <div class="col-xs-4 hidden-lg hidden-md hidden-sm">
                    <h1>Contact</h1>
                    <div class="contact-add">
                        <p>
                            Touchbase<br />
                            <?php $page = get_page_by_title( 'Contact Us' ); ?>
                            <?php $address = get_post_meta($page->ID, '_contact_address', true); ?>
                            <?php $address_main = str_replace("<br />", "", $address[0]['full_add']); ?>
                            <?php echo str_replace(",", ",<br />", $address_main); ?>
                            <br /><br /><abbr title="Phone">Tel:</abbr> <?php echo $address[0]['tel']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12 social-items">
                    <h1>What Now?</h1>
                    <?php
                        $current_options = (get_option('tb_options')) ? json_decode(get_option('tb_options')) : null;
                    ?>
                    <div class="row what-now">
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="<?php echo $current_options->call; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Call.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="<?php echo $current_options->video; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Video.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="mailto: <?php echo $current_options->mail; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Email.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 social-icon hidden-xs"><a href="<?php echo $current_options->chat; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Chat.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="<?php echo $current_options->linkedin; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Linkedin.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="<?php echo $current_options->twitter; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Twitter.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 col-xs-2 social-icon"><a href="<?php echo $current_options->google; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_GooglePlus.png" class="responsive-img" /></a></div>
                        <div class="col-sm-3 social-icon hidden-xs"><a href="<?php echo $current_options->facebook; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Facebook.png" class="responsive-img" /></a></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"><a href="<?php echo $current_options->client_login; ?>" target="_blank" 
                                        class="btn btn-client"><div>Client Login</div></a></div>
                    </div>
                </div>
                <div class="col-sm-3 hidden-xs">
                    <h1>Contact</h1>
                    <div class="contact-add">
                        <p>
                            Touchbase<br />
                            <?php $page = get_page_by_title( 'Contact Us' ); ?>
                            <?php $address = get_post_meta($page->ID, '_contact_address', true); ?>
                            <?php $address_main = str_replace("<br />", "", $address[0]['full_add']); ?>
                            <?php echo str_replace(",", ",<br />", $address_main); ?>
                            <br /><br /><abbr title="Phone">Tel:</abbr> <?php echo $address[0]['tel']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
