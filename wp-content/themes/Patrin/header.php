<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( 'صفحه %s' , max( $paged, $page ) );

	?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
<!--[if lte IE 7]><script>document.location = '<?php bloginfo('template_directory'); ?>/oldbrowser.html';</script><![endif]-->

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="page" class="hfeed site container_12">

<div class="topmenu">
	<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary' ,'menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>

</div>
<div id="reseller">
	<a href="<?php bloginfo('siteurl'); ?>/reseller/" title="اخذ نمایندگی فروش  محصولات نورافشانی نارگستر در استان قزوین">
		<img src="<?php echo get_template_directory_uri(); ?>/images/reseller.png" alt="پذیرش نمایندگی فروش محصولات نارگستر در استان قزوین مخصوص چهارشنبه سوری"/>
	</a>
</div>
<div id="main" class="site-main cf">
<?php get_sidebar(); ?>