<?php $postCtr=1;?>
<?php if ($query->have_posts()) : ?>
<div class="row">
	
</div>
<div class="row category-row">
<?php while ($query->have_posts()) :?>       	
	<?php $query->the_post(); ?>
	<div class="col-md-4 col-sm-4">
		<div id="post-<?php the_ID(); ?>" <?php post_class('featured-brands result-items'); ?>  >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">									
			<?php if ( !has_post_thumbnail() ): ?>
				<?php #echo bi_get_post_image();?>
			<?php else:?>
				<?php #the_post_thumbnail();?>	
			<?php endif;?>
				
				<div class="brands-title" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
					<span class="fp-title"><?php the_title();?></span>
					
					<!--<span class="icon-review"><i class="fa fa-check-square-o" aria-hidden="true"></i> Review</span>-->
				</div>
			</a>
		</div>
	</div>
	<?php if($postCtr>=3): $postCtr=0;?>								
		</div><div class="row category-row">
	<?php endif;?>
	

	<?php $postCtr++; ?>
<?php endwhile;?>
</div>  					

<?php wp_reset_postdata();?>
<?php endif;?>
