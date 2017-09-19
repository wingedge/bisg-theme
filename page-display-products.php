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
				<h3 class="cat-titles pink-dashed"><span> Filters</span></h3>
				<form  method="post">
					<div class="form-row">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search Product..." name="term"/>					
						</div>
					</div>
					<div class="form-row">
						<div class="form-group">
							<?php 
								$parentCat = get_category_by_slug( $showCat );									
								$childCat = get_term_children( $parentCat->cat_ID, 'category' ); 
							?>														
							<?php foreach($childCat as $childId): ?>
							<?php $curChild = get_category($childId); ?>							
							<?php # print_r($curChild);?>
								<div class="checkbox"> <label> <input type="checkbox" name="filterCat[]" value="<?php echo $curChild->cat_name;?>"> <?php echo $curChild->cat_name;?></label> </div>								
							<?php endforeach; ?>
						</div>
					</div>	
					<div class="form-row">
						<div class="form-group">
							<button type="submit" class="btn btn-default">Filter</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-9 result-container">
				<h3 class="cat-titles pink-dashed"><span> All Products for <?php echo ucwords($showCat);?></span></h3>
				<div class="category-product-container product-container brand-container">
					<?php 
						
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> -1,
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
						$postCtr=1;
					?>
					
					<?php if ($query->have_posts()) : ?>
    					<div class="row category-row">
    					<?php while ($query->have_posts()) :?>       	
        					<?php $query->the_post(); ?>
							<div class="col-md-4 col-sm-4">
								<div id="post-<?php the_ID(); ?>" <?php post_class('featured-brands'); ?>  >
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">									
									<?php if ( !has_post_thumbnail() ): ?>
										<?php #echo bi_get_post_image();?>
									<?php else:?>
										<?php #the_post_thumbnail();?>	
									<?php endif;?>
										
										<div class="brands-title" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
											<span class="fp-title"><?php the_title();?></span>
											
											<!--<span class="icon-review"><i class="fa fa-check-square-o" aria-hidden="true"></i> Review</span>-->
										</div>
									</a>
								</div>
							</div>
							<?php if($postCtr>=3): $postCtr=0;?>								
								</div><div class="row category-row">
							<?php endif;?>
							

        					<?php $postCtr++; ?>
    					<?php endwhile;?>
    					</div>
    					<?php wp_reset_postdata();?>
					<?php endif;?>
					
                </div>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>