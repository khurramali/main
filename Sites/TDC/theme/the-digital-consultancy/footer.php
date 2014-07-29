					</div>
					<!-- end of main -->
				</div>
				<!-- end of main-holder -->
			</div>
			<!-- end of ajax-holder -->
		</div>
		<!-- end of ajax -->

		<div id="footer-push"></div>
		<!-- end of footer-push -->
	</div>
	<!-- end of wrapper -->

	<div id="footer">
		<div class="shell">
			<ul>
				<?php if ($mail_user = carbon_get_theme_option('mail_user')): ?>
					<li><span class="m-ico"></span><a href="mailto:<?php echo $mail_user; ?>"><?php echo $mail_user; ?></a></li>
				<?php endif ?>
				<?php if ($stat_phone = carbon_get_theme_option('stationary_phone')): ?>
					<li><span class="t-ico"></span><a href="tel:<?php echo $stat_phone; ?>"><?php echo $stat_phone; ?></a></li>
				<?php endif ?>
				<?php if ($twitter_username = carbon_get_theme_option('twitter_username')): ?>
					<li><span class="twitter-ico"></span><a target="_blank" href="http://twitter.com/<?php echo $twitter_username; ?>"><?php echo $twitter_username; ?></a></li>
				<?php endif ?>
                                <?php if (($download_file = carbon_get_theme_option('download_file')) && !empty($download_file)) : ?>
                                        <?php $download_title = carbon_get_theme_option('download_file_title');
                                            $download_title = (!empty($download_title)) ? $download_title : 'Download Link';
                                        ?>
					<li><span class="arr-ico-down"></span><a href="<?php echo $download_file; ?>" target="_blank"><?php echo $download_title; ?></a></li>
                                <?php elseif ($website = carbon_get_theme_option('general_website')) : ?>
					<li><span class="w-ico"></span><a href="<?php echo tdc_add_http_to_url($website); ?>" target="_blank"><?php echo tdc_remove_http_from_url($website); ?></a></li>
                                <?php endif ?>
				<?php if ($address = carbon_get_theme_option('general_address')): ?>
					<li><span class="arr-ico"></span><a href="<?php permapath('contact-us'); ?>"><?php echo $address; ?></a></li>
				<?php endif ?>
			</ul>
		</div>
	</div>
	<!-- end of footer -->
		<?php wp_footer(); ?>
	</body>
</html>