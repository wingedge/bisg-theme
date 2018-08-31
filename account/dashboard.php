<div class="row">
	<div class="col-sm-8">
		<div class="yp-title1">ARTICLES Recommended for you</div>

	    <div class="clearfx"></div>

			    <div class="row yp-products">
	    			<?php 				
						$recommendedPost = new WP_Query( array ( 
							'orderby' => 'rand', 
							'posts_per_page' => '3',
							'tax_query' => array(
								array(
							  		'taxonomy' => 'category',
							        'terms' => get_user_meta( $current_user->ID, 'interests', true ),
							        'field' => 'id',
							        //'operator' => 'IN',
						  		),
							) 
						));
					?>

	    			<?php if ($recommendedPost->have_posts()) : while ( $recommendedPost->have_posts() ) : $recommendedPost->the_post();?>   

	    			<div class="col-sm-4">
			    		<div class="yp-p text-center">			    						    			
				    		<div class="yp-p-thumb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail');?></a></div>
				    		<div class="shorten-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
			    		</div>
			    	</div>

			    	<?php endwhile; endif; wp_reset_postdata();?>
			    </div>

			    <div class="row">
			    	<div class="col-sm-12">
			    		<a href="<?php bloginfo('url'); ?>/all-articles/"><div class="ctmviewmore">view more</div></a>
			    		<div class="clearfx"></div>
			    	</div>
			    </div>

		<div class="cpdtop"></div>

		<div class="yp-title1">PRODUCTS Recommended for you</div>
	    		<div class="clearfx"></div>


	    		<div class="row yp-products">
	    			<?php 				
						$userConcerns[] = get_user_meta( $current_user->ID, 'skin_concerns', true );
						$userConcerns[] = get_user_meta( $current_user->ID, 'skin_type', true );				
						$recommendedProduct = new WP_Query( array ( 
							'post_type' => 'product',
							'orderby' => 'rand', 
							'posts_per_page' => '3',
							'tax_query' => array(
								array(
							  		'taxonomy' => 'attribute_category',
							        'terms' => $userConcerns,
							        'field' => 'id',
							       // 'operator' => 'EXISTS',
						  		),
							) 
						));
					?>

					<?php if ($recommendedProduct->have_posts()) : while ( $recommendedProduct->have_posts() ) : $recommendedProduct->the_post();?>    

	    			<div class="col-sm-4">
			    		<div class="yp-p">
			    			<a href="<?php the_permalink();?>">
			    				<center>
				    			<div class="yp-p-thumb"><?php the_post_thumbnail('thumbnail');?></div>
				    			<button><a href="<?php the_permalink();?>"><?php the_title();?></a></button>
				    			</center>
				    		</a>
			    		</div>
			    	</div>

			    	<?php endwhile; endif; wp_reset_postdata();?>
			    </div>

		<div class="row">
			<div class="col-sm-12">
				<a href="<?php bloginfo('url'); ?>/products/"><div class="ctmviewmore">view more</div></a>
				<div class="clearfx"></div>
			</div>
		</div>

		<div class="cpdtop"></div>

		<div class="yp-title1">SERVICES YOU MAY LIKE</div>
	    <div class="clearfx"></div>

	    		<div class="row yp-products">
	    			<?php 				
						$recommendedEstablishment = new WP_Query( array ( 
							'post_type' => 'establishment',
							'orderby' => 'rand', 
							'posts_per_page' => '3',
							'tax_query' => array(
								array(
							  		//'taxonomy' => 'attribute_category',
							        //'terms' => $userConcerns,
							        'taxonomy' => 'category',
							        'terms' => get_user_meta( $current_user->ID, 'interests', true ),
							        'field' => 'id'
							       // 'operator' => 'EXISTS',
						  		),
							) 
						));
					?>

		        	<?php if ($recommendedEstablishment->have_posts()) : while ( $recommendedEstablishment->have_posts() ) : $recommendedEstablishment->the_post();?>   

	    			<div class="col-sm-4">
			    		<div class="yp-p">
			    			<a href="<?php the_permalink();?>">
			    				<center>
				    			<div class="yp-p-thumb"><?php the_post_thumbnail('thumbnail');?></div>
				    			<button><a href="<?php the_permalink();?>"><?php the_title();?></a></button>
				    			</center>
				    		</a>
			    		</div>
			    	</div>

			    	<?php endwhile; endif; wp_reset_postdata();?>
			    </div>

		
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php bloginfo('url'); ?>/establishments/"><div class="ctmviewmore">view more</div></a>
				<div class="clearfx"></div>
			</div>
		</div>

		


	</div>

	<div class="col-sm-4">

		<div class="newylr">

		    			<div class="newylr-title">YOUR reviews</div>
			    			<?php $recentReviews = $BIReview->get_reviews_by_user($current_user->ID,5);?>
							<?php if($recentReviews):?>
							<?php foreach($recentReviews as $recentReview):?>
							<?php $reviewedPost = get_post($recentReview->post_id); ?>


							<a href="<?php echo get_post_permalink($recentReview->post_id); ?>">
			    				<div class="newylr-container">
					    			<div class="row">

							    		<div class="col-xs-6">
							    			<?php echo get_the_post_thumbnail($recentReview->post_id, 'thumbnail' );?>
							    		</div>

							    		<div class="col-xs-6">
							    			<div class="newylr-moveleft">
							    				<h5><?php echo $recentReview->title; ?></h5>
							    				<p><?php echo get_the_title($recentReview->post_id); ?></p>
							    				<p><?php echo $recentReview->content; ?></p>
							    			</div>
							    		</div>

							   		 </div>
							   	</div>
							</a>

						<?php endforeach;?>
						<?php else:?>
							<p>No Reviews</p>
						<?php endif;?>

						   	
				    	<div class="row">	
				    			<div class="col-xs-12">			    		
				                	<div class="newylr-viewmore">
				                		<a data-toggle="tab" href="#current-user-reviews">View More</a>				                		
				                	</div>
				                </div>
				        </div>		

		</div>	

		<br>
		<br>

		<div class="newylr">

		    			<div class="newylr-title">Write a new review</div>

		    				<div class="newylr-container">
		    					<div class="container">
				    			<div class="row">
									  	<div class="col-xs-6 wrv">
									  		<a href="<?php bloginfo('url'); ?>/establishments" >
									  			<center><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/02/establishments-150x150.jpg"></center>
									  			<p>Establishments</p>
									  		</a>
									  	</div>

									  	<div class="col-xs-6 wrv">
									  		<a href="<?php bloginfo('url'); ?>/products">
									  			<center><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/02/products-150x150.jpg"></center>
									  			<p>Products</p>
									  		</a>
									  	</div>

								</div>
							</div>

						</div>

		    		
		</div>


		

	</div>

