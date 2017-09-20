<?php 
/* Template name: Products Page */
get_header(); ?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<h3 class="cat-titles pink-dashed"><span>Products</span></h3>
				<div class="category-product-container product-container">
					<?php						
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> -1,
							'post_type'			=> 'product',			    
				    		'category_name' 	=> NULL, //reset			    		
				    		'paged'				=> $paged,							
				    		'orderby'			=> title,
				    		'order'				=> asc,
						);					    
                	
						$query = new WP_Query( $productArgs );	
						$postCtr=1;
					?>

					<div id="product-list">
						<div class="row">
							<div class="form-group col-md-10 col-sm-9 col-xs-8">											
								<input class="search form-control" placeholder="Find product..." />								
							</div>
							<div class="form-group col-md-2 col-sm-3  col-xs-4 sortbtn-wrap">			
	  							<span class="sort btn btn-info register-btn" data-sort="name">Sort by Name</span>
	  						</div>
  						</div>

  						<!--<span class="sort" data-sort="city">Sort by city</span>-->											
					
					<?php if ($query->have_posts()) : $postCtr=1;?>
    					<div class="scroller-box" style="max-height:400px; overflow:auto;">
	    					<ul class="list filter-list list-group">
	    					<?php $currentLetter = '';?>
	    					<?php while ($query->have_posts()) :?>
	        					<?php $query->the_post(); ?>
	        					<li class="filter-list-item list-group-item" data-id="<?php echo $postCtr;?>">        					
									<a href="<?php the_permalink();?>" class="link name" title="<?php the_title();?>">
										<?php the_title();?>								
									</a>
								</li>
								<?php $postCtr++; ?>
	    					<?php endwhile;?>
	    					</ul>
    					</div>
    					<?php wp_reset_postdata();?>
					<?php endif;?>

					</div><!-- end of list-->

					<script>
						$j = jQuery.noConflict();
						$j(document).ready(function(){
							var options = {
							  valueNames: [
							    'name',
							 //   'born',
							    { data: ['id'] },
							 //   { name: 'timestamp', attr: 'data-timestamp' },
							 //  { name: 'link', attr: 'href' },
							 //   { name: 'image', attr: 'src' }
							  ]
							};

							var productList = new List('product-list', options);

							//productList.on('sortComplete',function(){								
							//});						

						});				
					</script>
					
                </div>
			</div>
			<div id="all-articles" class="all-articles col-md-3 col-sm-4">
				<h3 class="cat-titles"><span>Recent Posts</span></h3>
          		<?php get_sidebar('category');?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>