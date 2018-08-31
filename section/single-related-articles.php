<!--
<div class="item <?php if ($postCtr <= 1):?> active<?php endif;?>">
    <div class="single-related-col single-related-<?php echo $postCtr;?>">
      <div id="post-<?php the_ID(); ?>" <?php post_class('single-related-post'); ?> style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'medium_large');?>');" >              
          <div class="single-related-title">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
              <?php the_title();?>
            </a>
          </div>    
      </div>
    </div>
</div> -->


	

<div class="col-sm-4 item <?php if ($postCtr <= 1):?> active<?php endif;?>">
	<div class="single-related-col single-related-<?php echo $postCtr;?>">
		      <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'medium'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><?php the_title();?></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>		      
		      <div class="clearfx Mpad"></div>
	</div>
 </div>  
