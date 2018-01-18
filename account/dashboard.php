<div class="row">
	<div class="col-md-8">
		<h3 class="bir-section-title">Recommended for you</h3>
		<h4>Articles</h4>
		<ul class="list-group">
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
        			<li class="list-group-item">
        				<div class="row">
        				<div class="col-md-3"><?php the_post_thumbnail('thumbnail');?></div>
        				<div class="col-md-9"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
        				</div>
        			</li>        		
        	<?php endwhile; endif; wp_reset_postdata();?>
		</ul>
		<h4>Products</h4>
		<ul class="list-group">
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
        			<li class="list-group-item">
        				<div class="row">
        				<div class="col-md-3"><?php the_post_thumbnail('thumbnail');?></div>
        				<div class="col-md-9"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
        				</div>
        			</li>        		
        	<?php endwhile; endif; wp_reset_postdata();?>
		</ul>
		<h4>Establishment</h4>
		<ul class="list-group">
			<?php 				
				$recommendedEstablishment = new WP_Query( array ( 
					'post_type' => 'establishment',
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
        	<?php if ($recommendedEstablishment->have_posts()) : while ( $recommendedEstablishment->have_posts() ) : $recommendedEstablishment->the_post();?>        		
        			<li class="list-group-item">
        				<div class="row">
        				<div class="col-md-3"><?php the_post_thumbnail('thumbnail');?></div>
        				<div class="col-md-9"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
        				</div>
        			</li>        		
        	<?php endwhile; endif; wp_reset_postdata();?>
		</ul>
	</div>

	<div class="col-md-4">
		<h3 class="bir-section-title">Your latest reviews</h3>
		<div class="bir-recent-reviews">
			<ul class="list-group">
			<?php $recentReviews = $BIReview->get_reviews_by_user($current_user->ID,5);?>
			<?php if($recentReviews):?>
				<?php foreach($recentReviews as $recentReview):?>
					<li class="list-group-item">
						<?php $reviewedPost = get_post($recentReview->post_id); ?>
						<div class="row">
							<div class="col-md-4">
								<?php echo get_the_post_thumbnail($recentReview->post_id, 'thumbnail', array( 'class' => 'img-responsive' ) );?>
							</div>
							<div class="col-md-8">
								<?php echo date("F d, Y",strtotime($recentReview->date_reviewed));?><br/>
								<strong><?php echo $reviewedPost->post_title;?></strong><br/>
								<?php bi_render_rating($recentReview->rating);?>
							</div>
						</div>					
					</li>
				<?php endforeach;?>
			<?php else:?>
				<p>No Reviews</p>
			<?php endif;?>
			</ul>
		</div>
	</div>
</div>


