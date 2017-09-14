<?php get_header(); 
	$thisCategory = get_category( get_query_var( 'cat' ) );	
	$vidCategory = get_category('videos');				
?>
<div class="category-page">
  <?php get_template_part('section/breadcrumbs'); ?>
  <div class="main-content container">
    <div class="row"><!-- full banner of first post -->
      <?php 
        $firstArticle = array(
          'category_name' => single_cat_title(null,false),
          'posts_per_page' => 1,  
          'category__not_in' => array('5787'),
        );
        $q = new WP_Query( $firstArticle ); 
  
        if ($q->have_posts()) {   
          while ($q->have_posts()) {       
            $q->the_post();         
          ?>            
            <div class="category-full-banner-image" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">              
              <div class="category-banner-title"><h4><?php the_title();?></h4></div>
            </div>            
          <?php          
          }
        }
        wp_reset_postdata();      
      ?>
    </div>

    <div class="row">
      <div id="category-content-left" class="category-content-left col-md-9">
        <div class="row">
          <div id="category-main-slider" class="category-main-slider col-md-12">
            <div>
              <h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?></span></h3>
              <?php 
        				$catArticleArgsNew = array(
        					'category_name' => single_cat_title(null,false),
        					'posts_per_page'	=> 5,
                  'offset' => 1,
        					'file_template' => 'section/category-article-slider.php',					
        				);
      				?>
              <div class="category-articles-container slick-slider-one">
                <?php bi_display_brand($catArticleArgsNew);?>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="category-video-containers col-md-12">
            <div>
              <h3 class="cat-titles pink-dashed" style="text-align:left;"><span><?php ucwords(single_cat_title());?> Videos</span></h3>
              <div class="category-video-box">
                <?php /*set arguments */					
        					$videosArgs = array(
      					    'posts_per_page' 	=> 12,
    					     'category_name' => single_cat_title(null,false),
      					    'file_template'	 	=> 'section/category-video.php',			
                    'category__in'    => array('5787'),
      					   /*
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
                    */
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
              <h3 class="cat-titles pink-dashed" style="text-align:left;"><span>Trending Products</span></h3>
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

      <div id="category-recent-articles" class="category-recent-articles col-md-3">
      <div>
        <h3 class="cat-titles">Latest in Article
        </h3>
        <div class="recent-article-wrap">
          <?php 
          $catArticleArgs = array(
            'category_name' => single_cat_title(null,false),
            'posts_per_page' => 5,
            'file_template' => 'section/catpage-category-articles.php',
            'offset' => 4, // skips first 3 since its displayed earlier
          );
          ?>
          <div class="category-articles-container">
            <?php bi_display_brand($catArticleArgs);?>
          </div>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('$thisCategory->slug'));?>"><span>View More</span></a></div>
        </div>
      </div>
      </div>

      <div id="all-articles" class="all-articles col-md-3">
        <div>
          <h3 class="cat-titles"><span>Recent Posts</span></h3>
          <?php get_sidebar('category');?>
          <div class="readmore readmore-cat"><a href="<?php echo get_post_type_archive_link( 'post' );?>"><span>View More</span></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
