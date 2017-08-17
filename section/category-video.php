<div class="col-md-3">
	<div id="post-<?php the_ID(); ?>" <?php post_class('featured-category-video'); ?> >
		<a href="<?php the_permalink();?>" title="<?php the_title();?>">
			<?php if ( !has_post_thumbnail() ): ?><?php echo bi_get_post_image();?><?php else:?><?php the_post_thumbnail('medium');?><?php endif;?>
			<div class="category-video-title">
				<!--<span><?php the_title();?></span>-->
				<span class="icon-play"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>						
			</div>
		</a>
	</div>
</div>
