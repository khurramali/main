<?php
if (function_exists('theme_comments_restrict_access') && theme_comments_restrict_access()) {

	theme_comments_render_list('theme_render_comment');

	theme_comments_render_form(array(
		'title_reply'=>'Post a Comment',
		'comment_field' => '<div class="field-row"><label for="comment">' . _x( 'Comment', 'noun' ) . ':<span>*</span></label><textarea id="comment" class="field" name="comment" cols="0" rows="0" aria-required="true"></textarea><div class="cl">&nbsp;</div></div>',
		'comment_notes_after' => '',
		'comment_notes_before' => '',
		'fields' => array(
			'author' => '<div class="field-row">' . '<label for="author">' . __( 'Name' ) . ':<span>*</span></label> ' .
			            '<input id="author" class="field" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><div class="cl">&nbsp;</div></div>',
			'email'  => '<div class="field-row"><label for="email">' . __( 'Email' ) . ':<span>*</span></label> ' . 
			            '<input id="email" class="field" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><div class="cl">&nbsp;</div></div>',
			'url'    => '<div class="field-row"><label for="url">' . __( 'Website' ) . ':</label>' .
			            '<input id="url" class="field" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><div class="cl">&nbsp;</div></div>',
		),
		'label_submit' => 'Post Comment'
	));
}
?>