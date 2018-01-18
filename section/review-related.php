<!-- related products -->
<div class="row">
  <div class="category-related-containers">
      <div>
        <h3 class="cat-titles pink-dashed" style="text-align:left;"><span>You can check these out as well</span></h3>        

        <?php /*set arguments */
          
          /*$productArgs = array(
              'posts_per_page'  => 10,
            'post_type'     => get_post_type(),         
              'category_name'   => single_cat_title(null,false), //reset
              'file_template'   => 'section/category-product.php',                      
              'orderby' => 'rand',                    
          );*/

          $terms = get_the_terms( get_the_ID(), 'category' );
          $term_list = wp_list_pluck( $terms, 'slug' );
          $related_args = array(
            'post_type' => get_post_type(),
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'post__not_in' => array( get_the_ID() ),
            'orderby' => 'rand',
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $term_list
              )
            )
          );


        ?>
        <div class="related-review-container slick-slider-four" id="products-carousel">
          <?php bi_display_products($related_args); ?>
        </div>
      </div>
    </div>
</div>