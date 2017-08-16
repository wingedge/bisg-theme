<?php get_header(); ?>

<div class="main-content container">
	<div class="row">
		<?php bi_breadcrumbs();?>
	</div>
	<div class="row">
		<div id="category-main-slider" class="category-main-slider col-md-5">
			<h3><?php ucwords(single_cat_title());?></h3>

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

		</div>
		<div id="category-articles" class="category-articles col-md-4">
			<h3>Latest in <?php ucwords(single_cat_title());?></h3>
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
		</div>
		<div id="all-articles" class="all-articles col-md-3">
			<?php get_sidebar('category');?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 category-videos">
			<h3><?php ucwords(single_cat_title());?> Videos</h3>
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
			
		</div>
		<div class="col-md-6">
			<h3><?php ucwords(single_cat_title());?> Products</h3>			
			<div class="category-video-containers row">
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
		</div>
	</div>
</div>

<?php get_footer(); ?>