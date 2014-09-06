<?php

add_action('admin_menu', 'tb_options');
function tb_options() {
    add_submenu_page('themes.php', 'Touchbase Options', 'Touchbase Options', 
                        'manage_options', 'tb_options', 'tb_options_call'
                        , '', 99);
}

function tb_options_call() { ?>
    <table class="tb_width100" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="2"><h1>Touchbase Options</h1></td>
            </tr>
            <tr>
                <td colspan="2"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
<?php
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    } 
    
    if(isset($_POST['tb_options'])) {
        update_option('tb_options', json_encode($_POST['tb_options']));
        $current_options = json_decode(get_option('tb_options'));
    } else {
        $current_options = (get_option('tb_options')) ? json_decode(get_option('tb_options')) : null;
    }
?>
            
    <form method="post" id="tb_options" enctype="multipart/form-data" action="">
        <table class="tb_width100" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td colspan="2"><h2>Footer Links</h2></td>
            </tr>
            <tr>
                <td colspan="2"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Call Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[call]" value="<?php echo $current_options->call; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Video Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[video]" value="<?php echo $current_options->video; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Mail Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[mail]" value="<?php echo $current_options->mail; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Chat Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[chat]" value="<?php echo $current_options->chat; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>LinkedIn Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[linkedin]" value="<?php echo $current_options->linkedin; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Twitter Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[twitter]" value="<?php echo $current_options->twitter; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>GooglePlus Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[google]" value="<?php echo $current_options->google; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Facebook Link</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[facebook]" value="<?php echo $current_options->facebook; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td class="tb_width10 tb_texttop">
                    <label>Client Login</label>
                </td>
                <td class="tb_texttop">
                    <input type="text" name="tb_options[client_login]" value="<?php echo $current_options->client_login; ?>" class="tb_width70 tb_field"/>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr class="hr"></td>
            </tr>
            <tr>
                <td colspan="2" class="cbi_width15 cbi_texttop">        
                    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php
}
?>