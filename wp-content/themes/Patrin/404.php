<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

	<div id="primary" class="content-area grid_9 equal_height">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">متاسفیم! چنین صفحه ای نداریم.</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>شما آدرس را به اشتباه تایپ کرده اید و یا صفحه ی مورد نظر شما منتقل و یا حذف شده است.</p>
               	 	<h3>لطفا اقدامات زیر را انجام دهید</h3>
                	<p>آدرس را دوباره چک کرده و پس از تصحیح صفحه را رفرش کنید و یا از طریق کادر جستجوی زیر به دنبال هدفتان بروید</p>
                	
					
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
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>