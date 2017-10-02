<?php 
/* Template name: Display Products Page */
get_header(); 
	$showCat = get_query_var('showcat');	
?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-3 filter-container">
				<?php get_template_part('section/product','filters');?>
			</div>
			<div class="col-md-9 result-container">
				
				<input type="hidden" show-category="<?php echo $showCat;?>" post-type="product" id="filterDetails"/>

				<h3 class="cat-titles pink-dashed"><span> All Products for <?php echo ucwords($showCat);?></span></h3>
				<div id="filter-results" class="category-product-container product-container brand-container">
					<?php 
						
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;					
						
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> 50,
				    		'category_name'		=> $showCat,
							'post_type'			=> 'product',				    		
				    		'paged'				=> $paged,	
				    		'orderby'			=> 'title',
				    		'order'				=> 'asc',			
						);

						if(isset($_POST['term'])){
							$productArgs['s'] = $_POST['term'];
						}	

						if(isset($_POST['filterCat'])){
							$productArgs['category_name'] = implode(',',$_POST['filterCat']);
						}			    
                	
						$query = new WP_Query( $productArgs );							
					?>
					
					<?php include(locate_template('format/result-item.php')); ?>
					
                </div>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>