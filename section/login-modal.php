<!--<a data-toggle="modal" data-target="#biLoginModal">
  xxx
</a>
 Modal 
-->
<div class="login-modal modal fade" id="biLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php /*
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      */ ?>
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-login-area col-md-5">
        	
          <?php 
        		/*$loginArgs = array(
				        'echo'           => true,
				        'redirect'       => site_url('/my-account/'),
				        'form_id'        => 'loginform',
				        'label_username' => __( 'Username' ),
				        'label_password' => __( 'Password' ),
				        'label_remember' => __( 'Remember Me' ),
				        'label_log_in'   => __( 'Log In' ),
				        'id_username'    => 'user_login',
				        'id_password'    => 'user_pass',
				        'id_remember'    => 'rememberme',
				        'id_submit'      => 'wp-submit',
				        'remember'       => true,
				        'value_username' => NULL,
				        'value_remember' => false
				  );			
        	   	wp_login_form($loginArgs); */        		
        	?>

          <?php /*echo do_shortcode('[Wow-Facebook-Login]'); */?> 
          <div style="padding:20px;">
            <h3 style="margin-top:40px;margin-bottom:20px;">Welcome back, gorgeous!</h3>
            <a href="<?php echo wp_login_url();?>" class="btn btn-primary btn-block">Sign In</a> <br>
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn-success btn-block"> Register</a>
          </div>
    	
      </div>
    	<div class="modal-showcase-area col-md-7">
    		
    	</div>
    	<div class="clearfix"></div>
      </div>
      <?php /*
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      */ ?>
    </div>
  </div>
</div>