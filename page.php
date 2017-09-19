<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container sub-page">
  <div class="row">
    <div id="main" class="main-column col-md-9">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <h2 class="content-title sub-content-title"><?php the_title();?></h2>
          <hr class="divider"/>
          <?php the_content(); ?>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
    </div>
    <div class="category-page">
      <div id="all-articles" class="all-articles col-md-3">
        <div>
          <h3 class="cat-titles"><span>Recent Posts</span></h3>
          <?php get_sidebar('category');?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
