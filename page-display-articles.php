<?php 
/* Template name: Display Articles Page */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<?php 				
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;					
	
	//$query = new WP_Query( array( 'paged' => $paged ) );
	$showCat = get_query_var('showcat');	
	$productArgs = array(		
		'category_name'		=> $showCat,
		'post_type'			=> 'post',				    		
		'paged'				=> $paged,	
		'orderby'			=> 'title',
		'order'				=> 'asc',		
		'posts_per_page' => '70',	
	);

	if(isset($_POST['term'])){
		$productArgs['s'] = $_POST['term'];
	}	

	if(isset($_POST['filterCat'])){
		$productArgs['category_name'] = implode(',',$_POST['filterCat']);
	}			    

	$query = new WP_Query( $productArgs );							
?>

<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php $format = get_post_format( get_the_id() ); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php 
        $format =  get_post_format(get_the_id());        
        get_template_part('format/video');
        ?>
      </div>
      <?php endwhile; // End the loop. Whew. ?>     
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
