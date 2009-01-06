<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features

 */

if ( ! function_exists( 'web2feel_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 */
function web2feel_content_nav( $nav_id ) {
	global $wp_query;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'web2feel' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'web2feel' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> صفحه بعد', 'web2feel' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'صفحه قبل <span class="meta-nav">&rarr;</span>', 'web2feel' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // web2feel_content_nav

if ( ! function_exists( 'web2feel_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since web2feel 1.0
 */
function web2feel_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>پینگ بک:<?php comment_author_link(); ?><?php edit_comment_link( '(ویرایش)' , ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="commentfoot">
				
				<div class="comment-author vcard">
					<?php echo(get_comment_author_link()); ?>
					در <?php echo(get_comment_date()); ?> ساعت <?php echo(get_comment_time()); ?> گفته:
					<?php edit_comment_link( '(ویرایش)', ' ' ); ?>
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em>دیدگاه شما در انتظار تایید مدیر است.</em>
					<?php endif; ?>
			
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					
				</div><!-- .comment-author .vcard -->
				


				
			</footer>
			<?php echo get_avatar( $comment, 64 ); ?>
			<div class="comment-content"><?php comment_text(); ?></div>
			

			<div class="space"></div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for web2feel_comment()


/**
 * Returns true if a blog has more than 1 category
 *
 * @since web2feel 1.0
 */
function web2feel_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so web2feel_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so web2feel_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in web2feel_categorized_blog
 *
 * @since web2feel 1.0
 */
function web2feel_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'web2feel_category_transient_flusher' );
add_action( 'save_post', 'web2feel_category_transient_flusher' );