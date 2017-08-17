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

						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> -1,
							'post_type'			=> 'product',			    
				    		'category_name' 	=> NULL, //reset
				    		'file_template'	 	=> 'section/category-product.php',		
				    		'column_width'		=> 'col-md-3',
				    		'paged'				=> $paged,		    		
				    		'cat' 				=> $catId,
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
<?php get_footer(); ?>