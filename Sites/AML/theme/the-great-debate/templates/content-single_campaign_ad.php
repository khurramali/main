<?php

$template_type = $_REQUEST["format"];
$default = array("title" => "Join the debate spring 2014", 
        "link" => get_site_url());


$Pmeta = get_post_meta(get_the_ID());

/* Fields associated with campaign ads */
if($Pmeta["_campaign_ad_type"][0] == "default") {
    $default["title"] = ($Pmeta["_campaign_ad_default_title"][0]) ? get_the_title() : $default["title"];
} else if($Pmeta["_campaign_ad_type"][0] == "dropdown") {
    $default["title"] = ($Pmeta["_campaign_ad_dropdown_title"][0]) ? get_the_title($Pmeta["_campaign_ad_item"][0]) 
                        : $default["title"];
    $default["link"] = get_permalink($Pmeta["_campaign_ad_item"][0]);
} else {
    $template_body = $Pmeta["_campaign_ad_html"][0];
}

switch($template_type):
    case "leaderboard":
        echo "This is Leaderboard layout";
        break;
    
    case "mpu":
        echo "This is MPU layout";
        break;
    
    case "banner":
        echo "This is Banner layout";
        break;
    
    case "skyscraper":
        echo "This is Skyscraper layout";
        break;
    
    case "half-page":
        echo "This is Half-page layout";
        break;
    
    case "mobile":
        echo "This is Mobile layout";
        break;
    
    
endswitch;

?>