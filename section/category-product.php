<!--
<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="<?php echo $args['column_width'];?>">
		<div id="post-<?php the_ID(); ?>" <?php post_class('featured-products'); ?> style="min-height:170px; background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'medium_large');?>');" >
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
			
				<div class="review-this-product">
					<span class="icon-review"><i class="fa fa-pencil" aria-hidden="true"></i> Review</span>
					<span class="fp-title"><?php the_title();?></span>											
				</div>
			</a>
		</div>
	</div>
</div>
-->

<div class="col-sm-4 item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="<?php echo $args['column_width'];?>">
		      <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'medium'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><?php the_title();?></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Review</a>		      
		      <div class="clearfx Mpad"></div>
	</div>
 </div>  
