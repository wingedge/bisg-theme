<?php // primary widget area ?>
<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-main' ); ?>
<?php else:?>
<div class="row">
  <div class="col-md-12 s-widget">
    <div class="find-exact-what-you-need">
      <h1>Find Exactly What You Need!</h1>
    </div>
  </div>
  <div class="col-md-12 s-widget">
    <div> <img src="<?php bloginfo( 'template_url' ); ?>/img/Travel-Insider-Banner.png"/> </div>
  </div>
  <div class="col-md-12 s-widget">
    <div> <img src="<?php bloginfo( 'template_url' ); ?>/img/Award-winners-1.jpeg"/> </div>
  </div>
  <div class="col-md-12 s-featured-video s-widget">
    <div class="featured-video-container slick-slider-one" id="sidebar-product-carousel">
      <?php bi_display_product_sidebar();?>
    </div>
  </div>
  <div class="col-md-12 s-widget">
    <div> <img src="<?php bloginfo( 'template_url' ); ?>/img/BI-membership-banner-awards-280x505.jpg"/> </div>
  </div>
</div>
<?php endif; // end primary widget area ?>
