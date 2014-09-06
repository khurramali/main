<?php
function tb_join_us() {
    $nonce = $_POST['nonce'];
    if (!wp_verify_nonce($nonce, 'nonce'))
            die ( 'Busted!');
    
    $user['name'] = $_POST['name'];
    $user['company'] = $_POST['company'];
    $user['email'] = $_POST['email'];
    $user['phone'] = $_POST['phone'];
    
    $message = "Name: " . $user['name'] . "<br />"
            .  "Company: " . $user['company'] . "<br />"
            .  "Email: " . $user['email'] . "<br />"
            .  "Phone: " . $user['phone'] . "<br />";
    $status = wp_mail(get_settings('admin_email'), "New Subscription: Touchbase.", $message);
    $message = "Thank you for joining us.";
    
    $content_type = 'subscription';
    $content_meta = json_encode($user);
    $content = array('post_type'=>$content_type, 'post_content'=>"New Subscription: Touchbase.", 'post_status'=>'publish');
    
    //insert comments post to DB
    $content_id = wp_insert_post($content);
    //populate comment post meta
    add_post_meta($content_id, $content_type.'_meta', $content_meta);
    
    echo $message;
    die();
}
add_action('wp_ajax_tb_join_us', 'tb_join_us');
add_action('wp_ajax_nopriv_tb_join_us', 'tb_join_us');
?>