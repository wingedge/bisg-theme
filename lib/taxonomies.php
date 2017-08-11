<?php 
// Register Custom Taxonomy
function bi_brand_category() {

  $labels = array(
    'name'                       => _x( 'Brands', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Brand', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Brand', 'bisg' ),   
  );
  $rewrite = array(
    'slug'                       => 'brand/category',
    'with_front'                 => true,
    'hierarchical'               => true,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'brand-category', array( 'product', 'brand', 'establishment', 'post' ), $args );

}
add_action( 'init', 'bi_brand_category', 0 );

function bi_attribute_category() {

  $labels = array(
    'name'                       => _x( 'Attribute', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Attribute', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Attributes', 'bisg' ),    
  );
  $rewrite = array(
    'slug'                       => 'attribute/category',
    'with_front'                 => true,
    'hierarchical'               => true,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'attribute_category', array( 'product', 'brand', 'establishment', 'post' ), $args );

}
add_action( 'init', 'bi_attribute_category', 0 );

function bi_product_category() {

  $labels = array(
    'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Product Category', 'bisg' ),   
  );
  $rewrite = array(
    'slug'                       => 'product/category',
    'with_front'                 => true,
    'hierarchical'               => true,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'product_cat', array( 'product' ), $args );

}
add_action( 'init', 'bi_product_category', 0 ); 

// Register Custom Taxonomy
function bi_product_tag() {

  $labels = array(
    'name'                       => _x( 'Product Tags', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Product Tag', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Product Tags', 'bisg' ),  
  );
  $rewrite = array(
    'slug'                       => 'product/tag',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'product_tag', array( 'product' ), $args );

}
add_action( 'init', 'bi_product_tag', 0 );

// Register Custom Taxonomy
function bi_establishment_tag() {

  $labels = array(
    'name'                       => _x( 'Establishment Tags', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Establishment Tag', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Establishment Tags', 'bisg' ),    
  );
  $rewrite = array(
    'slug'                       => 'establishment/tag',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'establishment_tag', array( 'establishment' ), $args );

}
add_action( 'init', 'bi_establishment_tag', 0 );

// Register Custom Taxonomy
function bi_establishment_category() {

  $labels = array(
    'name'                       => _x( 'Establishment Categories', 'Taxonomy General Name', 'bisg' ),
    'singular_name'              => _x( 'Establishment Category', 'Taxonomy Singular Name', 'bisg' ),
    'menu_name'                  => __( 'Establishment Category', 'bisg' ),   
  );
  $rewrite = array(
    'slug'                       => 'establishment/category',
    'with_front'                 => true,
    'hierarchical'               => true,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    //'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'establishment_category', array( 'establishment' ), $args );

}
add_action( 'init', 'bi_establishment_category', 0 );