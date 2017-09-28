<?php if ( is_active_sidebar( 'sidebar-article' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-article' ); ?>
<?php else:?>

<div class="row">
  <div class="col-md-12">
    <h3 class="cat-titles"><span>Recent Articles</span></h3>
    <div class="recent-articles">
      <?php bi_display_articles(array('posts_per_page'=>8));?>
    </div>
    <div class="readmore readmore-cat"><a href="<?php echo site_url('/blog/'); ?>"><span>View More</span></a></div>
  </div>
</div>
<div class="row">
<div class="col-md-12">
  <h3 class="cat-titles"><span>Related Products</span></h3>
  <div class="recent-articles">
    <?php 
				$relatedProducts =  get_the_category();
				foreach($relatedProducts as $relatedProduct){					
					$relatedCategories[] = $relatedProduct->cat_ID;
				}
			?>
    <?php bi_display_articles(array('posts_per_page'=>5,'post_type'=>'product', 'category__and'=>$relatedCategories));?>
  </div>
  <div class="readmore readmore-cat"><a href="<?php echo site_url('/products/'); ?>"><span>View More</span></a></div>
</div>
<?php endif; ?>
