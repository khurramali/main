<?php wp_enqueue_script('cbi-carousel'); ?>
<?php $post_ids = array(1,2,3,4); 
    shuffle($post_ids);
    
    $total_slides = 4;
    $check['feature'] = FALSE;
    $check['video'] = FALSE;
    $homepage_option = json_decode(get_option('_cbi_homepage'));
    if($homepage_option) {
        if(isset($homepage_option->f_status)) {
            $check['feature'] = TRUE;
            $total_slides += 1;
        }
        if(isset($homepage_option->v_status)) {
            $check['video'] = TRUE;
            $total_slides += 1;
        }
    }
?>
<div class="row featured-carousel">
	<div class="col-lg-12 beta delta">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php for($slide=0; $slide < $total_slides; $slide++) { ?>
              <li data-target="#carousel-example-generic" data-slide-to="<?php echo $slide; ?>"
                  <?php echo ($slide == 0) ? "class='active'" : ""; ?>></li>
            <?php } ?>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            
            <?php if($check['feature']) { 
                $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $homepage_option->feature ), 'single-post-thumbnail' );
                $p_type = get_post_type( $homepage_option->feature );
                $p_title = get_the_title($homepage_option->feature);
                
                ?>
                    <div class="active item feature _<?php echo $p_type ?>">
                
                    <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />               
                    
                    <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                    
                    <img src="<?php echo (!empty($feature_img[0]) ? $feature_img[0] : bloginfo('template_directory')."/assets/img/carousel/carousel_default.jpg"); ?>" alt="<?php echo htmlentities(strip_tags($p_title), ENT_QUOTES, "UTF-8")?>" class="img-responsive">
                    
                    <div class="text">
                        <h2><?php echo $p_title ?></h2>
                        <span class="icon icon-<?php echo $p_type ?>"></span>
                    </div>
                                        
                    <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                
                    <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                
                </div>
            <?php } 
            if($check['video']) { ?>
                <div class="<?php echo (!$check['feature']) ? "active " : ""; ?>item video-slide">
                    <a class="various" href="<?php echo $homepage_option->video_url; ?>">
                        <span class="play"></span>
                
                        <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_video_142x400.png" alt="carousel mask" />               
                        
                        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                    
                        <?php
                        $post_image = ($homepage_option->video_poster != "") ? $homepage_option->video_poster 
                                : get_template_directory_uri()."/assets/img/carousel_mockup_campaign_video_800x400.jpg";
                        ?>
                        <img src="<?php echo $post_image; ?>" alt="" class="img-responsive">
                                   
                        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_video_142x400.png" alt="carousel mask" /> 
       
                        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                    </a>
                </div>
            <?php } ?>
            
                <div class="<?php echo (!$check['feature'] && !$check['video']) ? "active " : ""; ?>item animate">
                    <a href="/category/money/">
                        <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />               
                        
                        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                        
                        <div class="text text-one left blue italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>Our economy depends on business.&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-two right orange italic">
                            <div class="text-center">
                                <p>
                                    <span class="left-quote">&ldquo;</span>But who benefits from business success?&rdquo;
                                </p>
                            </div>
                        </div>
                        <div class="text text-three top black upper">
                            <div class="text-center">
                                <p>Learn more about business making money <span class="gt-flash">&gt;</span></p>
                            </div>
                        </div>
                        
                        <img src="http://dummyimage.com/800x400/ccc/000000&text=Making+Money+Image" alt="Making Money" class="main img-responsive" />
                        
                        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                                       
                        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                    </a>
               </div>
            
                <div class="item animate">
                    <a href="/category/jobs/">
                        <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />               
                        
                        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                        
                        <div class="text text-one left blue italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>Business relies on its people for success.&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-two right orange italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>But are some people getting left behind?&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-three top black upper">
                            <div class="text-center">
                                <p>Learn more about business supporting jobs <span class="gt-flash">&gt;</span></p>
                            </div>
                        </div>
                        
                        <img src="http://dummyimage.com/800x400/ccc/000000&text=Supporting+Jobs+Image" alt="Supporting Jobs" class="main img-responsive" />
                        
                        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                                       
                        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                    </a>
               </div>
               
               <div class="item animate">
                    <a href="/category/customers/">
                        <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />               
                        
                        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                        
                        <div class="text text-one left blue italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>Trusted brands deliver what they promise.&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-two right orange italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>But would more regulation on businesses give me a better deal?&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-three top black upper">
                            <div class="text-center">
                                <p>Learn more about business serving customers <span class="gt-flash">&gt;</span></p>
                            </div>
                        </div>
                        
                        <img src="http://dummyimage.com/800x400/ccc/000000&text=Serving+Customers+Image" alt="" class="main img-responsive" />
                        
                        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                                       
                        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                    </a>
               </div>
               
               <div class="item animate">
                    <a href="/category/society/">
                        <img class="mask mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_75x400.png" alt="carousel mask" />               
                        
                        <img class="mask mobile mask-left" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_left_int_62x400.png" alt="carousel mask" />               
                        
                        <div class="text text-one left blue italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>Everyone likes to see British business doing well.&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-two right orange italic">
                            <div class="text-center">
                                <p><span class="left-quote">&ldquo;</span>But shouldn't we expect companies to give more back to society?&rdquo;</p>
                            </div>
                        </div>
                        <div class="text text-three top black upper">
                            <div class="text-center">
                                <p>Learn more about business strengthening society <span class="gt-flash">&gt;</span></p>
                            </div>
                        </div>
                        
                        <img src="http://dummyimage.com/800x400/ccc/000000&text=Strngthening+Society+Image" alt="" class="main img-responsive" />
                        
                        <img class="mask mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_75x400.png" alt="carousel mask" /> 
                                       
                        <img class="mask mobile mask-right" src="<?php bloginfo('template_directory');?>/assets/img/carousel/carousel_right_int_62x400.png" alt="carousel mask" /> 
                    </a>
               </div>
               
             </div>
        </div>
    </div>
</div>