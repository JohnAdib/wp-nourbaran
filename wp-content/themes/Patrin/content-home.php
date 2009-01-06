<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-box grid_3'); ?>>
			
			<?php
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 255, 255, true ); //resize & crop the image
			?>
								
			<a href="#" class="hoverblock">	
			<?php if($image) : ?>   <img class="portpic" src="<?php echo $image ?>" alt=""/> <?php endif; ?>
			</a>
			<div class="cover">
				<div class="coverinfo">
				<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'درباره %s بیشتر بدانید', the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="product-detail-home">
					<table class="hovertable">
					
						<?php $tmp = SmartMetaBox::get('tol'); if ( !empty( $tmp ) ) print "
						<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='transparent';\">
							<th>طول</th><td>$tmp</td>
						</tr>"; ?>

						<?php $tmp = SmartMetaBox::get('kalibr'); if ( !empty( $tmp ) ) print "
						<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='transparent';\">
							<th>کالیبر</th><td>$tmp</td>
						</tr>"; ?>


						<?php $tmp = SmartMetaBox::get('vasileshelik'); if ( !empty( $tmp ) ) print "
						<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='transparent';\">
							<th>وسیله شلیک</th><td>$tmp</td>
						</tr>"; ?>

						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='transparent';">
							<?php 
								$options = array('','ارتفاع پرواز', 'ارتفاع پرتاب', 'ارتفاع فوران','شعاع چرخش');
								$tmp = SmartMetaBox::get('ertefaModel'); if ( !empty( $tmp ) ) echo '<th>'.$options[$tmp].'</th>' ;
								$tmp = SmartMetaBox::get('ertefaValue'); if ( !empty( $tmp ) ) echo '<td>'.$tmp.'</td>' ;
							?>
						</tr>
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='transparent';">
							<?php 
								$options = array( '','زمان نورافشانی','شعاع نورافشانی');
								$tmp = SmartMetaBox::get('nourModel'); if ( !empty( $tmp ) ) echo '<th>'.$options[$tmp].'</th>' ;
								$tmp = SmartMetaBox::get('nourValue'); if ( !empty( $tmp ) ) echo '<td>'.$tmp.'</td>' ;
							?>
						</tr>

						<?php $tmp = SmartMetaBox::get('price'); if ( !empty( $tmp ) ) print "
						<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">
							<th>قیمت</th><td>$tmp</td>
						</tr>"; ?>
					</table>
					<a target="_blank" href="/contact/" title="<?php echo esc_attr( sprintf( 'برای سفارش خرید %s کلیک کنید', the_title_attribute( 'echo=0' ) ) ); ?>" class="btn-wrap">
						<span class="title">خرید</span>
						
						<div class="info">
							<p>
								<strong>تلفن تماس</strong>
								<span>02813338780</span>
							</p>
						</div>
					</a>					
				</div>
				
				</div>
			</div>	
</article>
					
