<?php 
/* Template name: Brands Page */
get_header(); ?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-9">
				<h3 class="cat-titles pink-dashed"><span><?php ucwords(single_cat_title());?> Brands</span></h3>
				<div class="category-product-container product-container brand-container">
					<?php 						
						
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> -1,
							'post_type'			=> 'brand',				    		
				    		'paged'				=> $paged,	
				    		'orderby'			=> 'title',
				    		'order'				=> 'asc',			
						);
					    
                	
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
										
										<div class="brands-title" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'medium_large');?>');">
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
			<div id="all-articles" class="all-articles col-md-3">
				<h3 class="cat-titles"><span>Recent Posts</span></h3>
          		<?php get_sidebar('category');?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>