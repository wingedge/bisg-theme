<?php
//Shortcode for textbox
add_shortcode( 'post_type_search', 'getposttypesearch_box' );
function getposttypesearch_box() {
    $output.= '<input type="text" name="" id="posttype_search">'; 
    $output.= '<div id="loading"></div>';
    $output.= '<div id="tagged-posts"></div>';
    return $output;
}

 
//Enqueue script
function ajax_filter_posts_scripts() {
    wp_enqueue_style( 'custom-search', get_stylesheet_directory_uri() . '/lib/search/css/search_style.css' );
 	  wp_register_script('afp_script', get_stylesheet_directory_uri() . '/lib/search/js/ajax-filter-posts.js', array('jquery'), null, false);
 	  wp_enqueue_script('afp_script');
 	  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),  
        'afp_site_url' => home_url('/'),   
      )
 	  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);


//Script for getting post
function ajax_filter_get_posts($search_tag) {
	// Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

	//get seach string var
$search_term = $_POST['s_string'];   
 
//query blogs 
$filter_args_post = array(	
	'post_status'    => 'publish',
	'post_type'	 => 'post',
	'posts_per_page' => '4',
	's' => $search_term,
  /*
  'tax_query'    => array(
                      array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $search_tag,
                     )
  ),*/
 
);

//query products 
$filter_args_products = array(
	
	'post_status'    => 'publish',
	'post_type'	 => 'product',
	'posts_per_page' => '4',
  's' => $search_term,
	/*'tax_query'    => array(array(
      'taxonomy' => 'category',
      'field' => 'slug',
      'terms' => $search_tag,
   )), */
);

//query establishments 
$filter_args_establishments = array(
	
	'post_status'    => 'publish',
	'post_type'	 => 'establishment',
	'posts_per_page' => '4',
  's' => $search_term,
	//'tax_query'    => array(array(
  //    'taxonomy' => 'category',
  //    'field' => 'slug',
  //    'terms' => $search_tag,
  //)),
 
);


//BLOGS 
$filter_query = new WP_Query( $filter_args_post );
$outputB ='<div style=" border-right: 1px solid #e5e5e5;" class="col-sm-4"><h4>Blogs</h4>';

  if ( $filter_query->have_posts() ) : while ( $filter_query->have_posts() ) : $filter_query->the_post();

    $outputB.= '<div class="result-wrap"><a href="'.get_permalink().'">'; 
    $outputB.= '<div class="result-image">'. get_the_post_thumbnail( $post_id, array( 250, 250) ).'</div>';
    $outputB.= '<h5  class="result-title">'.get_the_title().'</h5></a></div>'; 
    $result = 'success';

  endwhile;  else:
    $result = 'fail';
    $outputB.='No Articles Found';
  endif;
    $outputB .= '</div>'; 
    
    
//PRODUCTS 
$filter_query = new WP_Query($filter_args_products );
$outputP ='<div style=" border-right: 1px solid #e5e5e5;" class="col-sm-4"><h4>Products</h4>';
  if ( $filter_query->have_posts() ) : while ( $filter_query->have_posts() ) : $filter_query->the_post();

    $outputP.= '<div class="result-wrap"><a href="'.get_permalink().'">'; 
    $outputP.= '<div class="result-image">'. get_the_post_thumbnail( $post_id, array( 250, 250) ).'</div>';
    $outputP.= '<h5  class="result-title">'.get_the_title().'</h5></a></div>'; 
    $result = 'success';

  endwhile;  else:
    $result = 'fail';
    $outputP.='No Products Found';
  endif;
    $outputP .= '</div>'; 
    
    
    
//ESTABLISHMENTS 
$filter_query = new WP_Query($filter_args_establishments );
$outputE ='<div class="col-sm-4"><h4>Establishments</h4>';
  if ( $filter_query->have_posts() ) : while ( $filter_query->have_posts() ) : $filter_query->the_post();

    $outputE.= '<div class="result-wrap"><a href="'.get_permalink().'">'; 
    $outputE.= '<div class="result-image">'. get_the_post_thumbnail( $post_id, array( 250, 250) ).'</div>';
    $outputE.= '<span  class="result-title">'.get_the_title().'</span></a></div>';  
    $result = 'success';

  endwhile;  else:
    $result = 'fail';
    $outputE.='No Establishment Found';
  endif;
    $outputE .= '</div>'; 
            
    
    $array = array($outputB,$outputP,$outputE);
    $out = array_values($array);
    $response = json_encode($out);
    echo $response;
    die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');