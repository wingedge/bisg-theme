<div class="row">
	<div class="col-md-12"> 
		<h3 class="bir-section-title">Grab these Rewards</h3>
	</div>

	<div class="bir-rewards">
		<?php $rewards = $BIReview->get_rewards_by_points($user->total_points); ?>
		<?php if($rewards):?>
			<?php foreach($rewards as $reward):?>
				<div class="col-md-4 bir-reward-item">
					<strong><?php echo $reward->name;?></strong><br/>
					<div class="reward-image-container">
						<img src="//review.beautyinsider.sg/uploads/rewards/<?php echo $reward->image;?>" class="img-responsive bir-image reward-image"/>
					</div>
					<strong><?php echo $reward->required_points;?></strong><br/>
				</div>
			<?php endforeach;?>
		<?php else:?>
			<p>You don't have enough points to avail any rewards yet</p>
		<?php endif;?>
	</div>
</div>

<div class="row">
	<div class="col-md-6" ><h3 style="padding:10px; background:#ccc; text-align:center;">HOW TO EARN POINTS</h3></div>
	<div class="col-md-6" ><h3 style="padding:10px; background:#ccc; text-align:center;">HOW TO REDEEM YOUR POINTS</h3></div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3 class="bir-section-title">Checkout Latest Insider Deals</h3>
	</div>
	<?php 
		$insiderDealsArgs = array(       
			'post_type'     => 'insider_deals',                
			'paged'       => $paged,  
			'orderby'     => 'date',
			'order'       => 'asc',   
			'posts_per_page' => '3',    
			);
			$insiderDeals = new WP_Query( $insiderDealsArgs );  
	?>
	<div class="bir-insider-deals">
		<?php while ( $insiderDeals->have_posts() ) : $insiderDeals->the_post(); ?>
		<div class="col-md-4 bir-insiderdeal-item">
			<a href="<?php the_permalink();?>">
			<?php the_post_thumbnail('medium');?><br/>
			<?php the_title();?>
			</a>    
		</div>
		<?php endwhile;?>
	</div>
</div>