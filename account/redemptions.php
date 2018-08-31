

		<div class="cpdtop"></div>
		<div class="yp-title1 mintop20">My Redemptions</div>
		<div class="clearfx"></div>
		
		<div class="cpdtop"></div>
		
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
					<div class="wmsg">
						<p>You have not redeemed any rewards yet</p>
					</div>

					<div class="cfblink">
						Look out for our Announcement on  <a href="https://www.facebook.com/BeautyInsiderSG/">FB</a> for the next Redemption
					</div>

				<?php endif?>
			</div>
<div class="cpdbotpad"></div>
