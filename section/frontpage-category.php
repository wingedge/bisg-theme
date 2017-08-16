<?php if ($postCtr <= 1): // do alternate style because style 1 is used ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('category-container'); ?> >
  <div class="front-category-image category-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
    <h4 class="category-title"> <a href="<?php echo $brandUrl;?>" class="category-link"><?php echo $args['category_name']; ?></a> </h4>
    <div class="category-article">
      <div class="category-article-title"> <a href="<?php the_permalink();?>">
        <?php the_title();?>
        </a> </div>
    </div>
  </div>
</div>
<?php else:?>
<div id="post-<?php the_ID(); ?>" <?php post_class('category-mini-container'); ?> >
  <div class="row">
    <div class="col-xs-4 category-thumbnail-mini"> <a href="<?php the_permalink();?>" class="scale-image">
      <?php if ( !has_post_thumbnail() ): ?>
      <?php echo bi_get_post_image();?>
      <?php else:?>
      <?php the_post_thumbnail();?>
      <?php endif;?>
      </a> </div>
    <div class="col-xs-8 category-mini-article"><a href="<?php the_permalink();?>">
      <?php the_title();?>
      </a></div>
  </div>
</div>
<?php endif;?>
