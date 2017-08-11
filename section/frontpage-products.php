<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="col-md-12">
		<div id="post-<?php the_ID(); ?>" <?php post_class('featured-products'); ?> >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
			<?php if ( !has_post_thumbnail() ): ?>
				<?php echo bi_get_post_image();?>
			<?php else:?>
				<?php the_post_thumbnail();?>	
			<?php endif;?>
				<div class="featured-products-title">
					<span class="fp-title"><?php the_title();?></span>
					<span class="icon-review"><i class="fa fa-check-square-o" aria-hidden="true"></i> Review</span>						
				</div>
			</a>
		</div>
	</div>
</div>