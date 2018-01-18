<?php 
/* Template name: Display Articles Page */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<?php 				
	
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;					

	if(isset($_GET['pp'])){
		$paged=$_GET['pp'];
	}
	
	//$query = new WP_Query( array( 'paged' => $paged ) );
	$showCat = get_query_var('showcat');	
	$productArgs = array(		
		'category_name'		=> $showCat,
		'post_type'			=> 'post',				    		
		'paged'				=> $paged,	
		'orderby'			=> 'title',
		'order'				=> 'asc',		
		'posts_per_page' => '15',
		'tax_query' => array(array(
			'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video','video'),
            'operator' => 'NOT IN'
		)),	
	);

	if($showCat == 'video'){
		$productArgs['tax_query'] = array(
			'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video','video'),
            'operator' => 'IN'
		);
	}

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
      	<?php $format = get_post_format( get_the_id() ); ?>
        <?php          	
          	get_template_part('format/excerpt');
        ?>
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
