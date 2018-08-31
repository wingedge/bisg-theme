<?php 
/* Template name: Display Establishments Page */
get_header(); 
	$showCat = get_query_var('showcat');	
?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-3 filter-container">				
				<?php get_template_part('section/establishment','filters');?>		
			</div>
			<div class="col-md-9 result-container">
				
				<input type="hidden" show-category="<?php echo $showCat;?>" post-type="establishment" id="filterDetails"/>

				<h3 class="cat-titles pink-dashed"><span> All Establishments for <?php $str = str_replace("-", " ", $showCat); echo ucwords($str);?></span></h3>
				<div id="filter-results"  class="category-product-container product-container brand-container">
					<?php 
						
						
						$paged = ( get_query_var('pp') ) ? get_query_var('pp') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						echo get_query_var('pp');

						$productArgs = array(
				    		'posts_per_page' 	=> 39,
				    		//'category_name'		=> $showCat,
							'post_type'			=> 'establishment',				    		
				    		'paged'				=> $paged,	
				    		'orderby'			=> 'title',
				    		'order'				=> 'asc',			
				    		'tax_query' => array(
				    			array(
							  		'taxonomy' => 'category',
							        'terms' => $showCat,
							        'field' => 'slug',
							        //'operator' => 'EXISTS',
						  		),	  		
				    		),
						);

						if(isset($_POST['term'])){
							$productArgs['s'] = $_POST['term'];
						}
					    
                	
						$query = new WP_Query( $productArgs );	
						$postCtr=1;
					?>
					
					<?php include(locate_template('format/result-item.php')); ?>
					
                </div>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>