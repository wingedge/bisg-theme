<?php
/**
 * Beauty Insider Theme
 *
 * @package WordPress
 * @author Maple Tree Media <info@mapletreemedia.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function bisgtheme_setup() {
	load_theme_textdomain( 'bisgtheme' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	// image sizes
	add_image_size( 'bisg-featured-image', 2000, 1200, true );
	add_image_size( 'bisg-thumbnail-avatar', 100, 100, true );
	// menu
	register_nav_menus( array(
		'top'   => __( 'Top Header Menu', 'bisgtheme' ),
		'main' 	=> __( 'Main', 'bisgtheme' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );	

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
}

add_action( 'after_setup_theme', 'bisgtheme_setup' );
remove_action('wp_head', 'wp_generator');

// include the navigation walker
require_once('lib/navwalker.php'); // used for bootstrap navigation layout 
require_once('lib/extract-image.php');
require_once('lib/post-types.php'); // post types
require_once('lib/taxonomies.php'); // taxonomies (categories/tags)
require_once('lib/breadcrumbs.php'); // breadcrumbs
require_once('lib/search/functions.php'); // breadcrumbs

function bisg_scripts(){
	// fonts
	//wp_enqueue_style( 'bisg-font-monseratt', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700');	
	wp_enqueue_style( 'bisg-font-saira', 'https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:400,700');
	wp_enqueue_style( 'bisg-font-catamaran', 'https://fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800');
	wp_enqueue_style( 'bisg-font-playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
	// style css
	wp_enqueue_style( 'bisgtheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bisgtheme-bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array( 'bisgtheme-style' ), '1.0' );	
	wp_enqueue_style( 'bisgtheme-bootstrap-theme', get_theme_file_uri( '/css/bootstrap-theme.min.css' ), array( 'bisgtheme-style' ), '1.0' );	
	wp_enqueue_script( 'bisgtheme-modernizr', get_theme_file_uri( '/js/vendor/modernizr-2.8.3.min.js' ), array(), '2.8.3', false );
	// fonts	
	// footer scripts	
	wp_enqueue_script( 'bisg-bootstrap', get_theme_file_uri( '/js/vendor/bootstrap.min.js' ), array( 'jquery' ), '4.0', true );
    wp_enqueue_script( 'bisg-bootstrap-plugins', get_theme_file_uri( 'js/plugins.js' ), array( 'jquery' ), '4.0', true );
    wp_enqueue_script( 'bisg-fontawesome', '//use.fontawesome.com/994fb7a61a.js', array('jquery'), '', false );
    wp_enqueue_script( 'bisg-main-js', get_theme_file_uri( 'js/main.js' ), array( 'jquery' ), '4.0', true );
    // offcanvass script used for menu  
	wp_enqueue_style( 'bisgtheme-bstrap-css-ext', '//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css', array( 'bisgtheme-style' ), '3.1.3' );
	wp_enqueue_script( 'bisg-bstrap-extension', '//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js', array( 'jquery' ), '3.1.3', true );
	// slick slider
	wp_enqueue_style( 'bisgtheme-slick-css', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array( 'bisgtheme-style' ), '3.1.3' );
	wp_enqueue_script( 'bisg-slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), '3.1.3', true );
}
add_action( 'wp_enqueue_scripts', 'bisg_scripts' );

function bisg_load_theme(){
	// load it last
    wp_enqueue_style( 'bisgtheme-main', get_theme_file_uri( '/css/main.css' ), array(), '1.0' );
	wp_enqueue_style('responsive-style',get_stylesheet_directory_uri().'/css/responsive.css');
}
add_action( 'wp_enqueue_scripts', 'bisg_load_theme', 100 ); // load last

function bisg_load_admin_theme(){	
    wp_enqueue_style( 'bisg-custom-login', get_stylesheet_directory_uri() . '/css/admin.css' );
    wp_enqueue_script( 'bisg-custom-login-js', get_stylesheet_directory_uri() . '/js/js-admin.js' );
}
add_action( 'login_enqueue_scripts', 'bisg_load_admin_theme' );



add_action( 'widgets_init', 'bisg_theme_widgets_init' );
function bisg_theme_widgets_init() {
    register_sidebar( 
    	array(
        	'name' => __( 'Frontpage Sidebar', 'bisg' ),
        	'id' => 'sidebar-main',
        	'description' => __( 'Widgets in this area will be shown on the front page.', 'bisg' ),
        	'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
    	)
    );   

    register_sidebar( 
    	array(
        	'name' => __( 'Category Sidebar', 'bisg' ),
        	'id' => 'sidebar-category',
        	'description' => __( 'Widgets in this area will be shown on the category page.', 'bisg' ),
        	'before_widget' => '<div id="%1$s" class="widget category-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
    	)
    );   

    register_sidebar( 
    	array(
        	'name' => __( 'Articles Sidebar', 'bisg' ),
        	'id' => 'sidebar-article',
        	'description' => __( 'Widgets in this area will be shown on the articles page.', 'bisg' ),
        	'before_widget' => '<div id="%1$s" class="widget article-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
    	)
    );   
}

function bisg_dummy($str,$style){
	$txt = '<div class="dummy-text-only" style="'.$style.'">'.$str.'</div>';
	echo $txt;
}

function bi_display_brand($args){	
	$default = array(
		'category_name' 	=> 'makeup',
		'posts_per_page' 	=> 3,
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'file_template'		=> 'section/frontpage-category.php',
	);

	$args = array_merge($default,$args);	

	$postCtr=1;
	$brandUrl = get_category_link( get_cat_ID( $args['category_name'] ) );	
	$query = new WP_Query( $args );
	if ($query->have_posts()) {
    	while ($query->have_posts()) {       	
        	$query->the_post();        	
        	// get the frontpage category box from section and render
        	//get_template_part('section/frontpage','category'); 
        	include(locate_template($args['file_template']));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}	
}

function bi_display_articles($args=array()){
	$default = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',		
		'file_template'	 	=> 'section/category-articles.php',
	);

	$args = array_merge($default,$args);	
	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       
        	$query->the_post();       	
        	include(locate_template($args['file_template']));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}	
}


function bi_display_featured(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'post_type'			=> 'brand',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'tax_query' 		=> array(array(
					              'taxonomy' => 'brand-category',
					              'field' => 'slug',
					              'terms' => 'featured',
					           )),
	);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       
        	$query->the_post();       	
        	include(locate_template('section/frontpage-featured.php'));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}

function bi_display_popular_videos($args=array()){
	$default = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'category_name'		=> 'most-popular-video',	
		'file_template'	 	=> 'section/frontpage-video.php',
	);

	$args = array_merge($default,$args);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       	
        	$query->the_post();       	
        	include(locate_template($args['file_template']));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}

function bi_display_products($args = array()){
	$default = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,
		'post_type'			=> 'product',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'file_template'		=> 'section/frontpage-products.php',
		'column_width'		=> 'col-md-12',
	);

	$args = array_merge($default,$args);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       	
        	$query->the_post();       	
        	include(locate_template($args['file_template']));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}

/*function to check if taxonomy is level 0, if not use generic category*/
function bi_check_category() {    
    
    if (is_category() && !is_feed() ) {
        
    	$category = get_category( get_query_var( 'cat' ) );
		$catId = $category->cat_ID;

    	if ( is_category($catId) && $category->category_parent > 0 ){
    		load_template(TEMPLATEPATH . '/category-general.php');
    		exit;
    	}       
    }
}

add_action('template_redirect', 'bi_check_category');