<?php 
global $BIReview;
$postCategories = wp_get_post_categories(get_the_ID()); // get all categories under this post
foreach($postCategories as $postCategory){
	$categoryObject = get_category($postCategory);
	$thisCategories[] = $categoryObject->slug;
}
?>
<?php if( $BIReview->is_reviewer_login() ):?>
	
	<?php if ( !in_array('aesthetics', $thisCategories) ) : ?>  
	<div class="col-md-12">
		<h4>Write a Review</h4>		
		<form class="form-horizontal">
			<div class="form-group">
				<label for="text1" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" required id="text1">
				</div>
			</div>

			<div class="form-group">
				<label for="text2" class="col-sm-2 control-label">Rating</label>
				<div class="col-sm-10">
					<div id="hearts-existing" class="starrr" data-rating='4'></div>
				</div>
			</div>

			<div class="form-group">
				<label for="text2" class="col-sm-2 control-label">Review</label>
				<div class="col-sm-10">
				  <textarea class="form-control" id="text2" required rows="3"></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-warning">Submit Review</button>
				</div>
			</div>
		</form>
	</div>

	<?php else:?>
		<p>reviews are currently not available.</p>
	<?php endif;?>
<?php else:?>
<div class="col-md-12">
	<?php get_template_part('section/review','login');?>
</div>
<?php endif;?>

<div class="col-md-12 review-container">	
	<?php $BIReview->show_reviews(get_the_ID());?>
</div>
