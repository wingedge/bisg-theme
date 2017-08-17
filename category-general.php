<?php get_header(); ?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-9">
				<h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?></span></h3>
				<div class="category-product-container product-container">
					<?php 
						
						$category = get_category( get_query_var( 'cat' ) );
						$catId = $category->cat_ID;
						$catSlug = $category->slug;

						$productArgs = array(
				    		'posts_per_page' 	=> 10,
							'post_type'			=> 'product',			    
				    		'category_name' 	=> NULL, //reset
				    		'file_template'	 	=> 'section/category-product.php',				    		
				    		'tax_query' 		=> array( array(
									            'taxonomy' => 'category',
									            'field' => 'slug',
									            'terms' => $catSlug,
									            //'operator' => 'AND'									           
							)) 	
						);
					?>              
                	<?php bi_display_products($productArgs); ?>
                </div>
			</div>
			<div id="all-articles" class="all-articles col-md-3">
				<h3 class="cat-titles"><span>Recent Posts</span></h3>
          		<?php get_sidebar('category');?>
			</div>
		</div>
	</div>
</div>
show products
<?php get_footer(); ?>