<?php wp_enqueue_script('tb-archive'); ?>
<div class="col-md-3 col-sm-4 col-xs-8 hide-mobile">
    <h2>Archive</h2>
    <?php get_archive_by_year(); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="twitter-feed">
                <h2>Twitter Feed</h2>
                <p>
                <?php 
                    $feed = new twitterFeed();
                    $feed->get_twitter_feed("touchbaseuk", 1);
                    
                ?></p>
            </div>
            <span class="memberbubble-triangle"></span>
        </div>            
    </div>
    <div class="row"><div class="col-xs-12"><?php //wp_list_categories(array('title_li' => '<h2>Categories</h2>')); ?> </div></div>
</div>