</div>

<div class="row">
	    <div class="col-sm-12">

			<div class="cpdtop"></div>	

		<div class="yp-title1">Read the Latest Beauty News </div>
	    <div class="clearfx"></div>



	    		<div class="row yp-products">
	    			<?php 				
							$latestArticles = new WP_Query( 
								array ( 
								'post_type' => 'post',
								'posts_per_page' => '4',
								) 
							);
						?>

			        <?php if ($latestArticles->have_posts()) : while ( $latestArticles->have_posts() ) : $latestArticles->the_post();?>     

	    			<div class="col-sm-3">
			    		<div class="yp-p">
			    			<a href="<?php the_permalink();?>">
			    				<center>
				    			<div class="yp-p-thumb"><?php the_post_thumbnail('thumbnail');?></div>
				    			<button><a href="<?php the_permalink();?>"><?php the_title();?></a></button>
				    			</center>
				    		</a>
			    		</div>
			    	</div>

			    	<?php endwhile; endif; wp_reset_postdata();?>
			    </div>


	    		

				<div class="row">
					<div class="col-sm-12">
						<a href="<?php bloginfo('url'); ?>/write-a-review/all-beauty-reviews/"><div class="ctmviewmore">view more</div></a>
						<div class="clearfx"></div>
					</div>
				</div>

				<div class="cpdbotpad"></div>
		</div>
</div>

<div class="row">
	    <div class="col-sm-12">
	    	<div class="cpdtop"></div>
	    	<div class="yp-title1">GRAB THE LATEST INSIDER DEALS</div>
		    <div class="clearfx"></div>

		    		<div class="row yp-estab">

		    			<div class="featured-container slick-slider-four" id="featured-carousel">

		    			<?php 				
							$insiderDeals = new WP_Query( 
								array ( 
								'post_type' => 'insider_deals',
								'posts_per_page' => '5',
								) 
							);
						?>

			        	<?php if ($insiderDeals->have_posts()) : while ( $insiderDeals->have_posts() ) : $insiderDeals->the_post();?>    

		    			<div class="col-sm-4">
				    		<div class="yp-e">
				    			<a href="<?php the_permalink();?>">			    					    				
					    			<div class="yp-e-thumb"><?php the_post_thumbnail('thumbnail');?></div>
					    			<div class="yp-e-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>	
					    		</a>
				    		</div>
				    	</div>

				    	<?php endwhile; endif; wp_reset_postdata();?>

				    	</div>
				    	
					</div>

			<div class="row">
			<div class="col-sm-12">
				<a href="<?php bloginfo('url'); ?>/insider-deals/"><div class="ctmviewmore">view more</div></a>
				<div class="clearfx"></div>
			</div>
			</div>

			<div class="cpdbotpad"></div>
	    </div>
</div>



