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
									<h2 class="content-title">Sign In to your account</h2>
									<form action="//review.beautyinsider.sg/review/login" method="post">
									<div class="bir-login-form" style="margin-top:10px;">
										<div class="form-group">
											<label for="inputEmail" class="sr-only">Email address</label>
											<input id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" type="email">
										</div>
										<div class="form-group">
											<label for="inputPassword" class="sr-only">Password</label>
											<input id="inputPassword" name="password" class="form-control" placeholder="Password" required=""   type="password">
										</div>										
										<input type="hidden" name="returnUrl" value="<?php echo site_url('my-account');?>"/>

										<div class="form-group">
											<button type="submit" name="login" class="btn btn-primary">Sign In</button>
											<a href="https://www.facebook.com/v2.10/dialog/oauth?client_id=1203982596374020&amp;state=5ae4e3439fd7b2db73f33247a59972a2&amp;response_type=code&amp;sdk=php-sdk-5.5.0&amp;redirect_uri=http%3A%2F%2Freview.beautyinsider.sg%2Freview%2Flogin&amp;scope=email"  class="btn btn-info btn-outline-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Sign in with FB</a> or
											<a href="//review.beautyinsider.sg/review/register" class="btn btn-success">Create an Account</a>     
										</div>

									</div>
									</form>
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