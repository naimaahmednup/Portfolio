<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trueman
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="post-comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<!-- title -->
		<div class="title">
			<div class="title_inner">
				<?php comments_number( esc_html__( 'No comments found', 'trueman' ), esc_html__( '1 Comment', 'trueman' ), esc_html__( '% Comments', 'trueman' ) ); ?>
			</div>
		</div>

		<!-- comments -->
		<div class="content-box">
			<ul class="comments">
				<?php
				wp_list_comments( array(
					'style'	  => 'ul',
					'avatar_size' => '80',
					'callback' => 'trueman_comment'
				) );
				?>
			</ul>
		</div>

		<?php
		the_comments_navigation( array(
			'screen_reader_text' => ' ',
			'prev_text' => esc_html__( 'Older comments', 'trueman' ),
			'next_text' => esc_html__( 'Newer comments', 'trueman' )
		) );

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'trueman' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

	<div class="form-comment <?php if ( comments_open() ) : ?>content-box<?php endif; ?>">
		<?php
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			$comment_args = array(
				'title_reply' => esc_html__( 'Write a comment', 'trueman' ),
				'title_reply_to' => esc_html__( 'Write a comment to %s', 'trueman' ),
				'cancel_reply_link' => esc_html__( 'Cancel Reply', 'trueman' ),
				'title_reply_before' => '<div id="reply-title" class="title comment-reply-title"><div class="title_inner">',
				'title_reply_after' => '</div></div>',
				'label_submit' => esc_html__( 'Comment', 'trueman' ),
				'comment_field' => '<div class="group-val ct-gr"><textarea placeholder="' . esc_attr__( 'Comment', 'trueman' ).'" id="comment" name="comment" aria-required="true" ></textarea></div>',
				'must_log_in' => '<p class="must-log-in">' . esc_html__( 'You must be ', 'trueman' ) . '<a data-no-swup href="' . esc_url( wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '">' . esc_html__( 'logged in', 'trueman' ) . '</a>' . esc_html__( ' to post a comment.', 'trueman' ) . '</p>',
				'logged_in_as' => '<p class="logged-in-as">' . esc_html__( 'Logged in as ', 'trueman' ) . '<a data-no-swup href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html( $user_identity ) . '</a>' . esc_html__( '. ', 'trueman' ) . '<a data-no-swup href="' . esc_url( wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '" title="' . esc_attr__( 'Log out of this account', 'trueman' ) . '">' . esc_html__( 'Log out?', 'trueman' ) . '</a></p>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="group-val"><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'trueman' ) . '" value="" ' . $aria_req . ' /></div>',
					'email' => '<div class="group-val"><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'trueman' ) . '" value="" ' . $aria_req . ' /></div>',
				)),
				'class_submit' => 'trm-btn',
				'submit_field' => '<div class="trm-form-bottom">%1$s %2$s</div>',
				'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s<i class="fas fa-arrow-right"></i></button>'
			);

			comment_form( $comment_args );
		?>
	</div>

</div><!-- #comments -->
