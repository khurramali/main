<?php

function cbi_export_options() {
    ?>
    <table class="cbi_width100" id="export_data" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h3>Data Export Options</h3></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="cbi_width25 cbi_texttop">
                    <label>Click to Export Contact Us Data:</label>
                </td>
                <td class="cbi_width5 cbi_texttop">
                    <input type="submit" value="Export now" data-type="contact" class="cbi_field button-primary export_data" />
                </td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="cbi_width25 cbi_texttop">
                    <label>Click to Export Newsletter Subscriptions:</label>
                </td>
                <td class="cbi_width5 cbi_texttop">
                    <input type="submit" value="Export now" data-type="newsletter" class="cbi_field button-primary export_data" />
                </td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="cbi_width25 cbi_texttop">
                    <label>Click to Export Survey Data:</label>
                </td>
                <td class="cbi_width5 cbi_texttop">
                    <input type="submit" value="Export now" data-type="survey" class="cbi_field button-primary export_data" />
                </td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="cbi_width25 cbi_texttop">
                    <label>Click to Export User Comments:</label>
                </td>
                <td class="cbi_width5 cbi_texttop">
                    <input type="submit" value="Export now" data-type="comment" class="cbi_field button-primary export_data" />
                </td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr><!--
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="cbi_width25 cbi_texttop">
                    <label>Click to Export Survey Response Data:</label>
                </td>
                <td class="cbi_width5 cbi_texttop">
                    <input type="submit" value="Export now" data-type="survey-data" class="cbi_field export_data" />
                </td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr>-->
        </tbody>
    </table>
    <?php    
}

function export_to_file() {
    if($_POST) {
        $post_type = $_POST['type'];
        $dir = TEMPLATEPATH . '/exports/';
        if (!file_exists($dir)) { mkdir($dir, 0777); }
        
        $dir = $dir . $post_type . '.csv';
        
        if($post_type == 'contact') {
            $args = array('ID', 'Name', 'Email', 'Message');
            generate_csv($dir, $post_type, $args);
            $file_url = get_template_directory_uri() . '/exports/contact.csv';
        }
        
        if($post_type == 'newsletter') {
            $args = array('ID', 'Name', 'Email', 'Terms');
            generate_csv($dir, $post_type, $args);
            $file_url = get_template_directory_uri() . '/exports/newsletter.csv';
        }
        
        if($post_type == 'survey') {
            $args = array('ID', 'Name', 'Email', 'Answer');
            generate_csv($dir, $post_type, $args);
            $file_url = get_template_directory_uri() . '/exports/survey.csv';
        }
        
        if($post_type == 'comment') {
            generate_comment_csv($dir);
            $file_url = get_template_directory_uri() . '/exports/comment.csv';
        }
        
        echo json_encode($file_url);
    }
    die();
}
add_action('wp_ajax_export_to_file', 'export_to_file');
add_action('wp_ajax_nopriv_export_to_file', 'export_to_file');

function generate_csv($path, $post_type, $args) {
    if ($handle = fopen($path, 'w+')):
        // Write the spreadsheet column titles / labels
        fputcsv($handle, $args);
        $result = new WP_Query(array('post_type' => array($post_type)));
        if ($result->have_posts()):
            while ($result->have_posts()): $result->the_post(); 
                $result_meta = json_decode(get_post_meta(get_the_ID(), $post_type.'_meta', true));
                
                if($post_type == 'contact') {
                    fputcsv($handle, array($result_meta->id, $result_meta->name, 
                        $result_meta->email, $result_meta->msg));
                }
                
                if($post_type == 'newsletter') {
                    $terms_status = ($result_meta->agree == 'on') ? 'Agreed' : $result_meta->agree;
                    fputcsv($handle, array($result_meta->id, $result_meta->name, 
                        $result_meta->email, $terms_status));
                }
                
                if($post_type == 'survey') {
                    fputcsv($handle, array($result_meta->id, $result_meta->name, 
                        $result_meta->email, $result_meta->ans));
                }
            endwhile;
        endif;
        wp_reset_query();
        fclose($handle);
    endif;
}

function generate_comment_csv($path) {
    if ($handle = fopen($path, 'w+')):
        $args = array('UserID', 'User Name', 'User Email', 'Comment', 'On Post', 'Date');
        // Write the spreadsheet column titles / labels
        fputcsv($handle, $args);
        $comment_list  = get_comments();
        foreach($comment_list as $comment):
            fputcsv($handle, array($comment->user_id, $comment->comment_author,
                            $comment->comment_author_email, $comment->comment_content,
                            get_the_title($comment->comment_post_ID), $comment->comment_date));
        endforeach;
        fclose($handle);
    endif;
}

?>