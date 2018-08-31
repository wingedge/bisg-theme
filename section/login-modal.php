<style>
@import url('https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps');
.login-modal .modal-login-area {
    padding-bottom: 25px;
}
.login-modal .modal-dialog {
    max-width: 600px;
}
.login-modal .modal-content {
	background: #fff;
	border: 1px solid #111;
	border-radius: 0;
	padding: 0;
	margin: 0;
}
.modal-login-logo {
	max-width: 250px;
	margin: 0 auto;
	display: block;
	padding-top: 0;
	padding-bottom: 15px;
}
.modal-logi-title {
	font-family: Playfair Display;
	padding: 0;
	margin: 0;
	margin-bottom: 0px;
	text-align: center;
	font-size: 39px;
	color: #111;
	display: block;
	margin-bottom: 15px;
}
.modal-logi-subtitle {
    background: #e80062;
    color: #fff;
    text-align: center;
    font-weight: 100;
    font-size: 23px;
    padding: 15px 0;
    margin: 0 -15px;
        margin-bottom: 0px;
    margin-bottom: 0px;
    margin-bottom: 25px;
    font-weight: 400;
    letter-spacing: 1px;
}
.modal-login-btn-signin {
    display: block;
    text-align: center;
    background: #e80062;
	border:2px solid #e80062;
    color: #fff;
    text-transform: uppercase;
    width:95%;
    margin: 0 auto;
    padding: 10px 15px;
    font-size: 21px;
	margin-bottom: 25px;
}
.modal-login-btn-register {
    display: block;
    text-align: center;
    background: #666;
	border:2px solid #666;
    color: #fff !important;
    text-transform: uppercase;
    width:95%;
    margin: 0 auto;
    padding: 10px 15px;
    font-size: 21px;
	margin-bottom: 25px;
}
.modal-login-btn-signin:hover
 {
	background:#fff;
	color: #e80062;
}
.modal-login-btn-register:hover {
	background:#fff;
	color: #666 !important;
}
.login-modal .close {
    opacity: 1 !important;
    height: 73px !important;
    width: auto !important;
}
.modal-logi-forgot {
    display: block;
    text-align: center;
    border-top: 1px solid #111;
    padding-top: 20px;
}
.modal-logi-btns {
    padding: 15px 0;
}
.modal-logi-forgot a {
    color: #e80062;
    font-weight: bold;
}
</style>
<div class="login-modal modal fade" id="biLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><img src="https://beautyinsider.sg/wp-content/uploads/2018/02/closebtn.jpg" alt=""/></span>
        </button>
        <div class="modal-login-area col-md-12"> 
          <img class="modal-login-logo" src="https://beautyinsider.sg/wp-content/themes/bisgtheme/img/logo.png" alt="logo"/>
          <h2 class="modal-logi-title">Welcome back, gorgeous!</h2>
          <h3 class="modal-logi-subtitle">Login and get a chance to enjoy freebies and rewards!</h3>
          <div class="row modal-logi-btns">
          	<div class="col-sm-6"><a href="<?php echo wp_login_url();?>" class="modal-login-btn-signin">Sign In</a></div>
          	<div class="col-sm-6"><a href="<?php echo wp_registration_url(); ?>" class="modal-login-btn-register"> Register</a> </div>
          </div>
          	<span class="modal-logi-forgot">Forget Your Password? <a href="https://beautyinsider.sg/wp-login.php?action=lostpassword">We can help</a></span>
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
