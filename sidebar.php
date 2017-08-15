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
    <div class="recent-review">
      <h1>Recent Reviews</h1>
      <p>Real women talk about products and treaments</p>
      <div class="recent-review-box">
        <img src="img/Shea-Butter-Hand-Cream.jpg"/>
      	<strong>Thick and non sticky</strong>
        <span>L'OCCITANE Shea Butter Hand Cream</span>
        <p>I like how it is non sticky and really thick. Really helped my dry hands to survive in the air-conditioned office or in cold countries. In addition to that, it gets absorbed into my skin really quickly thus it is not sticky at all.<i>Shi Hui Tan</i></p>
      </div>
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
