<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>
	<div class="row">
    	<div class="col-md-12">
        	<h3 class="cat-titles"><span>Recent Articles</span></h3>
			<div class="recent-articles">
			<?php bi_display_articles(array('posts_per_page'=>5));?>
			</div>
       	</div>
    </div>

	
	<div class="row">
    <div class="col-md-12">
    	<h3 class="cat-titles"><span>Related Posts</span></h3>
   	</div>       	
    <div class="col-md-12">
   	<div class="recent-articles">
			<?php 
        $relatedProducts =  get_the_category();
        foreach($relatedProducts as $relatedProduct){         
          $relatedCategories[] = $relatedProduct->cat_ID;          
        }
      ?>
      <?php bi_display_articles(array('posts_per_page'=>5,'post_type'=>'post', 'category__and'=>$relatedCategories));?>
    </div>
    </div>
  </div>
<?php endif; ?>