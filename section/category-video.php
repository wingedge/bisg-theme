<div class="col-md-3">
	<div id="post-<?php the_ID(); ?>" <?php post_class('featured-video'); ?> style="min-height:170px; background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'medium_large');?>');" >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
			<span class="featured-video-titles"><?php the_title();?></span> 
			<?php if ( !has_post_thumbnail() ): ?><?php # echo bi_get_post_image();?>
			<?php else:?><?php # the_post_thumbnail();?><?php endif;?>
				<div class="featured-video-title-1">
					<!--<span><?php the_title();?></span>-->
					<span class="icon-play"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>						
				</div>
			</a>
		</div>
</div>
