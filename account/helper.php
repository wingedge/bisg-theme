<div>
<?php /*VISIBLE ONLY ON ADMIN SIDE
<?php 
	$rdb = new wpdb('juxeuxkcbt', 'YVH6gra4wu', 'juxeuxkcbt', 'localhost');

	foreach ( $reviewers = get_users() as $user){
		$users[] = $user->ID;
	}

	$reviews = $rdb->get_results("SELECT * FROM bir_reviews WHERE wpuserid IS NULL");
	//print_r($reviews);
	
	foreach($reviews as $review){
		$random_user = $users[array_rand($users)];
		$update = array(
			'wpuserid' => $random_user,			
		);
		//$rdb->update('bir_reviews',$update,array('id'=>$review->id));
	}
	// foreach 
?>


<form>
<label>Title : <input type="text" name="title"></label><br/>
<label>Rating : <select name="rating"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></label><br/>
<label>User : <select name="wpuserid">
	<?php foreach($reviewers as $user):?>
		<option value="<?php echo $user->ID;?>"><?php echo $user->display_name;?></option>
	<?php endforeach;?>
</select>
</label><br/>
<label>Review : <textarea type="text" name="review"></textarea></label><br/>
</form>
*/?>
</div>