<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php language_attributes(); ?>"> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<?php wp_head(); ?>
<style>
html {
	margin-top: 0!important;
}
</style>
</head>
<body <?php body_class(); ?>>
<?php /* disable the canvass menu 
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
  <?php get_template_part('section/nav','offcanvass');?>
</div>
*/?>
<div class="canvas">
<div id="masthead" class="site-header" role="banner" data-spy="affix" data-offset-top="250">
  <div class="container">
    <div class="row">
      <div id="site-logo" class="col-sm-6">
        <?php /* disable the canvass menu 
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body"> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        </button>
        */ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_theme_file_uri( '/img/newlogo.png' ); ?>" class="img-responsive site-logo-img"/> </a> </div>
      <div id="site-topmenu" class="col-sm-6">
        <?php //get_template_part('section/nav','top');?>
        <div id="main-toplink"> 
          <ul>
            <li><a href="http://betabisg.mapletreemedia.com/write-a-review/">Write A Review</a></li>
            <li><a href="http://betabisg.mapletreemedia.com/my-account/">My Account</a></li>
            <li><a href="http://betabisg.mapletreemedia.com/all-reviews">Read Reviews</a></li>
            <li><a href="http://betabisg.mapletreemedia.com/insider-deals">Insider Deals</a></li>
          </ul>
          <ul>
            <li><a href="http://betabisg.mapletreemedia.com/most-popular-videos">Watch Videos</a></li>
            <li><a href="http://betabisg.mapletreemedia.com/about-us">About Us</a></li>
            <li><a href="http://betabisg.mapletreemedia.com/professionals">Professional</a></li>
          </ul>
        </div>
      </div> 
    </div>
  </div>
  <div id="main-nav" class="main-navigation clearfix">
    <div class="container">
      <div class="row">
        <?php get_template_part('section/nav','main');?>
      </div>
    </div>
  </div>
</div>
<div class="main-search clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-4 socialicons"> <span>FOLLOW US ON :</span> 
        <a href="https://www.facebook.com/BeautyInsiderSG/"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
        <a href="https://www.instagram.com/beautyinsidersg/"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a> 
        <a href="https://www.youtube.com/channel/UCivBkbF77mVPcpGfgz9dMxA"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a> 
        </div>      
      <div id="main-search" class="col-md-7 col-sm-7 col-xs-5 search-box">
        <input name="" id="posttype_search" placeholder="Search your favourite brands here" type="text">
        <div class="result-box">
          <div id="loading"></div>
          <div id="tagged-posts"></div>
        </div>
      </div>
      <div id="main-registration" class="col-md-3 col-sm-2 col-xs-3 registration-box"><a href="#" class="register-btn">login/register</a></div>
    </div>
  </div>
</div>
