<div class="row">
	<div class="col-md-12">
		<h3 class="bir-section-title">My Redemptions</h3>
	</div>
	<div class="bir-redeem">
		<?php $redeems = $BIReview->get_redemption_by_user($current_user->ID,3);?>
		<?php if($redeems): ?>
			<?php foreach($redeems as $redeem):?>
				<div class="redeem-item col-md-4">
					<strong><?php echo $redeem->name;?></strong><br/>
					<div class="reward-image-container">
						<img src="//review.beautyinsider.sg/uploads/rewards/<?php echo $redeem->image;?>" class="img-responsive bir-image reward-image"/>
					</div><br/>
					<strong>Points Used : <?php echo $redeem->points_used;?></strong>
				</div>
			<?php endforeach;?>
		<?php else: ?>
			<p>You have not redeemed any rewards yet</p>
		<?php endif?>
	</div>
</div>

<?php //$BIReview->update_wp_points(); ?>