<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php language_attributes(); ?>" style="margin-top:0 !important;"> <!--<![endif]-->

<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NWGF4LX');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-touch-icon.png">

<?php wp_head(); ?>
<style>
  html { margin-top:0 !important; }
	.header-wrap{ position:relative; height:161px; /*must match with affix*/}
  body{margin-top:0 !important;}
  body.logged-in {padding-top: 0px !important;}

  <?php the_field('css');?>


  #wpadminbar{display:none;}
  .role-administrator #wpadminbar{display:block;}
</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement( o ),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68704692-1', 'beautyinsider.sg');
  ga('send', 'pageview');
</script>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <?php get_template_part('seo','scheme');?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NWGF4LX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php /* disable the canvass menu 
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
  <?php get_template_part('section/nav','offcanvass');?>
</div>
*/?>

<?php
if ( is_front_page() ) {
  
    if( is_user_logged_in() ) {
      echo '<div style="padding-top:14px;" class="mbc"></div><div style="margin-top:10px;"></div>';      
    }
    else{
      echo '<div style="margin-top:-23px;" class="mbc-off2"></div><div style="margin-top:-22px;" class="mbc"></div>';
    }
} 

else {

   if( is_user_logged_in() ) {
      
      if( is_page() ) {
        
              if( is_page('all-beauty-reviews') || is_page('my-account') || is_page('beauty-wellness-awards-2018-winner') ) {
                echo '<div style="padding-top: 14px;" class="mbc"></div><div style="margin-top:32px;"></div>';
              }

              else{
                echo '<div style="padding-top: 14px;" class="mbc"></div><div style="margin-top:10px;"></div>';
              }
      }

      else{
      
        echo '<div style="padding-top: 14px;" class="mbc"></div><div style="margin-top:32px;"></div>';
      
      }
    }

    else{      
        
        if( is_page() ) {

              if( is_page('insider-deals') || is_page('rewards-and-redemption') || is_page('about-us') || is_page('beauty-wellness-awards-2018-winner')) {
                echo '<div style="padding-top: 14px;" class="mbc"></div><div style="margin-top:-1px;"></div>';
              }

              else{
                echo '<div style="padding-top: 14px;" class="mbc"></div><div style="margin-top:-22px;"></div>';
              }

          
        }

        else{
          echo '<div style="margin-top:-1px;" class="mbc-off2"></div><div style="padding-top:0px;" class="mbc"></div>';
        }
    }

}?>




<div class="cw-above-header mbc">Review and Reward Yourself</div>



