<style type="text/css">
	.yp-p-thumb img{
		width: 100%;
	}

	.yp-p button{
		font-size: 14px;
		color: #222;
		text-transform: capitalize;
	}

</style>				
				<div class="cpdbotpad"></div>

				<!-- grab these rewards -->
				<div class="yp-title1">Grab These rewards</div>
	    		<div class="clearfx"></div>

				<div class="row yp-products">

	    			<?php $rewards = 0; //$BIReview->get_rewards_by_points($user->total_points); ?>
					<?php if($rewards):?>
					<?php foreach($rewards as $reward):?>

					<div class="col-sm-4">
			    		<div class="yp-p">
			    			<a href="http://review.beautyinsider.sg/">
			    				<center>
				    			<div class="yp-p-thumb"><img src="//review.beautyinsider.sg/uploads/rewards/<?php echo $reward->image;?>" /></div>
				    			<button><?php echo $reward->name;?></button>
				    			</center>
				    		</a>
			    		</div>
			    	</div>

			    	<?php endforeach;?>
					<?php else:?>
						<div class="col-sm-12">	
						    <div class="cpdtop"></div>						
							<div class="wmsg cfblink"><p>Watch out for our Next Announcements on <a href="https://www.facebook.com/BeautyInsiderSG/">FB</a></p></div>
						</div>
					<?php endif;?>
			    </div>




				<!-- grab these rewards -->




				<!-- rewards -->


			    <div class="row">
	    			<div class="col-sm-12">
	    				<center>
				    		<div class="yp-ld">	
				    			<a href="<?php bloginfo('url'); ?>/rewards-and-redemption/">Learn more about beauty insider rewards and redemption</a>
				    		</div>
			    		</center>

			    		<center>
				    		<div class="yp-ld">	
				    			<a href="<?php bloginfo('url'); ?>/insider-deals/">Check Out The Latest Insider Deals!</a>
				    		</div>
			    		</center>
			    	</div>

			    </div>


			    <!-- rewards -->

			    <!-- Deal -->

			    <div class="row yp-products">

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

					
	    			<?php  while ( $insiderDeals->have_posts() ) : $insiderDeals->the_post(); ?>

	    			<?php $gt = get_the_title(); if ( $gt != "Expired") { ?>
	    				<div class="col-sm-4">
			    		<div class="yp-p">
			    			<a href="<?php the_permalink();?>">
			    				<center>
				    			<div class="yp-p-thumb"><?php the_post_thumbnail('thumbnail');?></div>
				    			<button><?php the_title();?></button>
				    			</center>
				    		</a>
			    		</div>
			    		</div>
	    			<?php } ?>

	    			

			    	<?php endwhile;?>			    	
			    </div>    		

			    <!-- Deal -->