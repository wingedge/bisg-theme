<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php $format = get_post_format( get_the_id() ); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php 
        $format =  get_post_format(get_the_id());        
        if ( $format ) {
          get_template_part('format/'.$format);
        }else{
          get_template_part('format/post');
        }        

        ?>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <div class="row">
          <div class="prev-next-button">
              <span class="next-btn col-md-6">
                  <i class="fa fa-2x fa-arrow-left col-xs-3" aria-hidden="true"></i>
                  <span class="col-xs-9"><?php previous_post_link(' %link', '%title'); ?></span>
              </span>
              <span class="prev-btn  col-md-6">
                  <span class="col-xs-9">
                  <?php next_post_link('%link', '%title'); ?>
                  </span>
                  <i class="fa fa-2x fa-arrow-right col-xs-3" aria-hidden="true"></i>
              </span>
          </div>
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
