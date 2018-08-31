<?php 
/* Template name: Insider Deals page */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<?php         
  
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;         

  if(isset($_GET['pp'])){
    $paged=$_GET['pp'];
  }
  
  //$query = new WP_Query( array( 'paged' => $paged ) );  
  $insiderDealsArgs = array(       
    'post_type'     => 'insider_deals',                
    'paged'       => $paged,  
    'orderby'     => 'date',
    'order'       => 'asc',   
    'posts_per_page' => '20',    
  );
  $query = new WP_Query( $insiderDealsArgs );              
?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php $format = get_post_format( get_the_id() ); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-4">
            <div class="content-image-banner">             
              <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail('medium_large');?>
              </a>              
            </div>
          </div>
          <div class="col-md-8">
            <div class="content-title">
              <h2>
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
              </h2>
            </div>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
            <!-- <div class="readmore" style="text-align:left;"><a href=""><span>Read More and Win</span></a></div> -->
            <div class="readmore readmore-cat"><a href="<?php the_permalink();?>"><span>Read More and Win</span></a></div>
          </div>
        </div>

      </div>
      <?php endwhile; // End the loop. Whew. ?>     

      <div class="row pagination-row">        

        <?php        
    $paginateArgs = array(      
      'format' => '?pp=%#%',
      'current' => $paged,
      'total' => $query->max_num_pages
    );
        echo paginate_links($paginateArgs); 
       ?>        
      </div>

    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>

