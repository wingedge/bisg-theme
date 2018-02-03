<?php 
/* Template name: My Account */
get_header(); ?>

<?php get_template_part('section/breadcrumbs'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-notices text-center">
		<?php 
		//echo 'Profile Updated';		
		if ( isset($_REQUEST['updated']) ){				
				// check if its the profile
				global $BIReview;

				if( $_REQUEST['updated'] == 1 && !isset($_REQUEST['user_action']) ){
					if( $BIReview->check_and_add_points('added avatar',20) ){
						echo '<strong>Updated your Avatar, 20 points added</strong>';	
					}					
				}
				if( $_REQUEST['updated'] == 1 && isset($_REQUEST['user_action']) ){
					// check if profile is complete
				  	$current_user = wp_get_current_user();
				 	$c1 = get_user_meta( $current_user->ID, 'birthday', true );
				  	$c2 = get_user_meta( $current_user->ID, 'phone', true );
				  	$c3 = get_user_meta( $current_user->ID, 'address', true );    

					if( empty($c1) || empty($c2) || empty($c3) ){
						if ( $BIReview->check_and_add_points('completed profile',20) ){
							echo '<strong>Updated your Profile, 20 points added</strong>';	
						}
					}
				}
				
				if(isset($_POST['password']) && !empty($_POST['password'])){
					echo '<strong>You have changed your password</strong>';
				}
			}
		?>
		</div>

	</div>

	<div class="row">
		<div id="main" class="main-column col-md-12">	
			<div class="cpdtop"></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="entry-content">	
						
						<?php if(is_user_logged_in()):?>

						<?php
							// Set the Current Author Variable $curauth
							$current_user = wp_get_current_user();
							$user_id = get_current_user_id();
							$cur_email = $current_user->user_email;

							$user = $BIReview->get_user_profile($cur_email); 

						?>



					    <div class="col-sm-3">
					    	<div class="yp">					    		
						    	<div class="yp-title">
						    		Your profile
						    	</div>

						    	<div class="yp-pic">
						    		<!--<img src="<?php echo get_avatar_url( $current_user->ID ); ?>" />-->
						    		<div class="edav"><a data-toggle="tab" href="#profile-avatar">Edit Avatar</a></div>
						    		<?php echo get_avatar($current_user->ID); ?>						    		
						    	</div>

						    	<div class="yp-body profiletabs">
						    		<h1><?php echo ucwords($current_user->first_name);?></h1>

						    		<h2><span><?php echo $user->total_points;?></span> points</h2> 
						    		<h4>member level: <?php echo $user->level;?></h4>

						    		
						    		<h3 class="active"><a data-toggle="tab" href="#profile-dashboard">My Account</a></strong></h3>
						    		<h3><a data-toggle="tab" href="#profile-update">My Profile</a></h3>
						    		<h3><a data-toggle="tab" href="#profile-points">My Points History</a></h3>
						    		<h3><a data-toggle="tab" href="#profile-redemptions">My Redemptions</a></h3>
						    		<h3><a href="<?php echo wp_logout_url( home_url() ); ?>">Sign Out</a></h3>

						    	</div>
						    </div>
					    </div>


					    <div class="col-sm-9 reviewer-profile">

					    	
								<div class="tab-content">

	  								<div id="profile-dashboard" class="tab-pane fade in active">
										<?php include(locate_template('account/dashboard.php'));?>
									</div>

									<div id="profile-update" class="tab-pane fade">
										<?php include(locate_template('account/myprofile.php'));?>
									</div>

	  								<div id="profile-redemptions" class="tab-pane fade">
										<?php include(locate_template('account/redemptions.php'));?>
									</div>

									<div id="profile-avatar" class="tab-pane fade">
										<?php include(locate_template('account/avatar.php'));?>
									</div>

									<div id="profile-points" class="tab-pane fade">
										<?php include(locate_template('account/points.php'));?>
									</div>


								</div>

									<?php include(locate_template('account/rewards.php'));?>


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
						</div>
					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
	</div>
</div>
<?php /*
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
*/ ?>
<?php get_footer(); ?>