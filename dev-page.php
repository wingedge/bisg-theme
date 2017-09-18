<?php 
/* Template name: Dev Page */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>
developer page here <br/><br/>

<?php 

	$argsSlider = array(
		'posts_per_page'=>5,
		/*'category_name' 	=> NULL, //reset		*/
	);					                    	
	$query = new WP_Query( $argsSlider );	
?>

<?php if ($query->have_posts()) : ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	
	<ol class="carousel-indicators">
		<?php $bulletCount = 0;?>
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $bulletCount;?>" class="<?php echo $ctr<=1?'active':'';?>">
			<?php the_post_thumbnail();?>
			<?php the_title();?>
		</li>
		<?php $bulletCount++;?>
		<?php endwhile;?>
		<?php wp_reset_postdata();?>	
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php $ctr=1;?>
	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<div class="item <?php echo $ctr<=1?'active':'';?>">
			<div class="slider-background" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
				<div class="slider-caption">
					<p><?php the_category();?></p>
					<p><?php the_title();?></p>
					<p><?php the_excerpt();?></p>
				</div>	
			

			</div>			
		</div>
	<?php $ctr++;?>
	<?php endwhile;?>
	</div>

	
	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span>
	<span class="sr-only">Previous</span>
	</a>

	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span>
	<span class="sr-only">Next</span>
	</a>
</div>

<?php wp_reset_postdata();?>
<?php endif;?>

<?php get_footer(); ?>