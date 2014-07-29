<?php
$current_post_type = get_post_type();
switch($current_post_type) {
    case 'case_study':
        get_template_part('templates/content', 'single_cs');
        break;
    case 'opinion':
        get_template_part('templates/content', 'single_opinion');
        break;
    case 'event':
        get_template_part('templates/content', 'single_event');
        break;
    case 'news_item':
        get_template_part('templates/content', 'single_news');
        break;
    case 'video':
        get_template_part('templates/content', 'single_video');
        break;
    case 'audio':
        get_template_part('templates/content', 'single_audio');
        break;
    case 'text_fact':
        get_template_part('templates/content', 'single_text');
        break;
    case 'graphic_fact':
        get_template_part('templates/content', 'single_graphic');
        break;
    case 'data_fact':
        get_template_part('templates/content', 'single_data');
        break;
    case 'factsheet_fact':
        get_template_part('templates/content', 'single_factsheet');
        break;
    case 'campaign_ad':
        get_template_part('templates/content', 'single_campaign_ad');
        break;
    default:
        get_template_part('templates/content', 'single');
        break;
}
?>