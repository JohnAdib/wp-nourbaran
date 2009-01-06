<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>

	</div><!-- #main .site-main -->
	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="fcred">
			تمام حقوق این وب سایت برای <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> محفوظ است. <?php echo the_time('Y');?>&copy;<br/>
			<a target="_blank" href="http://evazzadeh.com" title="با افتخار قدرت گرفته از وردپرس، توسعه توسط جواد عوض زاده">طراحی و اجرا</a> توسط <a target="_blank" href="https://ermile.com/fa" title="Ermile | ارمایل" >ارمایل</a>
			
			</div>		
	</footer><!-- #colophon .site-footer -->

</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
<?php if(is_user_logged_in()) { ?>
<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/images/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت" ></a>
<?php } ?>
</body>
</html>