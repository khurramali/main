<?php

function cbi_store_data() {
    $nonce = $_POST['nonce'];
    if (!wp_verify_nonce($nonce, 'nonce'))
            die ( 'Busted!');
    
   $content_type = $_POST['ctype'];
    $user['id'] = (isset($_POST['id'])) ? $_POST['id'] : '0';
    $user['name'] = $_POST['name'];
    $user['email'] = $_POST['email'];
    
    if(isset($_POST['ans'])) {
        $user['ans'] = $_POST['ans'];
        $message = "Thank you for joining the debate.";
    }
    if(isset($_POST['agree'])) { 
        $user['agree'] = $_POST['agree'];
        $message = "Thank you for subscribing with our newsletter.";
    }
    if(isset($_POST['message'])) { 
        $user['msg'] = strip_tags($_POST['message'], '<br /><a>');
        $message = $user['name'] . "  <" . $user['email'] . "><br />" . $user['msg'];
        wp_mail(get_settings('admin_email'), "Contact Us Email.", $message);
        $message = "Thank you for contacting us. We'll get back to you soon.";
    }
    
    $content_meta = json_encode($user);
    $content = array('post_type'=>$content_type, 'post_content'=>$user['msg'], 'post_status'=>'publish');
    //insert comments post to DB
    $content_id = wp_insert_post($content);
    //populate comment post meta
    add_post_meta($content_id, $content_type.'_meta', $content_meta);

    echo $message;
    die();
}
add_action('wp_ajax_cbi_store_data', 'cbi_store_data');
add_action('wp_ajax_nopriv_cbi_store_data', 'cbi_store_data');
?>