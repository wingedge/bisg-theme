<?php /* Template name: Dev Page */
get_header(); 

$review = new BIReviewer();
?>
<?php get_template_part('section/breadcrumbs'); ?>

<?php if( $BIReview->is_reviewer_login() ):?>

<?php else:?>

<div class="login form">
	<form action="//review.beautyinsider.sg/review/login" method="post" accept-charset="utf-8" _lpchecked="1">
		<div class="form-row">
			<div class="col">				
				<h2 class="form-signin-heading text-center">Please sign in</h2>
				
				<label for="inputEmail" class="sr-only">Email address</label>
				<input id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" type="email">
				<label for="inputPassword" class="sr-only">Password</label>
				<input id="inputPassword" name="password" class="form-control" placeholder="Password" required=""   type="password">
				<input type="hidden" name="returnUrl" value="<?php echo site_url('dev-page');?>"/>
			</div>
			<!--
			<div class="checkbox">
		  		<label>
		    		<input type="checkbox" value="remember-me"> Remember me
		  		</label>
			</div>-->
		</div>
		<div class="form-row">
			<div class="col">
				<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
			</div>
		</div>
		<div class="form-row">
			<div class="col">
				<a href="https://www.facebook.com/v2.10/dialog/oauth?client_id=1203982596374020&amp;state=5ae4e3439fd7b2db73f33247a59972a2&amp;response_type=code&amp;sdk=php-sdk-5.5.0&amp;redirect_uri=http%3A%2F%2Freview.beautyinsider.sg%2Freview%2Flogin&amp;scope=email" class="btn btn-lg btn-outline-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Sign in with FB</a>
			</div>
			<div class="col">
				<a href="//review.beautyinsider.sg/review/register" class="btn btn-lg btn-outline-success">Register</a>     
			</div>
		</div>
	</form>
</div>
<?php endif;?>

<?php get_footer(); ?>
