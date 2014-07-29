<?php wp_enqueue_script('cbi-footer'); ?>
<footer class="content-info container omega alpha" role="contentinfo">
    
    <div class="row col-sm-offset-1 col-sm-10 omega alpha">
        	<hr class="dot-under" />
        </div>
    <div class="row quick-links">
    	<div class="col-lg-3 col-xs-4 center-block text-center">
        	<h3>Quick Links</h3>
        </div>
    </div>
    <div class="row">
    	
        <div class="col-sm-12 col-sm-offset-1 omega alpha">
        
            <nav class="navbar-collapse ql" role="navigation">
                <?php wp_nav_menu( array('menu' => 'Quick Links'
                                    , 'items_wrap' => '<ul id="menu-quick-links" class="%2$s">%3$s</ul>'
                                    , 'walker' => new quick_links_walker() )); ?>
              </nav>
        </div>
        
    </div>
    
    <div class="row">
    	<div class="col-12">
    	<?php //dynamic_sidebar('sidebar-footer'); ?>
    	<?php wp_nav_menu( array('menu' => 'Footer', 'items_wrap' => '<ul id="menu-footer" class="%2$s">%3$s</ul>')); ?>
        </div>
    </div>
 
</footer>


<div class="container-fixed">
	<div class="row footer-fixed">
    	<div class="container omega alpha">
        <div class="row col-sm-offset-1 col-sm-10 omega alpha">
        	<hr class="dot" />
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-sm-offset-1 col-xs-5">
                <a id="news-inline" href="#newsletter"><span class="icon icon-subscribe"></span> Subscribe</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-push-3 col-md-push-2 col-sm-push-2 col-xs-4 col-xs-push-3 text-right">
                <?php get_search_form(); ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-lg-pull-3 col-md-pull-4 col-sm-pull-4 col-xs-3 col-xs-pull-5">
                <a href="http://www.cbi.org.uk/" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/img/cbi_logo_75x26.png" class="img-responsive" alt="CBI" /></a>
            </div>
            </div>
        </div>
    </div>
</div>

<div style="display: none;">
    <div class="row article" id='newsletter'>
        <div class="beta delta news-pad">
            <form role="form" id="cbi_newsletter" style="margin: 0 auto;">
                <div class="col-sm-9 col-xs-10 omega alpha"><h3>Sign up to the great business debate newsletter</h3></div>
                <span class="icon icon-subscribe col-sm-3 col-xs-2 omega alpha text-right"></span>
                <div class="clearfix"></div>
                <?php if ( is_user_logged_in() ) { ?>
                        <?php
                            $current_user = wp_get_current_user();
                        ?>
                        <input type="text" name="name" value="<?php echo $current_user->display_name; ?>" class="form-control" required />
                        <input type="email" name="email"  value="<?php echo $current_user->user_email; ?>" class="form-control" required />
                        <input type="hidden" name="id" value="<?php echo $current_user->ID; ?>" class="form-control">
                <?php } else { ?> 
                    <div class="required-field-block">
                        <input type="text" placeholder="Full Name*" name="name" class="form-control" required />
                    </div>

                    <div class="required-field-block">
                        <input type="email" placeholder="Email*" name="email" class="form-control" required />
                    </div>
                <?php } ?>
                    <div class="required-field-block checkbox">
                        <input type='checkbox' name='agree' required /> <span style="color: #484848;font-size: 14px;">Accept Terms and Conditions</span>
                    </div>
                <button class="btn btn-primary" style="width:100%;">OK</button>
            </form>
            <div class="btn btn-success message" style="display: none;"></div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
