<?php 

    $post_type = get_post_type(get_the_ID());
    $post_author = get_post_meta(get_the_ID(), '_'. $post_type .'_src', true);
?>

<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<?php if($post_author != "") { ?>
<p class="byline author vcard"><?php echo __('By', 'roots'); ?> 
    <!--<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
        <?php echo get_the_author(); ?></a></p>-->
        <?php echo $post_author; ?> </p>
<?php } else {
    echo "<p></p>";
} ?>
        
