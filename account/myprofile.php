<?php $me = get_userdata($current_user->ID);?>
<?php 
	if(isset($_POST['user_action']) && $_POST['user_action'] == 'update'){
		//echo 'updating';
		//echo $_POST['user_id'];
		$userUpdate = array(
			'ID' => $current_user->ID,
			'first_name'=>$_POST['first_name'],
			'last_name'=>$_POST['last_name'],
		);

		//print_r($userUpdate);

		if(isset($_POST['password']) && !empty($_POST['password'])){
			echo '<p>User Password Updated</p>';
			$userUpdate['user_pass'] = $_POST['password'];
		}

		// update default profile fields
		wp_update_user($userUpdate);

		// update meta


		update_user_meta($current_user->ID, 'phone', $_POST['phone']);
		update_user_meta($current_user->ID, 'birthday', $_POST['birthday']);
		update_user_meta($current_user->ID, 'country', $_POST['country']);

		update_user_meta($current_user->ID, 'skin_type', $_POST['skin_type']);
		update_user_meta($current_user->ID, 'skin_concerns', $_POST['skin_concerns']);
		update_user_meta($current_user->ID, 'interests', $_POST['interests']);


		if ( is_wp_error( $current_user->ID ) ) {
			echo '<p>There was a problem updating your profile</p>';
		}else{
			echo '<p>Profile Updated</p>';
		}
	}
?>

<form method="post" class="bir-profile-form form-inline">	
<div class="row">

	<h3 class="bir-section-title">My Profile</h3>
	<div class="col-md-6">	
	
		<input type="hidden" name="user_action" value="update"/>
		<input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>"/>
		
		<div class="row form-row"><h4>Account Details</h4></div>
		<div class="row form-row">
			<div class="form-group">
				<label>First Name :</label> 
				<input type="text" name="first_name" class="form-control" value="<?php echo ($me->first_name)?$me->first_name:$user->first_name;?>" />
			</div>
		</div>
		<div class="row form-row">
			<div class="form-group">
				<label>Last Name :</label> 
				<input type="text" name="last_name" class="form-control" value="<?php echo ($me->last_name)?$me->last_name:$user->last_name;?>" />
			</div>
		</div>
		<div class="row form-row">
			<div class="form-group">
				<label>Email :</label> 
				<input type="text" name="email" class="form-control" readonly value="<?php echo ($me->email)?$me->email:$user->email;?>" />
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>Phone :</label> 
				<input type="text" name="phone" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'phone', true ); ?>" />
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>Birthday :</label> 
				<input type="text" name="birthday" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'birthday', true ); ?>" />
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>Country :</label> 
				<input type="text" name="country" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'country', true ); ?>" />
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>New Password :</label> 
				<input type="password" name="password" placheholder="default" class="form-control" value="" />				
			</div>
		</div>

	</div>

	<div class="col-md-6">
		<div class="row form-row"><h4>Beauty Profile</h4></div>
		
		<div class="row form-row">
			<div class="form-group">
				<label>Skin Type</label>
				<select name="skin_type" class="form-control">
				<?php 
					$term_taxonomy = 'attribute_category';
					$term = get_term_by('slug', 'skin-type', 'attribute_category');
					$term_children = get_term_children( $term->term_id, $term_taxonomy );				
				?>
				<?php foreach($term_children as $term_child):?>
					<?php $skintype=get_term($term_child); ?>
					<option value="<?php echo $term_child;?>" <?php echo ($term_child == get_user_meta( $current_user->ID, 'skin_type', true ))?'selected="selected"':'';?>><?php echo $skintype->name;?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>Skin Care Concerns</label>
				<select name="skin_concerns" class="form-control">
				<?php 
					$term_taxonomy = 'attribute_category';
					$term = get_term_by('slug', 'skin-care-concerns', 'attribute_category');
					$term_children = get_term_children( $term->term_id, $term_taxonomy );				
				?>
				<?php foreach($term_children as $term_child):?>
					<?php $skintype=get_term($term_child); ?>
					<option value="<?php echo $term_child;?>" <?php echo ($term_child == get_user_meta( $current_user->ID, 'skin_concerns', true ))?'selected="selected"':'';?>><?php echo $skintype->name;?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="row form-row">
			<div class="form-group">
				<label>Interests</label>
				<select name="interests" class="form-control">
				<?php 
					$term_taxonomy = 'category';
					$terms = get_terms($term_taxonomy);					
				?>
				<?php foreach($terms as $term):?>
					<?php if($term->parent == "0"):?>
					<option value="<?php echo $term->term_id;?>" <?php echo ($term->term_id == get_user_meta( $current_user->ID, 'interests', true ))?'selected="selected"':'';?>><?php echo $term->name;?></option>
					<?php endif;?>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		

	</div>

	

</div><!--row-->

<div class="row">
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Update Profile" />
	</div>
</div>	

</form>