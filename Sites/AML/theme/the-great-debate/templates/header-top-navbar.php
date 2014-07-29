<?php wp_enqueue_script('cbi-nav'); ?>
<div class="container-fixed">
	<div class="row logo-fixed">
    	
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 center-block logo">
    	   <a href="/">
    	       <img src="<?php bloginfo('template_directory');?>/assets/img/tgbd_logo_156x77.png" class="img-responsive" alt="The Great Business Debate" />
    	   </a>
    	</div>
        
        <header class="banner navbar navbar-default navbar-static-top navbar-centered" role="banner">
            <div class="container">
            
  	<div class="row">
    		
        		<div class="col-sm-12 center-block tagline hidden-xs text-center">
                	<h2>What's the value of business to the UK?</h2>
                </div>
          
        	<div class="col-sm-10 col-sm-offset-1 omega alpha beta delta">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
            
                <nav class="collapse navbar-collapse" role="navigation">
                    <span class="logo-icon"></span>
                  <?php
                    $cbi_menu_status = (get_option('_cbi_subnav')) ? get_option('_cbi_subnav') : "off";
                    if (has_nav_menu('primary_navigation')) :
                        if($cbi_menu_status != "off") :
                            wp_nav_menu(array('theme_location' => 'primary_navigation',
                                'depth' => 0, 'menu_class' => 'nav navbar-nav', 
                                'walker' => new mainnav_walker()));

                        else:
                            wp_nav_menu(array('theme_location' => 'primary_navigation',
                                'depth' => 1, 'menu_class' => 'nav navbar-nav'));

                        endif;
                    endif;
                  ?>
                </nav>
  			</div>
        
    </div>
  
  </div>
</header>
    
 </div>
</div>