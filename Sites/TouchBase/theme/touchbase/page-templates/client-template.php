<?php
/*
  Template Name: Template - Client
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-client'); ?>
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
            <div class="row client-commits">
                <?php $commits = get_post_meta(get_the_ID(), '_client_commit', true); ?>
                <div class="col-sm-6">
                    <?php for($index=0; $index < 5; $index++) { ?>
                        <div class="row client-commit">
                            <div class="col-xs-1"><h2><?php echo $index+1; ?></h2></div>
                            <div class="col-xs-11"><p><?php echo $commits[$index]['content']; ?></p></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <?php for($index=5; $index < 10; $index++) { ?>
                        <div class="row client-commit">
                            <div class="col-xs-1"><h2><?php echo $index+1; ?></h2></div>
                            <div class="col-xs-11"><p><?php echo $commits[$index]['content']; ?></p></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden-sm hidden-xs expanded-bg255"></div>
<div class="hidden-lg hidden-md expanded-bg245"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1>Working With Touchbase</h1>
                    <p><?php echo $page_meta['_client_header'][0];  ?></p>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <a class="client_video_slider" 
                       href="<?php echo $page_meta['_client_link'][0];  ?>">
                        <img src="<?php echo $page_meta['_client_poster'][0];  ?>" class="img-responsive" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper mob_client_slider">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Some of Our Clients</h1>
            <div class="row" id="client_slider">
                <?php $clients = get_post_meta(get_the_ID(), '_client_client', true); 
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


<div class="expanded-bg750"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>What Our Clients Say</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row client_review" id="client_review">
                        <?php $reviews = get_post_meta(get_the_ID(), '_client_review', true);
                        $widths = array('col-sm-4', 'col-sm-8',
                                     'col-sm-12', 'col-sm-7', 'col-sm-5',);
                        $counter = 0; ?>
                        <div class="col-md-3">
                            <div class="row">
                            <?php for($index=0; $index < 2; $index++) { ?>
                                <div class="col-xs-12 item">
                                    <div class="clientbubble">
                                        <p>" <?php echo $reviews[$index]["content"]; ?> "</p>
                                        <div class="by"> - <?php echo $reviews[$index]["by"]; ?></div>
                                        <span class="clientbubble-triangle"></span>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                            <?php for($index=2; $index < 7; $index++) { ?>
                                <div class="<?php echo $widths[$counter++]; ?> item">
                                    <div class="clientbubble">
                                        <p>" <?php echo $reviews[$index]["content"]; ?> "</p>
                                        <div class="by"> - <?php echo $reviews[$index]["by"]; ?></div>
                                        <span class="clientbubble-triangle"></span>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row content-wrapper mob_client_slider">
        <div class="col-lg-10 col-lg-offset-1">            
            <h1>Client Videos</h1>
            <div class="row" id="client_video_slider">
                <?php $client_videos = get_post_meta(get_the_ID(), '_client_cl_video', true); 
                foreach($client_videos as $client_video) {
                    echo "<div class='col-sm-2 slide'>" 
                    . "<a class='client_video_slider' href='". $client_video['link'] ."' target='_blank'>"
                    . "<img src='". $client_video['logo'] ."' /></a>"
                    . "<h2>". $client_video['by'] ."</h2>"
                    . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>