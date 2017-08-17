<?php get_header(); ?>
<style>
.category-page .slick-slide img, .category-page .recent-article-row img, .category-videos img {
	height: auto !important;
}
.breadcrumbs {
	margin: 0;
	padding: 0;
}
.breadcrumbs li {
	display: inline-block;
	list-style: outside none none;
	margin: 0;
	padding: 5px;
}
.cat-titles.pink-dashed > span {
    font-size: 24px;
}
.category-main-slider {
  color: #666;
  font-weight: 300;
}
.category-main-slider .fp-title {
  color: #e80062 !important;
  display: block;
  font-size: 21px;
  line-height: 1.1;
  padding: 10px 0;
  font-weight: 500;
  text-decoration:none !important;
}
.category-articles-container .recent-article-row {
  background: #efefef none repeat scroll 0 0;
}
</style>
<div class="category-page">
  <div class="row breadcrumbs-row">
    <div class="container">
      <div class="col-md-12">
        <?php bi_breadcrumbs();?>
      </div>
    </div>
  </div>
  <div class="main-content container">
    <div class="row">
      <div id="category-main-slider" class="category-main-slider col-md-5"><div>
        <h3 class="cat-titles pink-dashed">
          <span><?php ucwords(single_cat_title());?></span>
        </h3>
        <?php 
				$catArticleArgsNew = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 3,
					'file_template' => 'section/category-article-slider.php',					
				);
			?>
        <div class="category-articles-container slick-slider-one">
          <?php bi_display_brand($catArticleArgsNew);?>
        </div>
      </div></div>
      <div id="category-articles" class="category-articles col-md-4"><div>
        <h3 class="cat-titles pink-dashed"><span>Latest in <?php ucwords(single_cat_title());?></span>
        </h3>
        <?php 
				$catArticleArgs = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 8,
					'file_template' => 'section/category-articles.php',
					'offset' => 3, // skips first 3 since its displayed earlier
				);
			?>
        <div class="category-articles-container">
          <?php bi_display_brand($catArticleArgs);?>
        </div>
      </div></div>
      <div id="all-articles" class="all-articles col-md-3"><div>
        <h3 class="cat-titles pink-dashed"><span>Recent Posts</span></h3>
        <?php get_sidebar('category');?>
      </div></div>
    </div>
    <div class="row">
      <div class="col-md-6 category-videos"><div>
        <h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?> Videos</span></h3>
        <div class="category-video-containers row">
          <?php /*set arguments */
					$videosArgs = array(
					    'posts_per_page' 	=> 3,
					    'category_name' 	=> NULL, //reset
					    'file_template'	 	=> 'section/category-video.php',
					    /* no tax yet, not finished with recategorizing
					    'tax_query' 		=> array( array(
										            'taxonomy' => 'category',
										            'field' => 'slug',
										            'terms' => 'makeup-videos',
										            //'operator' => 'AND' 
						))*/
					);
				?>
          <?php bi_display_popular_videos($videosArgs);?>
        </div>
      </div></div>
      <div class="col-md-6">        
        <div class="category-video-containers row"><div>
        <h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?> Products</span></h3>
          <?php /*set arguments */
				$productArgs = array(
				    'posts_per_page' 	=> 10,
					'post_type'			=> 'product',			    
				    'category_name' 	=> NULL, //reset
				    'file_template'	 	=> 'section/category-product.php',
				    /*
				    'tax_query' 		=> array( array(
									            'taxonomy' => 'category',
									            'field' => 'slug',
									            'terms' => 'makeup-videos',
									            //'operator' => 'AND'
									           
					)) */
				);
			?>
          <div class="category-product-container slick-slider-four" id="products-carousel">
            <?php bi_display_products($productArgs); ?>
          </div>
        </div></div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
