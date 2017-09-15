<?php // primary widget area ?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>

<?php dynamic_sidebar( 'sidebar-main' ); ?>

<?php else:?>
<?php endif; // end primary widget area ?>

<div class="row row-sidebar-wrap">

  <div class="col-md-12 col-sm-12 s-widget">
    <div class="find-exact-what-you-need">
      <h1>Find Exactly What You Need!</h1>
    </div>
  </div>

  <div class="col-md-12 col-sm-4 recent-review s-widget">
      <?php 
        $review = new BIReviewer();
        $review->render_random_review();
      ?>    
  </div>

  <div class="col-md-12 col-sm-4 s-widget">    
    <img src="<?php bloginfo( 'template_url' ); ?>/img/Travel-Insider-Banner.png"/> 
  </div>


  <div class="col-md-12 col-sm-4 s-widget">
    <img src="<?php bloginfo( 'template_url' ); ?>/img/Award-winners-1.jpeg"/>
  </div> 

  <div class="col-md-12 col-sm-4 s-featured-video s-widget">
    <div class="featured-video-container slick-slider-one" id="sidebar-product-carousel">
      <?php $sidebarArgs = array(          
          'posts_per_page'  => 4,
          'post_type'     => 'product',
          'order'       => 'DESC',
          'orderby'     => 'date', 
          'file_template'   => 'section/sidebar-products.php', 
        );

      ?>
      <?php bi_display_products($sidebarArgs);?>
    </div>
  </div>

  <div class="col-md-12 col-sm-4 s-widget">
    <img src="<?php bloginfo( 'template_url' ); ?>/img/BI-membership-banner-awards-280x505.jpg" class="img-responsive"/>
  </div>

</div>


