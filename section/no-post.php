
<?php  $postType = get_post_type();?>


<?php if ($postType == 'brand' ||$postType == 'product' ):?>
<div id="no-article" class="col-md-12 post-<?php echo get_post_type();?>">
	<p>No Products found</p>	
</div>
<?php elseif ($postType == 'establishment'):?>
<div id="no-article" class="col-md-12 post-<?php echo get_post_type();?>">
	<p>No Establishments found</p>	
</div>
<?php else:?>
<div id="no-article" class="col-md-12 post-<?php echo get_post_type();?>">
	<p>No Articles found</p>	
</div>
<?php endif;?>