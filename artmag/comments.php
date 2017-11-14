<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not open this page directly.');

if (post_password_required())
	return;
?>
<div class="comments-post margint30">
	<div class="comments margint10 clearfix">
		<div class="comments-blog-post-top clearfix">
			<div class="com-title margint30">
				<div class="title margint10 marginb60 clearfix">
					<h1 id="comments">
						<?php comments_popup_link( __('NO COMMENT','artmag'), __('1 COMMENT','artmag'), __('% COMMENTS','artmag'), 'smooth', __('<h6>COMMENTS ARE OFF THIS POST</h6>','artmag')); ?>
					</h1>
					<div class="leave-reply-link"><?php if(comments_open() && !post_password_required()){ ?><a href="#respond" class="smooth"><?php echo esc_html__("Add Comment","artmag"); ?></a><?php } ?></div>
				</div>
			</div>
		</div>
		<ol class="comment-list clearfix">
			<?php wp_list_comments(
			array( 
			'callback' => 'artmag_fm_comment'
			)); ?>
		</ol>
		<?php if ( get_option( 'page_comments' ) && get_comment_pages_count() > 1 ) : ?>
		<div class="clearfix">
			<div class="nav-previous margint10 pull-left"><?php previous_comments_link( __( '&larr; Older Comments', 'artmag' ) ); ?></div>
			<div class="nav-next margint10 pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'artmag' ) ); ?></div>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php if(comments_open() && !post_password_required()){   ?>
<div class="comments-post margint30 clearfix">
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="no-comments"><?php __( 'Comments are closed.' , 'artmag' ); ?></p>
	<?php endif;  ?>
	<?php if ( comments_open() ) : ?>
	<div class="comment-styles">
		<div id="respond-wrap">
			<?php 
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				$fields =  array(
					'author' => '<div class="clearfix floatwrap margint10"><p class="comment-form-author pull-left"><input placeholder=" '. __("Name","artmag") . ( $req ? '*' : '' ) .' " id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email' => '<p class="comment-form-email pull-left"><input placeholder=" '. __("E-Mail","artmag"). ( $req ? '*' : '' ) .'" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p></div>',
					'url' => '<p class="comment-form-url"><label for="url"></label><input placeholder=" '. __("Web Site","artmag") .'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
				);
				$comments_args = array(
				    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				    'logged_in_as'		   => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'artmag' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				    'title_reply'          => '' ,
				    'title_reply_to'       => __( 'Leave a reply to %s', 'artmag' ),
				    'cancel_reply_link'    => __( 'Click here to cancel the reply', 'artmag' ),
				    'label_submit'         => __( 'Post comment', 'artmag' ),
				    'comment_field'		   => '<p class="comment-form-comment"><textarea placeholder=" '. __("Comment...","artmag") .'" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				    'must_log_in'		   => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'artmag' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
					'comment_notes_after'  => '',
					'label_submit'      	=> __('Submit Comment →','artmag'),
				);
			?>
			<?php comment_form($comments_args); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php } ?>
