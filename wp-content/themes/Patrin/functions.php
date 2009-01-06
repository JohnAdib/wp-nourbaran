<?php

include ( 'aq_resizer.php' );
include ( 'guide.php' );
include ( 'metabox_class.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since web2feel 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 700; /* pixels */

if ( ! function_exists( 'web2feel_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since web2feel 1.0
 */
function web2feel_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );


	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-background' );
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'web2feel' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */

}
endif; // web2feel_setup
add_action( 'after_setup_theme', 'web2feel_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since web2feel 1.0
 */
function web2feel_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'web2feel' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3> <div class="smartbox">',
	) );
}
add_action( 'widgets_init', 'web2feel_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function web2feel_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(),array(),'2.7','all' );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'web2feel_scripts' );

/* CUSTOM EXCERPTS */
	

function wpe_excerptlength_index($length) {
    return 50;
}


function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


// ------------------------------------------------------ add Custom Field to Admin Panel

	add_smart_meta_box('smart_meta_box_productdetail', array(
	'title'     => 'جزئیات محصول',
	'pages'		=> array('post'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(

	array(
	'name' => 'طول',
	'id' => 'tol',
	'default' => '',
	//'desc' => 'توضیح',
	'type' => 'text',
	),

	array(
	'name' => 'کالیبر',
	'id' => 'kalibr',
	'default' => '',
	'type' => 'text',
	),

	array(
	'name' => 'وزن تکی',
	'id' => 'vazntaki',
	'default' => '',
	'type' => 'text',
	),

	array(
	'name' => 'تعداد در جعبه',
	'id' => 'tedadejabe',
	'default' => '',
	'type' => 'text',
	),
	
	array(
	'name' => 'وزن جعبه',
	'id' => 'vaznjabe',
	'default' => '',
	'type' => 'text',
	),
	
	array(
	'name' => 'وسیله شلیک',
	'id' => 'vasileshelik',
	'default' => '',
	'type' => 'text',
	),

	
	array(
		'name' => 'مدل ارتفاع',
		'id' => 'ertefaModel',
		'type' => 'select',
		'options' => array('','ارتفاع پرواز', 'ارتفاع پرتاب', 'ارتفاع فوران','شعاع چرخش')
	),

	array(
	'name' => 'مقدار ارتفاع',
	'id' => 'ertefaValue',
	'default' => '',
	'type' => 'text',
	),

	array(
		'name' => 'مدل نورافشانی',
		'id' => 'nourModel',
		'type' => 'select',
		'options' => array( '','زمان نورافشانی','شعاع نورافشانی')
	),
	
	array(
	'name' => 'مقدار نورافشانی',
	'id' => 'nourValue',
	'default' => '',
	'type' => 'text',
	),
	
	array(
	'name' => 'رنگ',
	'id' => 'rang',
	'default' => '',
	'type' => 'text',
	),	

	array(
	'name' => 'قیمت',
	'id' => 'price',
	'default' => '',
	'type' => 'text',
	),	
)));

	

	add_filter( 'manage_edit-post_columns', 'my_edit_post_columns' ) ;
	function my_edit_post_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'نام کالا' ),
			'kalibr' => __( 'کالیبر' ),
			'rang' => __( 'رنگ' ),
			'price' => __( 'قیمت' ),
			'date' => __( 'زمان ثبت' )
		);
		return $columns;
	}
	
	
	add_action( 'manage_posts_custom_column', 'my_manage_post_columns', 10, 2 );
	function my_manage_post_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'kalibr' :
				$tmp = SmartMetaBox::get('kalibr');
				if ( empty( $tmp ) )
					echo __( '---' );
				else
					echo $tmp ;
				break;

			case 'rang' :
				$tmp = SmartMetaBox::get('rang');
				if ( empty( $tmp ) )
					echo __( '---' );
				else
					echo ('<strong>'.$tmp.'</strong>') ;
				break;
				
			case 'price' :
				$tmp = SmartMetaBox::get('price');
				if ( empty( $tmp ) )
					echo __( '---' );
				else
					echo $tmp ;
				break;
				
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}

	add_filter( 'manage_edit-post_sortable_columns', 'my_post_sortable_columns' );

	function my_post_sortable_columns( $columns ) {
		$columns['kalibr'] = 'kalibr';
		$columns['rang'] = 'rang';
		$columns['price'] = 'price';
		return $columns;
	}	
	
	
		
/*---------------------------------------------------------------Basic EvazzadehSettings Settings------------------------- */

// Remove rel attribute from the category list
function remove_category_list_rel($output)
{
  $output = str_replace(' rel="category tag"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');

// change wordpress admin footer page
function remove_footer_admin ()
{ echo "به پنل مديريت <a href='"; bloginfo('url'); echo"' Title='"; bloginfo('description'); echo"'>"; bloginfo('name'); echo"</a> خوش آمديد | طراحي و توسعه داده شده توسط <a href='http://www.Serena.ir' Title='Serena Group'>گروه سرنا &copy;</a>";}
add_filter('admin_footer_text', 'remove_footer_admin');

// change wordpress logo
function custom_loginlogo() {echo '<style type="text/css">h1 a {background: #f0f0f0;background-image: url('.get_bloginfo('template_directory').'/images/logo-intro.png) !important; }</style>';}
add_action('login_head', 'custom_loginlogo');

// change wordpress logo url
function wpc_url_login(){return "http://www.Serena.ir";}
add_filter('login_headerurl', 'wpc_url_login');
 
 // Custom WordPress Login Logo
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/login.css' );
}
add_action('login_head', 'login_css');


// hide update message for editors
add_action( 'admin_init', 'hide_update_msg', 1 );
function hide_update_msg(){! current_user_can( 'install_plugins' ) and remove_action( 'admin_notices', 'update_nag', 3 );}


/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: اسفند ماه 1391</li>
	<li>منتشر کننده: <a href='http://www.Serena.ir' title='Serena Group'>گروه طراحی سرنا</a></li>
	<li>پشتیبان هاست: <a href='http://www.Serena.ir' title='Serena گروه هاستینگ'>Serena Server</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی طرح', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

// hide unused metabox from wordpress dashboard
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;

// Remove the quickpress widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
// Right Now
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
// recent drafts
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
// recent comments
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
// Wordpress News	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
// Wordpress weblog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

function edit_admin_menus() {
    global $menu;
    global $submenu;
     
    $menu[5][0] = 'محصولات'; // Change Posts to Recipes
    $submenu['edit.php'][5][0] = 'محصولات';
    $submenu['edit.php'][10][0] = 'افزودن کالای جدید';
	
	$menu[5][0] = 'محصولات'; // Change Posts to Recipes
} add_action( 'admin_menu', 'edit_admin_menus' );

remove_action('wp_head', 'wp_generator'); 
function blank_version() { return ''; }  add_filter('the_generator','blank_version');
remove_action('wp_head', 'wlwmanifest_link');

// stop loading jquery from wordpress
/*
if( !is_admin()){

wp_deregister_script('jquery');
wp_register_script('jquery', ("http://cdn.jquerytools.org/1.1.2/jquery.tools.min.js"), false, '1.3.2');
//wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false, '1.7.2');
wp_enqueue_script('jquery');
}
*/
