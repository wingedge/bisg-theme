<?php 
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
?>


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
	<input type="hidden" name="returnUrl" value="<?php echo $current_url;?>"/>

	<div class="form-group">
		<button type="submit" name="login" class="btn btn-primary">Sign In</button>
		<a href="http://review.beautyinsider.sg/review/login_via_facebook" style="color:#fff;"  class="btn btn-info btn-outline-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Sign in with FB</a> or
		<a href="//review.beautyinsider.sg/review/register" style="color:#fff;" class="btn btn-success">Create an Account</a>     
	</div>

</div>
</form>