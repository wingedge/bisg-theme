<!-- related products -->
<div class="row">
  <div class="category-related-containers">
      <div>
        <h3 class="cat-titles pink-dashed" style="text-align:left;"><span>You can check these out as well</span></h3>
        <?php /*set arguments */
          $productArgs = array(
              'posts_per_page'  => 10,
            'post_type'     => array('product','establishment'),         
              'category_name'   => single_cat_title(null,false), //reset
              'file_template'   => 'section/category-product.php',                      
              'orderby' => 'rand',                    
          );
        ?>
        <div class="related-review-container slick-slider-four" id="products-carousel">
          <?php bi_display_products($productArgs); ?>
        </div>
      </div>
    </div>
</div>