<?php
/** ESTABLISHMENT **/
function bi_establishment_posttype() {

    $labels = array(
        'name'                  => _x( 'Establishments', 'Post Type General Name', 'bisg' ),
        'singular_name'         => _x( 'Establishment', 'Post Type Singular Name', 'bisg' ),
        'menu_name'             => __( 'Establishments', 'bisg' ),
        'name_admin_bar'        => __( 'Establishment', 'bisg' ),
        'archives'              => __( 'Establishment Archives', 'bisg' ),
        'parent_item_colon'     => __( 'Parent Establishment:', 'bisg' ),
        'all_items'             => __( 'All Establishments', 'bisg' ),   
    );
    $args = array(
        'label'                 => __( 'Establishment', 'bisg' ),
        'description'           => __( 'Establishment post type', 'bisg' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes','post-layouts'),
        'taxonomies'            => array( 'category', 'post_tag', 'establishment_category', 'establishment_tag' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
  register_post_type( 'establishment', $args );

}
add_action( 'init', 'bi_establishment_posttype', 0 );

/** PRODUCT **/

function bi_product_posttype() {

    $labels = array(
        'name'                  => _x( 'Products', 'Post Type General Name', 'bisg' ),
        'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'bisg' ),
        'menu_name'             => __( 'Products', 'bisg' ),
        'name_admin_bar'        => __( 'Product', 'bisg' ),
        'archives'              => __( 'Products Archives', 'bisg' ),
        'parent_item_colon'     => __( 'Parent Product:', 'bisg' ),    
    );
    $args = array(
        'label'                 => __( 'Product', 'bisg' ),
        'description'           => __( 'Product post type', 'bisg' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes','post-layouts'),
        'taxonomies'            => array( 'category', 'post_tag', 'product_cat', 'product_tag'),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
  register_post_type( 'product', $args );

}
add_action( 'init', 'bi_product_posttype', 0 );


/** BRAND **/

function bi_brand_posttype() {

    $labels = array(
        'name'                  => _x( 'Brands', 'Post Type General Name', 'bisg' ),
        'singular_name'         => _x( 'Brand', 'Post Type Singular Name', 'bisg' ),
        'menu_name'             => __( 'Brands', 'bisg' ),
        'name_admin_bar'        => __( 'Brand', 'bisg' ),
        'archives'              => __( 'Brand Archives', 'bisg' ),
        'parent_item_colon'     => __( 'Parent Brand:', 'bisg' ),        
    );
    $args = array(
        'label'                 => __( 'Brand', 'bisg' ),
        'description'           => __( 'Brand post type', 'bisg' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes','post-layouts'),
        'taxonomies'            => array( 'category', 'post_tag', 'brand-category'),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
  register_post_type( 'brand', $args );

}
add_action( 'init', 'bi_brand_posttype', 0 );



