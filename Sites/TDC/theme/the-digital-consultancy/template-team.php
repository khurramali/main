<?php 
/*
Template Name: Team
*/
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

				if ($team = carbon_get_post_meta(get_the_ID(), 'team', 'complex')) {
                                    $num = 1; $section = 1;
					?>
                            
                                        <div class="members-list">
						<?php foreach ($team as $member): ?>
                                                    <?php $padd = ($num != 1) ? "member-padd" : ""; ?>
							<div class="member-sec <?php echo $padd; ?>" data-member="<?php echo $section; ?>">
								<div class="member-thumb">
									<?php if (!empty($member['image'])): ?>
										<img src="<?php echo tdc_get_timthumb($member['image'], 130, 100); ?>" alt="" />
									<?php endif ?>
									
								</div>
                                                                <h5><?php echo nl2br($member['name']); ?></h5>
                                                        </div>
                                                    <?php 
                                                        $num++; $section++;
                                                        $num = ($num == 4) ? 1 : $num; 
                                                    ?>
                                                <?php endforeach ?>
                                        </div>
                                        <?php $margin_head = ($section / 4) * 140; ?>
					<div class="members" style="margin-top: <?php echo $margin_head; ?>px">
                                                <?php $section = 1; ?>
						<?php foreach ($team as $member): ?>
							<div class="member member-<?php echo $section; ?>">
								<div class="member-img">
									<?php if (!empty($member['image'])): ?>
										<img src="<?php echo tdc_get_timthumb($member['image'], 194, 158); ?>" alt="" />
									<?php endif ?>
									
								</div>

								<div class="member-cnt">
									<h4><?php echo nl2br($member['name']); ?></h4>
									<?php echo wpautop($member['description']); ?>

									<?php if (!empty($member['email'])): ?>
										<a href="mailto:<?php echo $member['email']; ?>" class="mail"><?php echo $member['email']; ?></a>
									<?php endif ?>
									
									<?php if (!empty($member['bio_for_download']) || !empty($member['photo_for_download'])): ?>
										<p class="download-links">
											<?php if ( !empty($member['bio_for_download']) ): ?>
												<a href="<?php echo $member['bio_for_download']; ?>"><?php _e('DOWNLOAD FULL BIO'); ?><span class="arr"></span></a>
											<?php endif ?>
											<?php if (!empty($member['bio_for_download']) && !empty($member['photo_for_download'])): ?>
												<br />
											<?php endif; ?>
											<?php if ( !empty($member['photo_for_download']) ): ?>
												<a href="<?php echo $member['photo_for_download']; ?>"><?php _e('DOWNLOAD PHOTO'); ?><span class="arr"></span></a>
											<?php endif ?>
										</p>
									<?php endif ?>
								</div>

								<div class="cl">&nbsp;</div>
							</div>
                                                    <?php $section++; ?>
						<?php endforeach ?>
					</div>
					<!-- end of members -->
						
					<?php
				}
				?>
			</div>
		</div>
		<!-- end of content -->
	</div>

	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>