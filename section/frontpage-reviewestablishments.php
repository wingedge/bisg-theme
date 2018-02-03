<?php 

$categories = array('hair salons','spas', 'beauty salons', 'wellness');

foreach($categories as $getCat):
	$category_id = get_cat_ID( $getCat );
	$catEstab = get_category($category_id);
	$args = array(
		'category_name' 	=> $getCat,
		'posts_per_page' 	=> 1,
		'post_type'			=> array('establishment'),		
		'orderby'			=> 'rand',
	);
	$query = new WP_Query( $args );	
?>


	<?php if ($query->have_posts()) :?>
		<?php while ($query->have_posts()) :?>
	        <?php $query->the_post(); ?>
	        	<div class="col-xs-6 col-sm-3 col-md-3 text-center">
	        		<h3><a href="<?php echo site_url($catEstab->slug.'-establishments');?>"><?php echo ucwords($getCat)?></a></h3>
	        		<a href="<?php echo site_url($catEstab->slug.'-establishments');?>"><span class="review-thumb" style="background-image:url('<?php 
echo get_the_post_thumbnail_url( $post_id, 'medium' ); ?>')"></span></a>
	        	</div>
	    <?php endwhile;?>   
	<?php endif;?>
	<?php wp_reset_postdata();?>

<?php endforeach;?>