<div class="header-wrap">
<div id="masthead" class="site-header" role="banner" data-spy="affix" data-offset-top="161">

  <div class="container mbc-off2">
    <div class="row">
      <div id="site-logo" class="col-sm-6">
        <?php /* disable the canvass menu 
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body"> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        </button>
        */ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_theme_file_uri( '/img/logo.png' ); ?>" class="img-responsive site-logo-img"/> </a> </div>
      <div id="site-topmenu" class="col-sm-6">
        <?php //get_template_part('section/nav','top');?>
        <div id="main-toplink"> 
          <?php global $BIReview;?>
          <ul>
            <!--
            <li><a href="<?php echo site_url('/write-a-review/');?>">Write A Review</a></li>
            -->

            <?php /*
            <?php if( $BIReview->is_reviewer_login() ):?>            
            <li><a href="<?php echo site_url('/my-account/');?>"><i class="fa fa-user"></i> My Account</a></li>            
            <?php else:?>
            <li><a href="<?php echo site_url('/my-account/');?>"><i class="fa fa-sign-in"></i> Login / Signup</a></li>
            <?php endif;?>
            */ ?>

            <?php if( !is_user_logged_in() ):?>
            <!--
            <li><a href="<?php echo site_url('/wp-login.php');?>"><i class="fa fa-sign-in"></i> Login / Signup</a></li>
            -->
            <!--<li><a href="<?php echo site_url('/my-account');?>"><i class="fa fa-sign-in"></i> Login / Signup</a></li>-->
            <!-- 
              <li><a href="<?php echo wp_login_url( site_url('/my-account/') ); ?>" title="Login" data-toggle="modal" data-target="#biLoginModal"><i class="fa fa-sign-in"></i> Login / Signup</a></li>
            -->
            <li><a href="#" title="Login" data-toggle="modal" data-target="#biLoginModal"><i class="fa fa-sign-in"></i> Login / Signup</a></li>

            <?php else:?>
            <?php $current_user = wp_get_current_user();?>
            <li><a href="<?php echo site_url('/my-account/');?>"><i class="fa fa-user"></i> Hi <?php echo $current_user->user_login;?></a></li>      
            <?php endif;?>

            
            <li><a href="<?php echo site_url('/write-a-review/all-beauty-reviews/');?>"><i class="fa fa-child"></i> Read Reviews</a></li>
            <li><a href="<?php echo site_url('/insider-deals/');?>"><i class="fa fa-gift"></i> Insider Deals</a></li>
            <li><a href="<?php echo site_url('/rewards-and-redemption/');?>"><i class="fa fa-star"></i> Rewards and Redemption</a></li>
          </ul>
          <ul>
            <!--<li><a href="<?php echo site_url('/most-popular-videos/');?>"><i class="fa fa-video-camera"></i> Watch Videos</a></li>-->
            <li><a href="<?php echo site_url('/about-us/');?>"><i class="fa fa-heart"></i> About Us</a></li>
            <li><a href="http://professional.beautyinsider.sg/"><i class="fa fa-globe"></i> Professional</a></li> 

            <?php /* if( $BIReview->is_reviewer_login() ):?>            
            <li><a href="//review.beautyinsider.sg/review/logout?returnUrl=<?php echo site_url('my-account');?>"><i class="fa fa-sign-in"></i> Sign out</a></li>            
            <?php endif; */?>

            <?php if( is_user_logged_in() ):?>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-in"></i> Sign Out</a></li>
            <?php endif;?>




          </ul>
        </div>
      </div> 
    </div>
  </div>


  <!---for mobile start-->

  <div class="container mbc">
    <div class="row">

       <div class="col-xs-12">

          <div id="main-nav" class="main-navigation cmmenu mbc">
            <div class="container">             
              <div class="row">
                <?php get_template_part('section/nav','mobile');?>
              </div>
            </div>
          </div>

          <center>
          <div id="site-logo cml">        
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_theme_file_uri( '/img/logo.png' ); ?>" class="img-responsive site-logo-img"/> </a> 
          </div>    
          </center>     

          <?php if( is_user_logged_in() ):?>
          <div class="signinup">
            <a href="<?php echo site_url( 'my-account' ); ?>" title="My Account"><i class="fa fa-user fa-2x" style="padding:4px;"></i></a>
          </div>
          <?php else:?>
          <div class="signinup">
            <a href="#" title="Login" data-toggle="modal" data-target="#biLoginModal"><i class="fa fa-sign-in fa-2x" style="padding:4px;"></i></a>
          </div>
          <?php endif;?>
          

          <div class="clearfix">
          </div>

        </div>      
      
    </div>
  </div>

  <!---for mobile end-->

<div id="main-nav" class="main-navigation clearfix mbc-off2">
            <div class="container">
              <div class="row">
                <?php get_template_part('section/nav','main');?>
              </div>
            </div>
</div>

  
</div>


</div><!--header wrap-->

<div class="main-search clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-4 socialicons"> <span>FOLLOW US ON :</span> 
        <a href="https://www.facebook.com/BeautyInsiderSG/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
        <a href="https://www.instagram.com/beautyinsidersg/" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a> 
        <a href="https://www.youtube.com/channel/UCivBkbF77mVPcpGfgz9dMxA" target="_blank"><i class="fa fa-youtube fa-lg" aria-hidden="true"></i></a> 
        </div>      
      
      <div id="main-search" class="col-md-10 col-sm-9 col-xs-8 search-box">
        <?php /*
        <div class="col-sm-9">
          <input name="" id="posttype_search" placeholder="Search your favourite brands here" type="text">            
        </div>        
        <div class="col-sm-3">
          <button id="bi-search-btn" class="btn btn-block register-btn">Search</button>
        </div>
        <div class="result-box">
          <div id="loading"></div>
          <div id="tagged-posts"></div>
        </div>
        */?>

        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>        
      </div>
    </div>
  </div>
</div>


<?php if( is_user_logged_in() ):?>
<?php 
  // check if the profiles are filled up, if not display this notice
  $current_user = wp_get_current_user();
  $c1 = get_user_meta( $current_user->ID, 'birthday', true );
  $c2 = get_user_meta( $current_user->ID, 'phone', true );
  $c3 = get_user_meta( $current_user->ID, 'address', true );      
?>
  <?php if( empty($c1) || empty($c2) || empty($c3) ):?>
  <div class="user-profile-notification text-center">
    <h4>Complete your beauty <a href="<?php echo site_url('/my-account/#profile-update');?>">profile</a> to earn points</h4>
  </div>
  <?php endif;?>
<?php endif;?>