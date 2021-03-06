<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
<div class="article-slider-container">
	<div id="post-<?php the_ID();?>" <?php post_class('article-slider-post'); ?>>
		<div class="row">
			<div class="col-md-12 slide-article-thumb">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>">
					<?php if ( !has_post_thumbnail() ): ?><?php echo bi_get_post_image();?><?php else:?><?php the_post_thumbnail();?><?php endif;?>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 slide-article-title">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>">		
					<span class="fp-title"><?php the_title();?></span>			
				</a>					
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 slide-article-content">
				<?php the_excerpt();?>
			</div>
		</div>
	</div>
</div>
</div>