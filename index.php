<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php $format = get_post_format( get_the_id() ); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php get_template_part('format/excerpt');  ?>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <div class="row pagination-row">        
       <?php echo paginate_links(); ?>        
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
