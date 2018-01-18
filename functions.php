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
		'main_mobile' 	=> __( 'Main Mobile', 'bisgtheme' ),
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
//require('vendor/autoload.php');
require('lib/review.php'); // review functions
require_once('lib/navwalker.php'); // used for bootstrap navigation layout 
require_once('lib/extract-image.php');
require_once('lib/post-types.php'); // post types
require_once('lib/taxonomies.php'); // taxonomies (categories/tags)
require_once('lib/breadcrumbs.php'); // breadcrumbs
require_once('lib/search/functions.php'); // breadcrumbs

function bisg_scripts(){
	// fonts
	//wp_enqueue_style( 'bisg-font-monseratt', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700');	
	wp_enqueue_style( 'bisg-font-saira', '//fonts.googleapis.com/css?family=Saira+Extra+Condensed:400,700');
	wp_enqueue_style( 'bisg-font-catamaran', '//fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800');
	wp_enqueue_style( 'bisg-font-playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700');
	// style css
	wp_enqueue_style( 'bisgtheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bisgtheme-bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array( 'bisgtheme-style' ), null );	
	wp_enqueue_style( 'bisgtheme-bootstrap-theme', get_theme_file_uri( '/css/bootstrap-theme.min.css' ), array( 'bisgtheme-style' ), null );
	wp_enqueue_style( 'bisgtheme-font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array( 'bisgtheme-style' ), null );	
	wp_enqueue_style( 'bisgtheme-composer', get_theme_file_uri( '/css/vc-composer.min.css' ), array( 'bisgtheme-style' ), null );	
	wp_enqueue_script( 'bisgtheme-modernizr', get_theme_file_uri( '/js/vendor/modernizr-2.8.3.min.js' ), array(), null, false );
	// fonts	
	// footer scripts	
	wp_enqueue_script( 'bisg-bootstrap', get_theme_file_uri( '/js/vendor/bootstrap.min.js' ), array( 'jquery' ), null, true );
    wp_enqueue_script( 'bisg-bootstrap-plugins', get_theme_file_uri( 'js/plugins.js' ), array( 'jquery' ), null, true );

    // twentytwenty
    wp_enqueue_script( 'bisg-twentyjs', get_theme_file_uri( 'js/jquery.event.move.js' ), array( 'jquery' ), null, true );
    wp_enqueue_script( 'bisg-twentyjs-move', get_theme_file_uri( 'js/jquery.twentytwenty.js' ), array( 'jquery' ), null, true );

    //wp_enqueue_script( 'bisg-fontawesome', '//use.fontawesome.com/994fb7a61a.js', array('jquery'), '', false );
    wp_enqueue_script( 'bisg-main-js', get_theme_file_uri( 'js/main.js' ), array( 'jquery' ), null, true );
    // offcanvass script used for menu  
	wp_enqueue_style( 'bisgtheme-bstrap-css-ext', '//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css', array( 'bisgtheme-style' ), null );
	wp_enqueue_script( 'bisg-bstrap-extension', '//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js', array( 'jquery' ), null, true );
	// slick slider
	wp_enqueue_style( 'bisgtheme-slick-css', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array( 'bisgtheme-style' ), null );
	wp_enqueue_script( 'bisg-slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'bisg-list-js', '//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js', array( 'jquery' ), null, true );	

	wp_enqueue_script('bi-filter-js',get_stylesheet_directory_uri().'/js/filter.js', array('jquery'), NULL, true);
	wp_localize_script( 'bi-filter-js', 'bisg', array(		
		'ajax_url' => admin_url( 'admin-ajax.php' ),  
		'site_url' => home_url('/'),   
	));

}
add_action( 'wp_enqueue_scripts', 'bisg_scripts' );

function bisg_load_theme(){
	// load it last
    wp_enqueue_style( 'bisgtheme-main', get_theme_file_uri( '/css/main.css' ), array(), null );
	wp_enqueue_style('responsive-style',get_stylesheet_directory_uri().'/css/responsive.css');

	// load twentytwenty
	wp_enqueue_style( 'bisgtheme-twentytwenty', get_theme_file_uri( '/css/twentytwenty.css' ), array(), null );
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
        	'name' => __( 'Footer Sidebar', 'bisg' ),
        	'id' => 'sidebar-fppt',
        	'description' => __( 'Widgets in this area will be shown on the footer.', 'bisg' ),
        	'before_widget' => '<div id="%1$s" class="widget foot-widget %2$s">',
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

function bi_no_articles(){
	include(locate_template('section/no-post.php'));
}

function bi_display_brand($args){	
	$default = array(
		'category_name' 	=> 'makeup',
		'posts_per_page' 	=> 3,
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'file_template'		=> 'section/frontpage-category.php',
		'category__not_in'	=> array('5787'),
	);

	$args = array_merge($default,$args);	

	$postCtr=1;
	$brandUrl = get_category_link( get_cat_ID( $args['category_name'] ) );	
	$args['brandCategory'] = get_category(get_cat_ID( $args['category_name'] ));
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
	}else{
		bi_no_articles();
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
	}else{
		bi_no_articles();
	}		
}


function bi_display_featured(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'post_type'			=> 'brand',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'tax_query' 		=> array(
								array(
					              	'taxonomy' => 'brand-category',
					              	'field' => 'slug',
					              	'terms' => 'featured',
					           	),
					           	 array(
							        'taxonomy' => 'brand-category',
							        'terms' => 'dont-display-frontpage',
							        'field' => 'slug',
							        'operator' => 'NOT IN',
							    ),
		),
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
	}else{
		bi_no_articles();
	}	
}

//visual composer activated start

function bi_display_featured2(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'post_type'			=> 'brand',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'tax_query' 		=> array(array(
					              'taxonomy' => 'brand-category',
					              'field' => 'slug',
					              'terms' => 'featured2',
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
	}else{
		bi_no_articles();
	}	
}

//insider deals

function bi_insider_deals(){
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'post_type'			=> 'insider_deals',
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
	}else{
		bi_no_articles();
	}	
}


//visual composer activated end

function bi_display_professional($args=array()){
	$default = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,		
		'order' 			=> 'DESC',
		'orderby'			=> 'date',		
	);
	$args = array_merge($default,$args);
	$query = new WP_Query( $args );	
	$postCtr=1;
	if ($query->have_posts()) {		
    	while ($query->have_posts()) {       
        	$query->the_post();       	
        	include(locate_template('section/frontpage-featured.php'));
        	$postCtr++;
    	}
    	wp_reset_postdata();
	}else{
		bi_no_articles();
	}	
}

function bi_display_popular_videos($args=array()){
	$default = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 10,
		'post_type'			=> 'post',
		'order' 			=> 'ASC',
		'orderby'			=> 'rand',
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
	}else{
		bi_no_articles();
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
	}else{
		bi_no_articles();
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

function custom_rewrite_tag() {
  add_rewrite_tag('%showcat%', '([^&]+)'); 
  add_rewrite_tag('%p%', '([^&]+)'); 
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule() {
	flush_rewrite_rules();
	
	
	add_rewrite_rule('^makeup-products','index.php?page_id=25681&showcat=makeup','top');
	add_rewrite_rule('^all-products/makeup','index.php?page_id=25681&showcat=makeup','top');

	add_rewrite_rule('^skincare-products','index.php?page_id=25686&showcat=skincare','top');
	add_rewrite_rule('^all-products/skincare','index.php?page_id=25686&showcat=skincare','top');

	add_rewrite_rule('^hair-products','index.php?page_id=25688&showcat=hair','top');
	add_rewrite_rule('^all-products/hair','index.php?page_id=25688&showcat=hair','top');

	add_rewrite_rule('^body-products','index.php?page_id=25690&showcat=body','top');
	add_rewrite_rule('^all-products/body','index.php?page_id=25690&showcat=body','top');	

	add_rewrite_rule('^spas-establishments','index.php?page_id=25692&showcat=spas','top');
	add_rewrite_rule('^all-establishments/spas','index.php?page_id=25692&showcat=spas','top');

	add_rewrite_rule('^salons-establishments','index.php?page_id=25694&showcat=salons','top');
	add_rewrite_rule('^all-establishments/salons','index.php?page_id=25694&showcat=salons','top');

	add_rewrite_rule('^aesthetics-establishments','index.php?page_id=25696&showcat=aesthetics','top');
	add_rewrite_rule('^all-establishments/aesthetics','index.php?page_id=25696&showcat=aesthetics','top');

	add_rewrite_rule('^wellness-products','index.php?page_id=26760&showcat=wellness','top');
	add_rewrite_rule('^wellness-establishments','index.php?page_id=25699&showcat=wellness','top');


	// all other else
	add_rewrite_rule('^([^/]+)-products/','index.php?page_id=22542&showcat=$matches[1]','top');
	add_rewrite_rule('^([^/]+)-products/page/([^/]+)/','index.php?page_id=22542&showcat=$matches[1]&paged=$matches[2]','top');


	add_rewrite_rule('^all-products/([^/]*)?','index.php?page_id=22542&showcat=$matches[1]','top');
	add_rewrite_rule('^all-establishments/([^/]*)?','index.php?page_id=22560&showcat=$matches[1]','top');

	add_rewrite_rule('^([^/]*)?-establishments','index.php?page_id=22560&showcat=$matches[1]','top');

	add_rewrite_rule('^([^/]*)?-articles','index.php?page_id=25093&showcat=$matches[1]','top');	

	add_rewrite_rule('^product-tag/([^/]*)?','index.php?s=$matches[1]','top');		

	//add_rewrite_rule( 'region/([^/]+)/type/([^/]+)/page/([0-9]{1,})/?', 'index.php?taxonomy=region&term=$matches[1]&post_type=$matches[2]&paged=$matches[3]', 'top' );
}
add_action('init', 'custom_rewrite_rule', 10, 0);


/*Shortcodes*/

add_shortcode('bi_reviews_form', 'bi_review_formonly',11);
function bi_review_formonly(){	
	include( locate_template('section/review-formonly.php') );	
}


add_shortcode('bi_products_by_tags', 'bi_display_product_by_tags',11);
function bi_display_product_by_tags($atts){	
	$atts = shortcode_atts( array(
		'columns' => '4',
		'orderby' => 'title',
		'order'   => 'asc',
		'tags' 	 => '', 		

	), $atts );
	$args = array(
		//'category_name' 	=> 'featured',
		'posts_per_page' 	=> 8,
		'product_tag'	=>$atts['tags'],
		'categor_name' => NULL,
		'post_type'			=> 'product',
		'order' 			=> 'DESC',
		'orderby'			=> 'date',		
	);
	?>
	<div class="category-product-containers  col-md-12">
	<div style="overflow:hidden;">	  
	  <div class="featured-video-container category-product-container slick-slider-four" id="products-carousel">
	    <?php bi_display_products($args); ?>
	  </div>
	</div>
	</div>
	<div class="clearfix"></div>
	<?php 
	return;
}

//[bi_reviews_for_post post_id=”8936″]
add_shortcode('bi_reviews_for_post', 'bi_reviews_for_post',11);
function bi_reviews_for_post($atts){
	global $BIReview;
	$atts = shortcode_atts( array(
		'post_id' => '',
	), $atts );	?>
	<div class="col-md-12 review-container">	
	<?php $BIReview->show_reviews($atts['post_id']);?>
	</div>
	<?php 
	return;
}




add_action('wp_ajax_filter_results', 'ajax_filter_generate_results');
add_action('wp_ajax_nopriv_filter_results', 'ajax_filter_generate_results');

function ajax_filter_generate_results(){

	$selected_categories = $_POST['filterCategory'];
	$selected_attributes = $_POST['filterAttributes'];
	$postType = $_POST['postType'];
	$category = $_POST['category'];
	$term = $_POST['searchTerm'];

	$e_categories = $_POST['filterECategory'];
	$e_attributes = $_POST['filterEAttributes'];

	$paged = $_POST['filterPaged'];
	// do query here
  	$args = array(
  		'post_type' => $postType, 
  		'posts_per_page' => 39,  		
  		//'category_name' => $category,
  		'order' => 'asc',
  		'orderby' => 'title',
  		'paged' => $paged,
  	);

  	if( !empty($term) ){
  		$args['s'] = $term;
  	}
  	
  	// products
  	if(!empty($selected_categories)){
	  	$args['tax_query'] = array( // tax_query is an array of arrays;	  			  		
	  		array(
		  		'taxonomy' => 'category',
		        'terms' => $selected_categories,
		        'field' => 'id',
		        'operator' => 'IN',
	  		),	  		
	  	);
  	}else{ // nothing, usually used in reset
  		$args['tax_query'] = array( // tax_query is an array of arrays;	  			  		
	  		array(
		  		'taxonomy' => 'category',
		        'terms' => $category,
		        'field' => 'slug',
		        'operator' => 'IN',
	  		),	  		
	  	);
  	}

  	if(!empty($selected_attributes)){
	  	$args['tax_query'] = array( // tax_query is an array of arrays;
	  		array(
		  		'taxonomy' => 'attribute_category',
		        'terms' => $selected_attributes,
		        'field' => 'id',
		        'operator' => 'IN',
	  		)	
	  	);
  	}

  	if(!empty($e_attributes)){	  	
	  	$args['tax_query'] = array( // tax_query is an array of arrays;
	  		array(
		  		'taxonomy' => 'establishment_category',
		        'terms' => $e_attributes,
		        'field' => 'id',
		        'operator' => 'IN',
	  		)	  		

	  	);
  	}

  	if(!empty($selected_categories) && !empty($selected_attributes) ){
  		$args['tax_query'] = array( // tax_query is an array of arrays;	  			  		
	  		array(
		  		'taxonomy' => 'category',
		        'terms' => $selected_categories,
		        'field' => 'id',
		        'operator' => 'IN',
	  		),
	  		array(
		  		'taxonomy' => 'attribute_category',
		        'terms' => $selected_attributes,
		        'field' => 'id',
		        'operator' => 'IN',
	  		)	  		
	  	);
  	}

  	//print_r($args);

  	$query = new WP_Query( $args );   	
	echo '<div class="filter-ajax-results ajax-results">';
	include(locate_template('format/result-item.php'));
	echo '';
	exit();
}

function add_query_vars_filter( $vars ){
  $vars[] = "pp";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


/**
 * WordPress function for redirecting users on login based on user role
 */


add_action('admin_init', 'bi_redirects');

function bi_redirects() {
	$user = wp_get_current_user();
	
	if ( ! defined( 'DOING_AJAX' ) ) {
		if ( in_array( 'administrator', (array) $user->roles ) || in_array( 'editor', (array) $user->roles ) ) {
			//The user has the "author" role			
		}else{
			wp_redirect(home_url('/my-account/')); 
			exit;
		}
	}
  
}


/**
 * Disable WPES when query string variable disable_wpes is true
 */
function wpes_enabled($enabled) {
    if (!empty($_GET['disable_wpes'])) {
        return FALSE;
    }
    if (!empty($_POST['disable_wpes'])) {
        return FALSE;
    }
    return $enabled;
}
add_filter('wpes_enabled', 'wpes_enabled');


function bi_display_rating(){
	global $BIReview; 	
	global $post;
	$rating = ceil($BIReview->get_ratings($post->ID));	
	bi_render_rating($rating);
}

function bi_render_rating($rating){
	for ($i=0; $i < $rating ; $i++) { 
		echo '<i class="fa fa-star" aria-hidden="true"></i>';		
	}
	for ($i=$rating; $i < 5 ; $i++) { 
		echo '<i class="fa fa-star-o" aria-hidden="true"></i>';		
	}
}

/* remove yoast seo search schema */
function bybe_remove_yoast_json($data){
    $data = array();
	return $data;
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);


// modify the sent email
//apply_filters( 'wp_new_user_notification_email', array $wp_new_user_notification_email, WP_User $user, string $blogname )

add_filter('wp_new_user_notification_email','bi_new_user_email',10, 2);

function bi_new_user_email($wp_new_user_notification_email, $user){
	/*
	$wp_new_user_notification_email

    (array) Used to build wp_mail().

        'to'
        (string) The intended recipient - New user email address.
        'subject'
        (string) The subject of the email.
        'message'
        (string) The body of the email.
        'headers'
        (string) The headers of the email.
       $user
	*/
    $newMessage  = 'Hi '.sprintf(__('%s'), $user->user_login). "\r\n\r\n\n";
    $newMessage .= 'Congratulations! Your registration was successful!'."\r\n\r\n\n";
	$newMessage .= "Welcome to Singapore's fastest growing  beauty community!"."\r\n";
	$newMessage .= 'You can now earn points, redeem your favourite beauty products and services, simply by interacting with us and by leaving reviews. Not forgetting, we will send you customised content and promotions that matches your concerns, skin & hair types when you complete your registration'."\r\n\r\n\r\n";

	$newMessage .= $wp_new_user_notification_email['message']. "\r\n\r\n\r\n";

 	$newMessage .= "Happy surfing Gorgeous! \r\n\r\n\r\n\r\n"; 
	$newMessage .= "Your BEAUTY BFF.";


	//$wp_new_user_notification_email['to'] = 'moreno.francis@gmail.com';
	$wp_new_user_notification_email['message'] = $newMessage;
	return $wp_new_user_notification_email;

}
//change url logo in login
function bi_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'bi_login_logo_url' );
