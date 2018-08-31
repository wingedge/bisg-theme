<?php 
/* Template name: All Reviews */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container sub-page">
  <div class="row">
    <div id="main" class="main-column col-md-12">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          
            <div class="col-md-12">
              <h2 class="content-title">
                <?php the_title();?>
              </h2>
              <div class="row row-reviews">               
              <!---->
              <?php 
                //$review = new BIReviewer();
                $BIReview->render_reviews(array('column-size'=>'col-md-6'));
              ?>
              </div>              
              <?php the_content(); ?>
            </div>
         
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
<div class="row pagination-row filter-page">

      <?php        
                $paged = ( get_query_var( 'pp' ) ) ? get_query_var( 'pp' ) : 1;         
                $total_pages = $BIReview->get_all_review_count();
                
                $paginateArgs = array(      
                  'format' => '?pp=%#%',
                  'current' => $paged,
                  'total' => $total_pages,
                );
                echo paginate_links($paginateArgs); 
              ?>    
              </div>    

    </div>
</div>
</div>
<?php get_footer(); ?>
