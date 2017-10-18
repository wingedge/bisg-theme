<?php if ( is_active_sidebar( 'sidebar-article' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-article' ); ?>
<?php else:?>

<div class="row">
  <div class="col-md-12">
    <h3 class="cat-titles"><span>Latest</span></h3>
    <div class="recent-articles">
      <?php bi_display_articles(array('posts_per_page'=>8));?>
    </div>
    <div class="readmore readmore-cat"><a href="<?php echo site_url('/blog/'); ?>"><span>View More</span></a></div>
  </div>
</div>
<div class="row">
<div class="col-md-12">
  <h3 class="cat-titles"><span>You may also like</span></h3>
  <div class="recent-articles">
    <?php 
      $defaultArticles = array(   
      'posts_per_page'  => 4,
      'post_type'     => 'post',    
      );
    ?>
  <?php bi_display_articles($defaultArticles);?>
  </div>
  <div class="readmore readmore-cat"><a href="<?php echo site_url('/products/'); ?>"><span>View More</span></a></div>
</div>

<div class="col-md-12 col-sm-4 s-widget" style="margin-top:20px;">
    <a href="<?php echo site_url('how-to-claim-your-rewards');?>">   
      <img src="<?php bloginfo( 'template_url' ); ?>/img/BI-membership-banner-awards-280x505.jpg" class="img-responsive"/>
    </a>
  </div>
</div>
<?php endif; ?>
