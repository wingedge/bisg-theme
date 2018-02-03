<div class="recent-review-box">
  <h1>Recent Reviews</h1>
  <p>Real women talk about products and treaments</p>
  <div class="recent-review-product-box">
  	<a href="<?php echo get_permalink($r->post_id);?>">
    <?php echo get_the_post_thumbnail($r->post_id,'full'); ?>
    </a>
  	<strong><?php echo stripslashes($r->title);?></strong> 
  	<a style="color:#fff;display:block;" href="<?php echo get_permalink($r->post_id);?>"><span><?php echo $r->post->post_title;?></span></a>
  	<div class="star-rating">
    	<?php for($i=0; $i<$r->rating;$i++):?>
    	<i class="fa fa-star" aria-hidden="true"></i>
    	<?php endfor;?>
    	<?php for($i=$r->rating; $i<5;$i++):?>
    	<i class="fa fa-star grey-star" aria-hidden="true"></i>
    	<?php endfor;?>		            
    </div> 
  </div>
  <div class="recent-review-comment-box">
  <?php echo get_avatar( $r->wpuserid, 64 ); ?> <i><?php echo $r->user->first_name; ?> <?php echo $r->user->last_name; ?></i>
  <p><?php  
	$text = stripslashes($r->content);
	$more = '&nbsp;<a href="'.get_permalink($r->post_id).'"> ... read more</a>';
	echo wp_trim_words( $text, 30, $more);	?></p>
  </div>
</div>