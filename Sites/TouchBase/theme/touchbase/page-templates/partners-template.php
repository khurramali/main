<?php
/*
  Template Name: Template - Partners
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-partners'); ?>
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

<div class="expanded-bg650"></div>
<div class="container">
    <div class="row content-wrapper awards">
        <?php            
        for($awards=1; $awards <= 5; $awards++) { ?>
            <div class="col-sm-2<?php echo ($awards==1) ? ' col-lg-offset-1' : ''; ?>
                 <?php echo ($awards>=4) ? ' col-xs-6' : ' col-xs-4'; ?>"
                <?php if($awards >=4) echo "style='text-align: center;'"; ?>>
                <img src="<?php echo $page_meta['_partners_aw_img_'.$awards][0]; ?>" 
                    class="responsive-img<?php if($awards == 4) echo ' award-img-4'; elseif($awards == 5) echo ' award-img-5'; ?>">
            </div>
        <?php } ?>
    </div>
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1 partner_spec">
            <h1>Our Cisco Partnership</h1>
            <p><?php echo $page_meta['_partners_intro_content'][0];  ?></p>
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <?php echo $page_meta['_partners_intro_spec_1'][0];  ?>
                </div>
                <div class="col-sm-5 col-xs-12 mob-space">
                    <?php echo $page_meta['_partners_intro_spec_2'][0];  ?>
                </div>
                <div class="col-sm-2 hidden-xs">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1 partner_awards">
            <h1>Our Awards</h1>
            <p><?php echo $page_meta['_partners_our_awards'][0];  ?></p>
            <div class="row">
                <div class="col-sm-6"><?php echo $page_meta['_partners_our_awards_list1'][0];  ?></div>
                <div class="col-sm-6"><?php echo $page_meta['_partners_our_awards_list2'][0];  ?></div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg230"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Eco-System Partners</h1>
            <p><?php echo $page_meta['_partners_eco_partners'][0];  ?></p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper mob_client_slider">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row" id="partner_slider">
                <?php $partners = get_post_meta(get_the_ID(), '_partners_partner', true); 
                foreach($partners as $partner) {
                    echo "<div class='col-sm-2 slide'>" 
                    . "<a href='". $partner['link'] ."' target='_blank'>"
                    . "<img src='". $partner['logo'] ."' /></a>"
                    . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>