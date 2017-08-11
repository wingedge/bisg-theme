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

function bisg_scripts(){
	// fonts
	wp_enqueue_style( 'bisg-font-monseratt', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700');	
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

function bisg_custom_script(){
	// load it last
    wp_enqueue_style( 'bisgtheme-main', get_theme_file_uri( '/css/main.css' ), array(), '1.0' );
	wp_enqueue_style('custom-style',get_stylesheet_directory_uri().'/css/custom.css');
}

add_action( 'wp_enqueue_scripts', 'bisg_custom_script', 100 ); 


add_action( 'widgets_init', 'bisg_theme_widgets_init' );
function bisg_theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'bisg' ),
        'id' => 'sidebar-main',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'bisg' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

function bisg_dummy($str,$style){
	$txt = '<div class="dummy-text-only" style="'.$style.'">'.$str.'</div>';
	echo $txt;
}

function bi_display_brand($brand, $type = 'post'){	
	$args = array(
		'category_name' 	=> $brand,
		'posts_per_page' 	=> 3,
		'post_type'			=> $type,
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
	);

	$postCtr=1;
	$brandUrl = get_category_link( get_cat_ID( $brand ) );
	$query = new WP_Query( $args );
	if ($query->have_posts()) {
    	while ($query->have_posts()) {       	
        	$query->the_post();        	
        	// get the frontpage category box from section and render
        	//get_template_part('section/frontpage','category'); 
        	include(locate_template('section/frontpage-category.php'));
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

function bi_display_popular_videos(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'category_name'		=> 'most-popular-video',		
	);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       	
        	$query->the_post();       	
        	include(locate_template('section/frontpage-video.php'));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}

function bi_display_products(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,
		'post_type'			=> 'product',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',		
	);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       	
        	$query->the_post();       	
        	include(locate_template('section/frontpage-products.php'));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}

function bi_display_product_sidebar(){
	$args = array(
		//'category_name' 	=> 'Tried Tested Loved',
		'posts_per_page' 	=> 4,
		'post_type'			=> 'product',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',		
	);

	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       	
        	$query->the_post();       	
        	include(locate_template('section/sidebar-products.php'));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}		
}