<?php 
/* Template name: Full Width */ 
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container sub-page">
  <div class="row">
    
    <div id="main" class="main-column col-md-12 col-sm-12">
      
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <h2 class="subpage-content-title"><?php the_title();?><hr class="divider"/></h2>
          <?php the_content(); ?>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      
    </div>
    
  </div>
</div>
<?php get_footer(); ?>
