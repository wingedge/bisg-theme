<div class="<?php echo $args['column-size'];?>">					
	<div class="panel review-panel" data-review-id="<?php echo $r->id;?>">
		<div class="panel-heading">
			<h3 class="review-title"><i class="fa fa-quote-left"></i> <?php echo stripslashes($r->title);?> <i class="fa fa-quote-right"></i></h3>
			<?php echo get_avatar( $r->wpuserid, 32 ); ?>
			<div class="review-rating"><div class="review-score" data-rating='<?php echo $r->rating;?>'></div></div>
			
		</div>
		<div class="panel-body">
			<div class="review-image">
				<?php echo get_the_post_thumbnail($r->post_id,'thumbnail'); ?>
			</div>
			<div class="review-content">
				<h4 class="review-post-title"><?php  echo $r->post->post_title;?></h4>														
				<?php  
					
					$text = stripslashes($r->content);
					if(empty($args['full-content'])){
						$more = '&nbsp;<a href="'.get_permalink($r->post_id).'"> ... read more</a>';
						echo wp_trim_words( $text, 15, $more);
					}else{
						echo $text;
					}
					

				?>
			</div>
		</div>
		<div class="panel-footer review-footer">			
			<?php /* reviewed by <?php  echo $r->user->first_name; ?> <?php  echo $r->user->last_name; ?> */?>
			reviewed on <?php  echo date('F d, Y',strtotime($r->date_reviewed));?>														
		</div>
	</div>
	
			
</div>