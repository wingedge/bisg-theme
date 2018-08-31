<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="col-md-12">
		<div id="post-<?php the_ID(); ?>" <?php post_class('sidebar-products'); ?> >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">			
				<?php the_post_thumbnail('medium');?>				
				<div class="sidebar-products-title">
					<span><?php the_title();?></span>					
				</div>
			</a>
		</div>
	</div>
</div>