<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="col-md-12">
		<div id="post-<?php the_ID(); ?>" <?php post_class('featured-item'); ?>  style="background:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'medium');?>') no-repeat center center; background-size:cover;" >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>" style="height:200px; display:block;">			
			<?php #the_post_thumbnail('medium_large');?>				
			</a>
		</div>
	</div>
</div>