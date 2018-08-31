<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content single-product-wrap">
  <div id="main" class="main-column brand-column">
    <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if( has_term('Featured', 'brand-category') ):?>
      <div class="entry-content brand-container">
        <?php the_content();?>
      </div>
      <?php else:?>
      <div class="entry-content container test">
        <?php get_template_part('section/section','brands');?>
      </div>
      <?php endif;?>
    </div>
    <?php endwhile; // End the loop. Whew. ?>
  </div>
</div>
<?php get_footer(); ?>
