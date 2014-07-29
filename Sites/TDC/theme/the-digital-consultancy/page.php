<?php 
get_header(); 
the_post();
?>
<div class="shell">
	<?php get_sidebar(); ?>

	<div class="content-wrapper">
		<div class="content">
			<div class="content-inner">
				<?php 
				tdc_social_sharing_buttons();

				tdc_title_area();
				the_content(); 
                                
                                $link = carbon_get_post_meta(get_the_ID(), 'page_link');
                                if(!empty($link)) { ?>
                                <p class="page-links">
                                    <?php $link_title = carbon_get_post_meta(get_the_ID(), 'page_link_title');
                                        $link_title = (!empty($link_title)) ? $link_title : 'DOWNLOAD LINK';
                                    ?>
                                    <a href="<?php echo $link; ?>"><?php echo $link_title; ?><span class="arr"></span></a>
                                </p>
                                <?php }

				tdc_social_sharing_buttons(); 
				?>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>