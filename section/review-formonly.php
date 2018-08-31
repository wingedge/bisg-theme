<div style="background:#fff;overflow:hidden;">	
<?php global $BIReview;?>
<?php if( $BIReview->is_reviewer_login() ):?>
	
	<div class="col-md-12">
		<h4>Write a Review</h4>		
		<form method="post" class="form-horizontal">
			<input type="hidden" name="review_post_id" value="<?php echo get_the_ID();?>"/>
			<div class="form-group">
				<label for="text1" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="review_title" required id="text1">
				</div>
			</div>

			<div class="form-group">
				<label for="text2" class="col-sm-2 control-label">Rating</label>
				<input id="review_rating" name="review_rating" type="hidden" value="1"/>
				<div class="col-sm-10">
					<div id="hearts-existing" class="starrr" data-rating='4'></div>
				</div>
			</div>

			<div class="form-group">
				<label for="text2" class="col-sm-2 control-label">Review</label>
				<div class="col-sm-10">
				  <textarea class="form-control" name="review_content" id="text2" required rows="3"></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" name="submit_review" class="btn btn-warning">Submit Review</button>
				</div>
			</div>
		</form>
	</div>
	
<?php else:?>
<div class="col-md-12">
	<?php get_template_part('section/review','login');?>
</div>
<?php endif;?>
</div>