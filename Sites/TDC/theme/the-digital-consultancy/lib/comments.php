<?php
# 
# Renders a single comments; Called for each comment
#
function theme_render_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-inner">
			<h5><?php comment_author_link() ?></h5>
		    <?php if ($comment->comment_approved == '0') : ?>
		        <p class="moderation-notice"><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
		    <?php endif; ?>
			<p class="date"><?php comment_date() ?> <?php comment_time() ?></p>
			<?php comment_text() ?>	
	        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		    <div class="cl">&nbsp;</div>
		</div>
	<?php
}

# 
# Restricts direct access to the comments.php and checks whether the comments are password protected.
# 
function theme_comments_restrict_access() {
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) {
		echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
		return false;
	}
	return true;
}

# 
# Renders all current comments
# 
function theme_comments_render_list($callback) {
	?>
	<?php if ( have_comments() ) : ?>
		<div class="comments-list" id="comments">
			<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>
			<div class="commentslist">
				<?php wp_list_comments('style=div&callback=' . $callback); ?>
			</div>
	
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<div class="navigation">
					<div class="alignleft"><?php previous_comments_link() ?></div>
					<div class="alignright"><?php next_comments_link() ?></div>
				</div>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<?php if ( comments_open() ) : ?>
		 <?php else : // comments are closed ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php
}

function theme_comments_render_form($arguments) {
	?>
	<div class="form-box comment-form-holder">
		<div class="bottom">
			<div class="top">
				<?php comment_form($arguments); ?>
			</div>
		</div>
	</div>
	<?php
	return false;
}
?>