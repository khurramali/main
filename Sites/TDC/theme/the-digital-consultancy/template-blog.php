<?php 
/*
Template Name: Blog
*/
get_header(); 
the_post();
?>
<div class="shell">
	<?php get_sidebar(); ?>

	<div class="content-wrapper">
            <div class="content">
                <div class="content-inner">
                    <!--<a data-flip-widget="flipit" href="https://flipboard.com">Add to Flipboard Magazine.</a><script src="https://cdn.flipboard.com/web/buttons/js/flbuttons.min.js" type="text/javascript"></script>-->
                    <iframe src="https://flipboard.com/section/digital-digest-bCed4H" frameborder="0"
                            height="260px" width="100%"></iframe>
                </div>
                <div class="content-inner" style="height: 360px; width: 33%; float: left;">
                    <a class="twitter-timeline" height="360" width="33%" href="https://twitter.com/dconsultancy" data-widget-id="487552558982914048" data-chrome="nofooter"></a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="content-inner" style="height: 360px; width: 30%; padding-left: 0; float: left;">
                    <!-- SnapWidget -->
                    <iframe src="http://snapwidget.com/bd/?u=ZGlnaXRhbF9jb25zdWx0YW5jeXxpbnwyMDB8M3wzfHx5ZXN8MjB8bm9uZXxvblN0YXJ0fHllcw==&v=11714" title="Instagram Widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;"></iframe>
                </div>
                
            </div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>