<div class="row recent-article-row recent-article-row-<?php echo $postCtr;?>">
  <div id="post-<?php the_ID(); ?>" <?php post_class('recent-article-post'); ?>>
    <div>
    <div class="col-md-4 col-sm-3 recent-article-thumb">
      <a href="<?php the_permalink();?>" title="<?php the_title();?>">      
      <?php the_post_thumbnail('thumbnail');?>      
      </a>
    </div>
    <div class="col-md-8 col-sm-9 recent-article-title"> <a href="<?php the_permalink();?>" title="<?php the_title();?>"> <span class="fp-title">
      <?php the_title();?>
      </span> </a>
    </div>
    </div>
  </div>
</div>
