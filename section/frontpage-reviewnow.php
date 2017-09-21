<?php 

$categories = array('makeup','skincare','hair','body');

foreach($categories as $getCat):
	$category_id = get_cat_ID( $getCat );
	$args = array(
		'category_name' 	=> $getCat,
		'posts_per_page' 	=> 1,
		'post_type'			=> array('product'),		
		'orderby'			=> 'rand',
	);
	$query = new WP_Query( $args );	
?>


	<?php if ($query->have_posts()) :?>
		<?php while ($query->have_posts()) :?>
	        <?php $query->the_post(); ?>
	        	<div class="col-xs-6 col-sm-3 col-md-3 text-center">
	        		<h3><a href="<?php echo get_category_link( $category_id ); ?>"><?php echo ucwords($getCat)?></a></h3>
	        		<a href="<?php echo get_category_link( $category_id ); ?>"><?php the_post_thumbnail();?></a>
	        	</div>
	    <?php endwhile;?>   
	<?php endif;?>
	<?php wp_reset_postdata();?>

<?php endforeach;?>