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
  <div class="col-md-12 col-sm-4 s-widget"> 
  	<!-- <a href="http://beautyinsider.sg/january-2018-awards/"><img src="<?php bloginfo( 'url' ); ?>/wp-content/uploads/2018/01/newgif.gif" class="aligncenter img-responsive"/></a> -->
    <img src="<?php bloginfo( 'url' ); ?>/wp-content/uploads/2018/01/newgif.gif" class="aligncenter img-responsive"/>
  </div>

  <div class="col-md-12 col-sm-4 recent-review s-widget mbc-off2">
    <?php 
        #$review = new BIReviewer();
        global $BIReview;
        $BIReview->render_random_review();
      ?>
  </div>

  <div class="col-md-12 col-sm-4 s-featured-video s-widget mbc-off">
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
  <div class="col-md-12 col-sm-4 s-widget mbc-off2"> <!--<a href="<?php echo site_url('travel-insider');?>">--> 
    <a href="<?php bloginfo( 'url' ); ?>/category/scoop/"><img src="https://beautyinsider.sg/wp-content/uploads/2018/02/scoop-banner.jpg"/ alt="Beauty Insider The Scoop"> </a> </div>
  
  <?php /*<div class="col-md-12 col-sm-4 s-widget mbc-off"> 
    <a href="<?php echo site_url('award-winners');?>"> <img src="<?php bloginfo( 'template_url' ); ?>/img/Award-winners-1.jpeg"/> </a> 
  </div>*/ ?>
</div>
