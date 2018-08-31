<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( have_posts() ) : the_post(); ?>      
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php get_template_part('format/excerpt');  ?>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <div class="row pagination-row">        
       <?php echo paginate_links(); ?>        
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
  		<div style="margin-top:25px">
       	 <a href="http://beautyinsider.sg/january-2018-awards/"><img src="<?php bloginfo( 'url' ); ?>/wp-content/uploads/2018/01/newgif.gif" class="aligncenter img-responsive" style="margin:0!important"/></a> 
        </div>
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
