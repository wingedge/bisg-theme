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

      <?php if(get_field('guest_author')) : // if it has guest author, show it?>
      
      <div class="clearfix"></div>
      <div class="row" style="margin:30px 0;">
        <div class="col-md-12 guest-author-box">
         <?php $author = get_field('guest_author');?>

         <?php # print_r($author);?>
         <h3>Guest Author</h3>
          <div class="col-md-3 author-image">
            <?php # echo get_avatar($author['ID'],150); ?>
            <?php if (get_field('writer_photo', 'user_'.$author['ID'])):?>
            <img src="<?php the_field('writer_photo', 'user_'.$author['ID']);?>" />
            <?php endif;?>
          </div>
          <div class="col-md-9">
            <div class="author-name"><strong><?php echo $author['display_name'];?></strong></div>
            
            <div class="author-bio"><p><?php echo $author['user_description'];?></p></div>
          </div>

        </div>
      </div>

      <div class="clearfix"></div>
      <?php endif;?>

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
          <div class="related-review-container slick-slider-four singlepost-products-carousel" id="products-carousel"><?php bi_display_articles($productArgs); ?></div>         
        </div>
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
  
</div>
<?php get_footer(); ?>
