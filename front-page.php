<?php get_header(); ?>
<?php /*front page slider*/ ?>

<div class="main-banner">
  <div class="full-width">
    <?php //putRevSlider( '2017-09-18-homeslider' ); ?>
    <!--slider-->
    <?php get_template_part('section/breadcrumbs'); ?>
    <?php get_template_part('section/frontpage','slider'); ?>   

  </div>
</div>
<div class="main-content container homepage-main">
  <div class="row">
    <div id="main" class="main-column col-md-9 category-columns">

      <div class="row">
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'makeup'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('makeup'));?>"><span>View More</span></a></div>
        </div>
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'skincare'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('skincare'));?>"><span>View More</span></a></div>
        </div>
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'hair'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('hair'));?>"><span>View More</span></a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'spas'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('spas'));?>"><span>View More</span></a></div>
        </div>
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'salons'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('salons'));?>"><span>View More</span></a></div>
        </div>
        <div class="col-md-4 col-sm-4">
          <?php bi_display_brand(array('category_name'=>'wellness'));?>
          <div class="readmore readmore-cat"><a href="<?php echo get_category_link( get_cat_ID('wellness'));?>"><span>View More</span></a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 recommended-columns">
          <h3 class="pink-dashed"><span>Recommended</span></h3>
          <div class="featured-container slick-slider-four" id="featured-carousel">
            <?php bi_display_featured();?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 class="pink-dashed"><span>Watch Videos</span></h3>
          <div class="featured-video-container slick-slider-three" id="video-carousel">
            <?php bi_display_popular_videos();?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h3 class="pink-dashed"><span>Review Now</span></h3>
          <div class="featured-video-container" id="products-carousel">
            <?php get_template_part('section/frontpage','reviewnow'); ?> 
          </div>
        </div>
      </div>

       <div class="row">
        <div class="col-md-12">
          <h3 class="pink-dashed"><span>Review Now</span></h3>
          <div class="featured-video-container" id="products-carousel">
            <?php get_template_part('section/frontpage','reviewestablishments'); ?> 
          </div>
        </div>
      </div>

      <?php /*
      <div class="row">
        <div class="col-md-12">
          <h3 class="pink-dashed" style="margin-bottom:8px;"><span>Beauty Treatments</span></h3>
          <div class="text-center">
            <p><span style="text-transform: none; font-size: 15px;">brought to you by <a href="http://www.aestheticsandbeauty.com/" target="_blank" rel="noopener noreferrer"><img class="alignnone" src="/wp-content/uploads/2016/05/AB-SG-logo.png" alt="" width="139" height="34"></a></span></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 treatments-column">
          <div> <a href="http://www.aestheticsandbeauty.com/treatment/anti-ageing-treatment/" target="_blank"> <img class="img-responsive" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2014/09/anti-aging.jpg" alt="anti aging treatments" title="anti aging treatments"></a>
            <h3><a href="http://www.aestheticsandbeauty.com/treatment/anti-ageing-treatment/" target="_blank" rel="noopener noreferrer"> ANTI-AGING</a></h3>
            <p>Find the latest non-invasive treatments that fight lines and hyperpigmentation even before they appear. It’s never too early to start your anti-aging regimen!</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 treatments-column">
          <div> <a href="http://www.aestheticsandbeauty.com/treatment_category/body/" target="_blank"> <img class="img-responsive" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2014/09/slimming.jpg" alt="slimming treatments" title="slimming treatments"></a>
            <h3><a href="http://www.aestheticsandbeauty.com/treatment_category/body/" target="_blank" rel="noopener noreferrer">SLIMMING</a></h3>
            <p>Break down stubborn fat cells, or smooth cellulite and stretchmarks that stay long after you’ve lost the pounds.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 treatments-column">
          <div> <a href="http://www.aestheticsandbeauty.com/treatment/skin-whitening-rejuvenation/" target="_blank"> <img class="img-responsive" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2014/09/brightening.jpg" alt="brightening treatments" title="brightening treatments"></a>
            <h3><a href="http://www.aestheticsandbeauty.com/treatment/skin-whitening-rejuvenation/" target="_blank" rel="noopener noreferrer">BRIGHTENING</a></h3>
            <p>Find treatments that help fade scars, discoloration, and dullness. Reveal your fairest, most radiant skin yet!</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 treatments-column">
          <div> <a href="http://www.aestheticsandbeauty.com/treatment_category/body/" target="_blank"> <img class="img-responsive" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2014/09/enhancement.jpg" alt="enhancement treatments" title="enhancement treatments"></a>
            <h3><a href="http://www.aestheticsandbeauty.com/treatment_category/body/" target="_blank" rel="noopener noreferrer">ENHANCEMENT</a></h3>
            <p>Find professional, credible and discreet doctors who will work with you to create the body you’ve dreamed of.</p>
          </div>
        </div>
      </div>
      */?>

    </div>
    <div id="sidebar" class="sidebar col-md-3">
      <div class="container-sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 treatments-column-content">
      <h2>More Than Just a Singapore Beauty Magazine</h2>
      <p>Beauty Insider is your best source for Singapore beauty reviews on makeup, skincare, haircare, spas and salons. We don’t just give beauty tips and trends — we tell which beauty products and treatments really work!<br>
        Our exclusive Beauty Insider Rewards program also lets you earn points you can exchange for prizes, and the chance to join contests or get special beauty freebies. You can also be selected to join the Beauty Insider Trial team, where you’ll be given beauty samples to review.<br>
        Beauty Insider is your chance to read, discover, and try the best beauty products and treatments in Singapore. Whether you’re looking for a brightening cream, an anti-aging routine, or the latest treatment for acne scars or tighter pores, we are your number one source for Singapore beauty.</p>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="our-partners">
      <div class="col-md-12">
        <h3 class="pink-dashed"><span>Our Partners</span></h3>
      </div>
      <div id="our_partners" class="text-center">
        <div class="col-md-2 col-xs-6 col-sm-4"> <a href="http://justrunlah.com/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/jrl-logo.png" class="img-responsive" alt="just Ran Lah"> </a> </div>
        <div class="col-md-2 col-xs-6 col-sm-4"> <a href="http://www.missuniversesingapore.com.sg/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/MUS-2015-Logo-pink.png" class="img-responsive"  alt="Mus"> </a> </div>
        <div class="col-md-2 col-xs-6 col-sm-4"> <a href="https://www.facebook.com/MissSingaporeBeautyPageant/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/06/miss-singapore-beauty-pageant.png" class="img-responsive"  alt="miss singapore"> </a> </div>
        <div class="col-md-3 col-xs-6 col-sm-6"> <a href="http://www.spaandwellness.org/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/swas-logo.png" class="img-responsive" alt="Spa &amp; Wellness"> </a> </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <a href="http://www.cosmoprof.com.sg/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/cosmo-prof-acad-web.png" class="img-responsive"  alt="Cosnoprof"> </a> </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
