<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title">یافت نشد!</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() ) : ?>

			<p>آماده انتشار اولین مطلب خود هستید؟ <a href="<?php admin_url( 'post-new.php' ) ?>" title="شروع کنید">شروع کنید</a>.</p>

		<?php elseif ( is_search() ) : ?>

			<p>متاسفیم، ولی نتیجه ای منطبق با عبارت جستجو شده یافت نشد. لطفا جستجو را با کلمات مناسب تری تکرار کنید</p>
		<?php else : ?>
			<p>ما نتوانستیم مطلب مورد نظر شما را بیابیم. شاید جستجو در وب سایت به کمک شما بیاید</p>

		<?php endif; ?>
				<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

				<div class="widget">
					<h2 class="widgettitle">موضوعات استفاده شده</h2>
					<ul>
					<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
					</ul>
				</div>

				<?php
				/* translators: %1$s: smilie */
				$archive_content = '<p>' . sprintf( 'از آرشیو ماهیانه استفاده کنید. %1$s' , convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
				?>
				
				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
