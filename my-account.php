<?php 
/* Template name: My Account */
get_header(); ?>
<?php /*
<style>
.accnt-login > div, .accnt-register > div {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #efefef;
  border-radius: 5px;
  padding: 25px;
  min-height: 450px;
}
.accnt-login > div form, .accnt-register > div form {
  margin-top: 25px;
}
.accnt-login > div form input, .accnt-register > div form input {
  border: 1px solid #ccc;
  color: #444;
  display: block;
  font-weight: 300;
  padding: 10px;
  width: 100%;
}
.accnt-login > div form label, .accnt-register > div form label {
  font-size: 18px;
  font-weight: 300;
}
.my-account .login-remember input {
  display: inline-block !important;
  width: inherit !important;
}
.accnt-login > div form input[type="submit"],
.accnt-register > div form input[type="submit"]
{
	
background: rgb(224,47,120); 
	background: -moz-linear-gradient(top, rgba(224, 47, 120, 1) 0%, rgba(226, 67, 134, 1) 100%); 
	background: -webkit-linear-gradient(top, rgba(224, 47, 120, 1) 0%, rgba(226, 67, 134, 1) 100%);
	background: linear-gradient(to bottom, rgba(224, 47, 120, 1) 0%, rgba(226, 67, 134, 1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e02f78', endColorstr='#e24386', GradientType=0 ); 
	border-radius: 1px;
	color: #fff;
	display: block;
	font-family: "Saira Extra Condensed", sans-serif;
	font-size: 19px;
	line-height: 32px;
	margin: 10px 0;
	padding: 0 10px;
	text-align: center;
	text-transform: uppercase;
	border:1px solid #e94c8e;
	text-decoration:none;
	transition: all 400ms ease;
}
.accnt-login > div form input[type="submit"]:hover,
.accnt-register > div form input[type="submit"]:hover {
	
background: rgb(224,89,145); 
	background: -moz-linear-gradient(top, rgba(224, 89, 145, 1) 0%, rgba(224, 47, 120, 1) 100%); 
	background: -webkit-linear-gradient(top, rgba(224, 89, 145, 1) 0%, rgba(224, 47, 120, 1) 100%);
	background: linear-gradient(to bottom, rgba(224, 89, 145, 1) 0%, rgba(224, 47, 120, 1) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e05991', endColorstr='#e02f78', GradientType=0 ); 
	color:#fff;
}
</style>
*/ ?>
<?php get_template_part('section/breadcrumbs'); ?>



<div class="main-content container sub-page my-account">
	<div class="row">
		<div id="main" class="main-column col-md-12">		

			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">					
						
							
							<div class="col-md-12">
								<div>
									<h2 class="content-title">First Time Here? Create your account</h2>
									<p>not available at the moment, please come back soon.</p>
								</div>
							</div>
						
							<?php /*
							<div class="col-md-6 accnt-login"><div>
								<h2 class="content-title">Login</h2>
								<?php wp_login_form(); ?>
							</div></div>
							<div class="col-md-6 accnt-register"><div>
								<h2 class="content-title">First Time Here? Create your account</h2>
								<?php wp_login_form(); ?>
							</div></div>
							*/ ?>
							
							<?php 

								//bi_api_call();
							
							?>	
													
						
					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>