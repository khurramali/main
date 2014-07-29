<?php
    
    $latest_ad = get_posts(array('post_type' => 'campaign_ad', 'posts_per_page' => 1));
    get_permalink($latest_ad[0]->ID);
    $iframe_href = get_permalink($latest_ad[0]->ID) . "?format=";
    wp_reset_query(); 
?>

<iframe src="<?php echo $iframe_href . "leaderboard"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "leaderboard"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>

<iframe src="<?php echo $iframe_href . "mpu"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "mpu"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>

<iframe src="<?php echo $iframe_href . "banner"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "banner"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>

<iframe src="<?php echo $iframe_href . "skyscraper"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "skyscraper"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>

<iframe src="<?php echo $iframe_href . "half-page"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "half-page"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>

<iframe src="<?php echo $iframe_href . "mobile"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<br />
<textarea style="height: 30px; width: 100%; margin: 2px;" onclick="this.focus(); this.select();" rows="2">
<iframe src="<?php echo $iframe_href . "mobile"; ?>" width="728" height="90" 
        seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</textarea>