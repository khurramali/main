<?php wp_enqueue_script('cbi-contact'); ?>

<div class="row article hero" style="position: relative;">

	<img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />        
    
	<div class="col-sm-7 omega alpha contact-map" style="height:400px;">
    	<a href="https://www.google.co.uk/maps/search/cbi/@51.5114912,-0.0909127,16z" target="_blank"><img class="img-responsive" src="<?php bloginfo('template_directory');?>/assets/img/mP.png" alt="CBI Map" /></a>
    </div>
	<div style="background:black;color: white; height:400px;padding:20px;" class="col-sm-5 contact-details">
        <h2>Where to find us:</h2>
        <p><a href="https://www.google.co.uk/maps/search/cbi/@51.5114912,-0.0909127,16z" target="_blank">78 Cannon Street<br />
        London<br />
        <span class="caps">EC4N</span> <span class="caps">6AP</span></a></p>
        <p>T: <a href="tel:+442073797400">+44 20 7379 7400</a><br />
        E: <a href="mailto:info@tgbd.co.uk">info@tgbd.co.uk</a>
    </div>
    
    <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                
</div>

<div class="row article">

    <div class="col-sm-10 col-sm-offset-1 beta delta" style="margin-top: 20px;">
        <form role="form" id="cbi_contactus" style="margin: 0 auto;">
            <p>FOR MORE INFORMATION PLEASE ENTER FIELDS BELOW</p>
            <?php if ( is_user_logged_in() ) { ?>
                    <?php
                        $current_user = wp_get_current_user();
                    ?>
                    <input type="text" name="name" required="true" value="<?php echo $current_user->display_name; ?>" class="form-control">
                    <input type="email" name="email" required="true" value="<?php echo $current_user->user_email; ?>" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $current_user->ID; ?>" class="form-control">
            <?php } else { ?> 
                <div class="required-field-block">
                    <input type="text" placeholder="Name*" name="name" required="true" class="form-control">
                </div>

                <div class="required-field-block">
                    <input type="email" placeholder="Email*" name="email" required="true" class="form-control">
                </div>
            <?php } ?>
            <div class="required-field-block">
                <textarea rows="3" class="form-control" name="message" required="true" placeholder="Message*"></textarea>
            </div>
            <button class="btn btn-primary" style="width:100%;">SEND</button>
        </form>
        <div class="btn btn-success message" style="display: none;"></div>
    </div>

</div>