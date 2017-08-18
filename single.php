<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <div class="col-md-12">
            <div class="content-image-banner">
              <?php the_post_thumbnail();?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="content-title">
              <h2>
                <?php the_title();?>
              </h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="content-categories"> <strong>Categories : </strong>
              <?php the_category(); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <div class="row">
      <div class="col-md-12">
        <div class="prev-next-button">
          <span class="next-btn">
            <i class="fa fa-2x fa-arrow-left col-xs-3" aria-hidden="true"></i>
            <span class="col-xs-9"><?php previous_post_link(' %link', '%title'); ?></span>
          </span>
          <span class="prev-btn">
              <span class="col-xs-9"><?php next_post_link('%link', '%title'); ?></span>
              <i class="fa fa-2x fa-arrow-right col-xs-3" aria-hidden="true"></i>
            </span>
        </div>
      </div>
    </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3">
      <div class="row">
        <div class="col-md-12">
          <h3 class="cat-titles"><span>Recent Blogs</span></h3>
        </div>
      </div>
      <?php get_sidebar('articles');?>
    </div>    
  </div>
</div>
<?php get_footer(); ?>
