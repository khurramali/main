<?php

add_action('admin_menu', 'campaign_settings');
function campaign_settings() {
    add_menu_page('Campaign Settings', 'Campaign Settings', 
                        'manage_options', 'campaign_settings', 'campaign_settings_call'
                        , '', 99);
}

function campaign_settings_call() { ?>
    <table class="cbi_width100" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h2>Campaign Settings</h2></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
    <?php
        if (!current_user_can('manage_options'))  {
            wp_die( __('You do not have sufficient permissions to access this page.') );
        }
        cbi_theme_options();
        cbi_survey_options();
        cbi_export_options();
}

add_action('admin_menu', 'campaign_sub_settings');
function campaign_sub_settings() {
    add_submenu_page('campaign_settings', 'Homepage', 'Homepage', 
                        'manage_options', 'campaign_homepage', 'campaign_homepage_settings');
    add_submenu_page('campaign_settings', 'Category', 'Category', 
                        'manage_options', 'campaign_category', 'campaign_category_settings');
    add_submenu_page('campaign_settings', 'Sub Category', 'Sub Category', 
                        'manage_options', 'campaign_sub_category', 'campaign_sub_category_settings');
}

function campaign_homepage_settings() { ?>
    <table class="cbi_width100" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h2>Homepage Settings</h2></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
    <?php
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    tgbd_homepage_options();
}

function campaign_category_settings() {
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    cbi_category_options();
}

function campaign_sub_category_settings() {
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    cbi_sub_category_options();
}


function cbi_theme_options() {
    if(isset($_POST['cbi_subnav'])) {
        update_option('_cbi_subnav', $_POST['cbi_subnav'][0]);
        $cbi_nav = get_option('_cbi_subnav');
    } else {
        $cbi_nav = (get_option('_cbi_subnav')) ? get_option('_cbi_subnav') : 'off';
    }
    
    $checkbox_status = ($cbi_nav == 'on') ? "checked=checked" : "";
    ?>
    <form method="post" enctype="multipart/form-data" action="">
        <table class="cbi_width100" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="3"><h3>Menu Settings</h3></td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hr"></td>
                </tr>
                <tr>
                    <td class="cbi_width25 cbi_texttop">
                        <label>Show sub menu items on header nav?</label>
                    </td>
                    <td class="cbi_width5 cbi_texttop">
                        <input type="checkbox" name="cbi_subnav[]" <?php echo $checkbox_status; ?> />
                        <input type="hidden" name="cbi_subnav[]" value=""<?php echo $cbi_nav; ?> />
                    </td>
                    <td class="cbi_width70 cbi_texttop"></td>
                </tr>
                <tr>
                    <td class="cbi_width15 cbi_texttop"></td>
                    <td class="cbi_width15 cbi_texttop">
                        <p class="submit">
                            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
                        </p>
                    </td>
                    <td class="cbi_width70 cbi_texttop"></td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hr"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
}

function cbi_survey_options() {
    if(isset($_POST['cbi_survey'])) {
        update_option('_cbi_survey', json_encode($_POST['cbi_survey']));
        $current_options = json_decode(get_option('_cbi_survey'));
    } else {
        $current_options = (get_option('_cbi_survey')) ? json_decode(get_option('_cbi_survey')) : null;
    }
    
    $survey['status'] = ($current_options->status != null) ? $current_options->status : "off";
    $cbi_survey_status = ($survey['status'] == 'on') ? "checked=checked" : "";
    
    $survey_question = ($current_options != null) ? $current_options->quest : "";
    $survey_answers = ($current_options != null) ? $current_options->ans : null;
    ?>
    <form method="post" id="survey_form" enctype="multipart/form-data" action="">
        <table class="cbi_width100" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="3">
                        <h3>Survey Settings</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hr"></td>
                </tr>
                <tr>
                    <td class="cbi_width10 cbi_texttop">Show/Hide Survey</td>
                    <td class="cbi_width10 cbi_texttop">
                        <input type="checkbox" name="cbi_survey[status]" id="cbi_survey_status" class="showIt" data-tableId="survey_data" <?php echo $cbi_survey_status; ?> />
                    </td>
                    <td class="cbi_width35 cbi_texttop"></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
        </table>
        <table class="cbi_width100" id="survey_data" <?php echo ($survey['status'] == "off") ? "style='display: none;'" : ""; ?> cellpadding="0" cellspacing="0">
                <tr>
                    <td class="cbi_width15 cbi_texttop">Question</td>
                    <td class="cbi_width50 cbi_texttop">
                        <input type="text" name="cbi_survey[quest]" id="cbi_survey[quest]" class="cbi_width95 cbi_field" value="<?php echo $survey_question; ?>" />  
                    </td>
                    <td class="cbi_width35 cbi_texttop"></td>
                </tr>
                <?php if($survey_answers != null) { 
                    $total_ans = 1; ?>
                    <?php foreach ($survey_answers as $ans) { ?>
                        <tr id='row-num-<?php echo $total_ans; ?>' >
                            <td class="cbi_width15 cbi_texttop"><?php echo ($total_ans == 1) ?  "Answers" : ""; ?></td>
                            <td class="cbi_width50 cbi_texttop">
                                <input type="text" name="cbi_survey[ans][]" id="cbi_survey[ans][]" class="cbi_width95 cbi_field" value="<?php echo $ans; ?>" />  
                                <?php if($total_ans > 1) { ?>
                                    <a href='#' class='rem_row'>X</a>
                                <?php } ?>
                            </td>
                            <td class="cbi_width35 cbi_texttop"></td>
                        </tr>
                    <?php
                        $total_ans++;
                        } ?>
                <?php } else { ?>
                    <tr id='row-num-1'>
                        <td class="cbi_width15 cbi_texttop">Answers</td>
                        <td class="cbi_width50 cbi_texttop">
                            <input type="text" name="cbi_survey[ans][]" id="cbi_survey[ans][]" class="cbi_width95 cbi_field" value="" />  
                        </td>
                        <td class="cbi_width35 cbi_texttop"></td>
                    </tr>
                <?php } ?>
                <tr class='end-row'>
                    <td class="cbi_width15 cbi_texttop"></td>
                    <td class="cbi_width15 cbi_texttop">
                        <p class="submit">  
                            <input type="button" class="button-primary add-more" value="<?php _e('Add Answer') ?>" />  
                        </p>
                    </td>
                    <td class="cbi_width70 cbi_texttop"></td>
                </tr>
        </table>
        <table class="cbi_width100" cellpadding="0" cellspacing="0">
                <tr><td class="cbi_width15 cbi_texttop"></td>
                    <td class="cbi_width15 cbi_texttop">
                        <p class="submit">  
                            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
                    </td>
                    <td class="cbi_width70 cbi_texttop"></td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hr"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
}

function get_cbi_posts_by_category($cat_type = "all") {
    $post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');
    $args=array( 'post_type' => $post_types,
                 'post_status'     => 'publish',
                'posts_per_page' => -1);
    if($cat_type != "all") {
        $args['category_name'] =  $cat_type;
    }
    
    $cbi_posts = get_posts($args);
    return $cbi_posts;
} ?>