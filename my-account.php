<?php 
/* Template name: My Account */
get_header(); ?>

<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container sub-page my-account">
	<div class="row">
		<div id="main" class="main-column col-md-12">		

			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">					
						<?php if( $BIReview->is_reviewer_login() ):?>
							<?php $user = $BIReview->get_user_profile(); ?>
								<div class="col-md-12">
									<h2 class="content-title">Welcome back <?php echo ucwords($user->first_name);?></h2>
								</div>
							
								<div class="col-md-2 avatar-section">
									<img src="<?php echo $user->avatar;?>" class="img-responsive reviewer-avatar"/>
								</div>
							
								<div class="col-md-10 reviewer-profile">
									<ul class="list-group avatar-details">  										
										<li class="list-group-item"><strong>Points : <?php echo $user->total_points;?> points</strong></li>
										<li class="list-group-item"><strong>Level : <?php echo $user->level;?></strong></li>
										<li class="list-group-item"><strong>Member Since : <?php echo date("F d, Y",strtotime($user->date_registered));?></strong></li>
									</ul>
								</div>							
						<?php else:?>					
							<div class="col-md-12">
								<div class="col-md-6 col-md-offset-3">
									<?php get_template_part('section/review','login');?>
								</div>
							</div>
						<?php endif;?>													
					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>