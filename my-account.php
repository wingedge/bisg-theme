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
						
						<?php if(is_user_logged_in()):?>

						<?php
							// Set the Current Author Variable $curauth
							$current_user = wp_get_current_user();
							$cur_email = $current_user->user_email;
						?>


						<?php $user = $BIReview->get_user_profile($cur_email); ?>
						<div class="col-md-3 text-center">
							<div class="bir-profile">
								<img src="<?php echo $user->avatar;?>" class="img-responsive reviewer-avatar"/>	
							</div>
							<div class="bir-name">
								<strong><?php echo ucwords($user->first_name);?></strong>
							</div>
							<div class="bir-points">
								<ul class="list-group avatar-details">  										
									<li class="list-group-item"><strong>Points : <?php echo $user->total_points;?> points</strong></li>
									<li class="list-group-item"><strong>Level : <?php echo $user->level;?></strong></li>
								</ul>
							</div>

							<div class="profile-tabs navigation-tabs col-xs-12">
								<ul class="nav nav-pills nav-stacked">
  									<li><a data-toggle="tab" href="#profile-dashboard">My Account</a></li>
  									<li class="active"><a data-toggle="tab" href="#profile-update">My Profile</a></li>
  									<li><a data-toggle="tab" href="#profile-redemptions">My Redemptions</a></li>
  									<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Sign Out</a></li>
								</ul>
							</div>

						</div>										
						
						<div class="col-md-9 reviewer-profile">
							<div class="tab-content">

  								<div id="profile-dashboard" class="tab-pane fade">
									<?php include(locate_template('account/dashboard.php'));?>
								</div>
								<div id="profile-update" class="tab-pane fade in active">
									<?php include(locate_template('account/myprofile.php'));?>
								</div>
  								<div id="profile-redemptions" class="tab-pane fade">
									<?php include(locate_template('account/redemptions.php'));?>
								</div>

							</div>

							<?php include(locate_template('account/rewards.php'));?>

						</div>			

						<?php else:?>

							<div class="bilogin">
								<div class="col-md-4 col-md-offset-4">
									<h2 class="content-title">Sign In to your account</h2>
									<?php $fargs = array(
							        'echo' => true,							        
							        'form_id' => 'loginform',
							        'label_username' => __( 'Username' ),
							        'label_password' => __( 'Password' ),
							        'label_remember' => __( 'Remember Me' ),
							        'label_log_in' => __( 'Log In' ),
							        'id_username' => 'user_login',
							        'id_password' => 'user_pass',
							        'id_remember' => 'rememberme',
							        'id_submit' => 'wp-submit',
							        'remember' => true,
							        'value_username' => NULL,
							        'value_remember' => false );
							        ?>
									<?php wp_login_form($fargs); ?>		
									<br/>
									<?php echo do_shortcode('[Wow-Facebook-Login]');?>							
									<p>- or -</p>
									<a href="http://beautyinsider.sg/wp-login.php?action=register" class="btn btn-success btn-large">Register Now</a>


								</div>
							</div>

						<?php endif;?>


						<?php /*

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

						*/ ?>


					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
	</div>
</div>


<script>
	// Test for the ugliness.
	if (window.location.hash == '#_=_'){

		window.location.href("http://beautyinsider.sg/my-account/");

	    // Check if the browser supports history.replaceState.
	    if (history.replaceState) {

	        // Keep the exact URL up to the hash.
	        var cleanHref = window.location.href.split('#')[0];

	        // Replace the URL in the address bar without messing with the back button.
	        history.replaceState(null, null, cleanHref);

	    } else {

	        // Well, you're on an old browser, we can get rid of the _=_ but not the #.
	        window.location.hash = '';

	    }

	}
	</script>
<?php get_footer(); ?>