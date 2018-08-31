<?php 

/* Template name: Video Category */ 

   get_header(); 
    $thisCategory = 'most-popular-video'; 
    //$vidCategory = get_category('videos'); 


?>

<div class="category-page">

  <?php get_template_part('section/breadcrumbs'); ?>
  <div class="main-content container">
    <div class="row"><!-- full banner of first post -->
      <div class="slick-slider-one large-category-slider">
      <?php 
        $firstArticle = array(
          		  'post_type' => 'post',            
                  'tax_query' => array(            
                    array(            
                      'taxonomy' => 'category',            
                      'field'    => 'slug',            
                      'terms'    => 'most-popular-video',            
                    ),            
                  ),     
        );
        $q = new WP_Query( $firstArticle ); 
  
        if ($q->have_posts()) {   
          while ($q->have_posts()) {       
            $q->the_post();         
          ?>
      <a href="<?php the_permalink();?>">
      <div class="category-full-banner-image" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
        <div class="category-banner-title">
          <h4>
            <?php the_title();?>
          </h4>
        </div>
      </div>
      </a>
      <?php          
          }
        }
        wp_reset_postdata();      
      ?>
    </div>
  </div>

      <hr class="newhomepagehr">
  
      
      <div id="category-content-left" class="category-content-left col-md-9 col-sm-8">
        <h3 class="s-cat-title s-cat-title-mL16"><span><?php ucwords(single_cat_title());?></span></h3>
          <!-- main -->
          <div class="row">
            <div id="category-main-slider" class="category-main-slider col-md-12" style="padding-bottom:25px;">
              <div>

                  
                <?php 
		            $catArticleArgsNew = array(
		                      		   'post_type' => 'post',        
					                   'tax_query' => array(            
					                    array(            
					                      'taxonomy' => 'category',            
					                      'field'    => 'slug',            
					                      'terms'    => 'most-popular-video',            
					                    ),            
		                 		 ),               
                    );
                ?>    

                <div class="category-articles-container">
                  <?php bi_display_brand($catArticleArgsNew);?>
                </div>
              </div>
            </div>

            <div class="readmore readmore-cat"><a href="<?php echo site_url('/'. strtolower($thisCategory->slug) .'-articles/'); ?>"><span>View More</span></a></div>
          </div>
          
          
          
        
      </div>

      <!-- recent articles -->
      <div id="all-articles" class="all-articles col-md-3 col-sm-4">
        <div>
          <h3 class="cat-titles">Latest</h3>

          <div class="recent-articles">
            <?php 
              $catArticleArgs = array(
                //'category_name' => single_cat_title(null,false),
                'category_name' => NULL,
                'posts_per_page' => 4,
                'file_template' => 'section/catpage-category-articles.php',
                //'offset' => 4, // skips first 3 since its displayed earlier
              );
            ?>
            
            <?php bi_display_brand($catArticleArgs);?>            

            <div class="readmore readmore-cat"><a href="<?php echo get_post_type_archive_link( 'post' );?>"><span>View More</span></a></div>

          </div>

        </div>
      </div>

      <!-- recent post regardless of article -->
      <div id="all-articles" class="all-articles col-md-3 col-sm-4">
        <div>
          <h3 class="cat-titles"><span>You may also like</span></h3>
          <?php get_sidebar('category');?>
          
        </div>
      </div>


      <div class="col-md-3 col-sm-4 s-widget category-recent-articles">
        <div style="margin:15px 0;">
          <h3 class="cat-titles" style="margin-bottom:20px;">Latest Deals</h3>
          <div class="featured-deal-container slick-slider-one" id="deal-carousel">
            <?php $sidebarArgs = array(          
                'posts_per_page'  => 3,
                'post_type'     => 'insider_deals',
                'order'       => 'DESC',
                'orderby'     => 'date',              
                'file_template'   => 'section/sidebar-products.php', 
              );

            ?>
            <?php bi_display_products($sidebarArgs);?>
          </div>
          <div class="readmore readmore-cat" style="margin-top:10px;"><a href="<?php echo site_url( 'insider-deals' );?>"><span>View Deals</span></a></div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php get_footer(); ?>
