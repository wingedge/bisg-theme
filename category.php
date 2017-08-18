<?php get_header(); 
	$thisCategory = get_category( get_query_var( 'cat' ) );	
	$vidCategory = get_category('videos');				
?>
<div class="category-page">
  <?php get_template_part('section/breadcrumbs'); ?>
  <div class="main-content container">
    <div class="row">
      <div id="category-content-left" class="category-content-left col-md-9">
        <div class="row">
          <div id="category-main-slider" class="category-main-slider col-md-7">
            <div>
              <h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?></span></h3>
              <?php 
				$catArticleArgsNew = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 5,
					'file_template' => 'section/category-article-slider.php',					
				);
				?>
              <div class="category-articles-container slick-slider-one">
                <?php bi_display_brand($catArticleArgsNew);?>
              </div>
            </div>
          </div>
          <div id="category-recent-articles" class="category-recent-articles col-md-5">
            <div>
              <h3 class="cat-titles">Latest in
                <?php ucwords(single_cat_title());?>
              </h3>
              <div class="recent-article-wrap">
                <?php 
				$catArticleArgs = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 10,
					'file_template' => 'section/catpage-category-articles.php',
					'offset' => 3, // skips first 3 since its displayed earlier
				);
			  	?>
                <div class="category-articles-container">
                  <?php bi_display_brand($catArticleArgs);?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="category-video-containers col-md-12">
            <div>
              <h3 class="cat-bottom-title">
                <?php ucwords(single_cat_title());?>
                Videos</h3>
              <div class="category-video-box">
                <?php /*set arguments */					
					$videosArgs = array(
					    'posts_per_page' 	=> 4,
					    'category_name' 	=> NULL, //reset
					    'file_template'	 	=> 'section/category-video.php',					    
					    'tax_query' 		=> array( 
					    							'relation' => 'AND',
					    							array(
										            	'taxonomy' => 'category',
										            	'field' => 'slug',
										            	'terms' => array($thisCategory->slug),
										            	//'operator' => 'AND',
										            ),
										            array(
										            	'taxonomy' => 'post_format',
										            	'field' => 'slug',
										            	'terms' => array('post-format-video'),
										            	'operator' => 'IN',
										            )
					    )
					);
				?>





                <div class="featured-video-container category-product-container slick-slider-four" id="products-carousel">
                  <?php bi_display_popular_videos($videosArgs);?>
                </div>
              </div>
            </div>
          </div>
          <div class="category-product-containers  col-md-12">
            <div>
              <h3 class="cat-bottom-title">
                <?php ucwords(single_cat_title());?>
                Products</span></h3>
              <?php /*set arguments */
				$productArgs = array(
				    'posts_per_page' 	=> 10,
					'post_type'			=> 'product',			    
				    'category_name' 	=> single_cat_title(null,false), //reset
				    'file_template'	 	=> 'section/category-product.php',				    
				    /*'tax_query' 		=> array( array(
									            'taxonomy' => 'category',
									            'field' => 'slug',
									            'terms' => 'makeup-videos',
									            //'operator' => 'AND'								           
					))  */	
				);
			?>
              <div class="featured-video-container category-product-container slick-slider-four" id="products-carousel">
                <?php bi_display_products($productArgs); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="all-articles" class="all-articles col-md-3">
        <div>
          <h3 class="cat-titles"><span>Recent Posts</span></h3>
          <?php get_sidebar('category');?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
