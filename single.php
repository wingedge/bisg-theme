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
         <div>
          <h3 class="cat-titles pink-dashed" style="text-align:left;"><span>You can check these out as well</span></h3>
          <?php /*set arguments */
            $productArgs = array(
                'posts_per_page'  => 12,
                'post_type'     => 'post',                         
                'file_template'   => 'section/single-related-articles.php',                      
                'orderby' => 'rand',                    
            );
          ?>
          <div class="related-review-container slick-slider-four" id="products-carousel">
            <?php bi_display_articles($productArgs); ?>
          </div>
        </div>
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
