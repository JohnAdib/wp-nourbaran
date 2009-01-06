<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to web2feel_comment() which is
 * located in the functions.php file.
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php comments_number('بدون ديدگاه', '1 ديدگاه', '% ديدگاه' );?> برای <?php the_title(); ?>
		</h2>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use web2feel_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define web2feel_comment() and that will be used instead.
				 * See web2feel_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'web2feel_comment' ) );
			?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( '&rarr; دیدگاه های قدیمی تر' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'دیدگاه های جدیدتر &larr;' ); ?></div>
		</nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments">دیدگاه بسته شده است.</p>
	<?php endif; ?>
		
	<div id="comment-form">
		<div id="respond" class="rounded">



			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>شما باید <a href="<?php echo wp_login_url( get_permalink() ); ?>"> وارد شوید </a> تا بتوانید دیدگاهی ارسال کنید.</p>
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if ( is_user_logged_in() ) : ?>

				<p>وارد شده با نام <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">بیرون رفتن &raquo;</a></p>

				<?php else : ?>
				<div class="col-right">
					<p class="comment-form-author">
						<label for="author">نام <small><?php if ($req) echo "(اجباری)"; ?></small></label>
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"  tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					</p>

					<p class="comment-form-email">
						<label for="email">رایانامه <small><?php if ($req) echo "(اجباری)"; ?></small></label>
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					</p>

					<p class="comment-form-url">
						<label for="url">وب سایت</label>
						<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
					</p>
				</div>

				<?php endif; ?>
				<div class="col-left">
					<p class="comment-form-comment">
						<label for="comment">دیدگاه شما</label>
						<textarea name="comment" id="comment" rows="8" tabindex="4"></textarea><br />
					</p>
				</div>
				<div class="form-submit">
				<input name="submit" type="submit" id="submit" tabindex="5" value="ثبت دیدگاه" />
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
				</div>

			</form>

			<?php endif; // If registration required and not logged in ?>
		</div>
	</div>
	
	
	
	
</div><!-- #comments .comments-area -->
