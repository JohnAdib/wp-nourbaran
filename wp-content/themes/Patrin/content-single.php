<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php get_permalink() ?>" title="لینک مستقیم به <?php the_title(); ?>" ><?php the_title(); ?></a></h1>

	</header><!-- .entry-header -->

	<div id="product-detail">
		<table class="hovertable">
			<?php $tmp = SmartMetaBox::get('tol'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>طول</th><td>$tmp</td>
			</tr>"; ?>

			<?php $tmp = SmartMetaBox::get('kalibr'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>کالیبر</th><td>$tmp</td>
			</tr>"; ?>

			<?php $tmp = SmartMetaBox::get('vazntaki'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>وزن تکی</th><td>$tmp</td>
			</tr>"; ?>

			<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
				<?php 
					$tmp = SmartMetaBox::get('tedadejabe');
					if ( !empty( $tmp ) ) echo '<th>وزن جعبه <i>'.$tmp.'</i>تایی</th>' ; else echo '<th>وزن جعبه</th>';
					$tmp = SmartMetaBox::get('vaznjabe');
					if ( !empty( $tmp ) ) echo '<td>'.$tmp.'</td>' ; else echo '<td>---</td>';
				?>
			</tr>
			
			<?php $tmp = SmartMetaBox::get('vasileshelik'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>وسیله شلیک</th><td>$tmp</td>
			</tr>"; ?>
						
			<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
				<?php 
					$options = array('','ارتفاع پرواز', 'ارتفاع پرتاب', 'ارتفاع فوران','شعاع چرخش');
					$tmp = SmartMetaBox::get('ertefaModel'); if ( !empty( $tmp ) ) echo '<th>'.$options[$tmp].'</th>' ;
					$tmp = SmartMetaBox::get('ertefaValue'); if ( !empty( $tmp ) ) echo '<td>'.$tmp.'</td>' ;
				?>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
				<?php 
					$options = array( '','زمان نورافشانی','شعاع نورافشانی');
					$tmp = SmartMetaBox::get('nourModel'); if ( !empty( $tmp ) ) echo '<th>'.$options[$tmp].'</th>' ;
					$tmp = SmartMetaBox::get('nourValue'); if ( !empty( $tmp ) ) echo '<td>'.$tmp.'</td>' ;
				?>
			</tr>
			
			<?php $tmp = SmartMetaBox::get('rang'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>رنگ</th><td>$tmp</td>
			</tr>"; ?>

			<?php $tmp = SmartMetaBox::get('price'); if ( !empty( $tmp ) ) print "
			<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
				<th>قیمت</th><td>$tmp</td>
			</tr>"; ?>
		</table>
		
		<?php
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$image = aq_resize( $img_url, 255, 255, true ); //resize & crop the image 765,400 to 255,255
		?>

		<?php if($image) : ?><img class="portpic" src="<?php echo $image ?>" alt="<?php the_title(); ?>"/> <?php endif; ?>



	</div>
	<div class="myseperator"></div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'صفحه:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<div class="myseperator"></div>
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) { echo( 'کلیدواژه ها: '.$tag_list.'.' );  }
		?>

		<?php edit_post_link( 'ویرایش', '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
