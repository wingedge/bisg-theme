<?php // primary widget area ?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>

<?php dynamic_sidebar( 'sidebar-main' ); ?>

<?php else:?>
<?php endif; // end primary widget area ?>
<style>
.s-widget.how-to-claim-your-rewards {
    margin-top: 35px;
}
</style>
<div class="row row-sidebar-wrap">

  <div class="col-md-12 col-sm-12 s-widget">
    <div class="find-exact-what-you-need">
      <h1>Find Exactly What You Need!</h1>
    </div>
  </div>

  <div class="col-md-12 col-sm-4 recent-review s-widget">
      <?php 
        #$review = new BIReviewer();
        global $BIReview;
        $BIReview->render_random_review();
      ?>    
  </div>

  <div class="col-md-12 col-sm-4 s-widget">    
    <a href="<?php echo site_url('travel-insider');?>">
      <img src="<?php bloginfo( 'template_url' ); ?>/img/Travel-Insider-Banner.png"/> 
    </a>
  </div>

  <div class="col-md-12 col-sm-4 s-featured-video s-widget">
    <div class="featured-video-container slick-slider-one" id="sidebar-product-carousel">
      <?php $sidebarArgs = array(          
          'posts_per_page'  => -1,
          'post_type'     => 'product',
          'order'       => 'DESC',
          'orderby'     => 'date', 
          'tax_query' => array(
            array(
            'taxonomy' => 'product_cat',
            'terms' => 'tried-tested-loved',
            'field' => 'slug',
            'operator' => 'IN',
            ), 
          ),
          'file_template'   => 'section/sidebar-products.php', 
        );

      ?>
      <?php bi_display_products($sidebarArgs);?>
    </div>
  </div>

   <div class="col-md-12 col-sm-4 s-widget">
    <a href="<?php echo site_url('award-winners');?>">
      <img src="<?php bloginfo( 'template_url' ); ?>/img/Award-winners-1.jpeg"/>
    </a>
  </div> 

  <div class="col-md-12 col-sm-4 s-widget how-to-claim-your-rewards">

      <!--<img src="<?php bloginfo( 'template_url' ); ?>/img/BI-membership-banner-awards-280x505.jpg" class="img-responsive"/>-->
      <img src="<?php bloginfo( 'url' ); ?>/wp-content/uploads/2017/12/NSGIF.gif" class="img-responsive"/>

  </div>

  <div class="col-md-12 col-sm-4 s-widget">
    <a href="http://www.mapletreemedia.com" target="_blank">   
      <img src="http://beautyinsider.sg/wp-content/uploads/2017/10/MTM-logo-500x500.jpg" class="img-responsive"/>
    </a>
  </div>

  

</div>


