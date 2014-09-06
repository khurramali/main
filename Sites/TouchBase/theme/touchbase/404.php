<?php get_header(); ?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-sm-10 col-sm-offset-1">
            <?php get_the_title();	?>
            <p><?php printf(__('Please check the URL for proper spelling and capitalization. %1$sIf you\'re having trouble locating a destination, try visiting the <a href="%2$s">home page</a>'), '<br />', home_url('/')); ?></p>
        </div>
    </div>
    <!-- end of content -->    
</div>
<?php get_footer(); ?>