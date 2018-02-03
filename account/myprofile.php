<div class="yp-title1 mintop20">My Profile</div>
<div class="yp-title2 mintop20"></div>
<div class="yp-line"></div>
<div class="clearfx"></div>

<div class="yp-mp">
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
				//echo '<p>User Password Updated</p>';
				$userUpdate['user_pass'] = $_POST['password'];
			}

			// update default profile fields
			wp_update_user($userUpdate);

			// update meta


			update_user_meta($current_user->ID, 'phone', $_POST['phone']);
			update_user_meta($current_user->ID, 'birthday', $_POST['birthday']);
			update_user_meta($current_user->ID, 'country', $_POST['country']);
			update_user_meta($current_user->ID, 'city', $_POST['city']);
			update_user_meta($current_user->ID, 'address', $_POST['address']);

			update_user_meta($current_user->ID, 'skin_tone', $_POST['skin_tone']);
			update_user_meta($current_user->ID, 'skin_type', $_POST['skin_type']);
			update_user_meta($current_user->ID, 'skin_concerns', $_POST['skin_concerns']);
			update_user_meta($current_user->ID, 'interests', $_POST['interests']);

			update_user_meta($current_user->ID, 'top_three_products', $_POST['top_three_products']);
			update_user_meta($current_user->ID, 'top_three_makeup', $_POST['top_three_makeup']);
			update_user_meta($current_user->ID, 'top_three_skincare', $_POST['top_three_skincare']);
			update_user_meta($current_user->ID, 'what_skincare', $_POST['what_skincare']);
			update_user_meta($current_user->ID, 'what_treatment', $_POST['what_treatment']);
			update_user_meta($current_user->ID, 'disliked_products', $_POST['disliked_products']);

			$prev_ttf = get_user_meta( $current_user->ID, 'join_trial_team', true );
			// check if trial team is not set, and is set now then send email

			if( empty($prev_ttf) && isset($_POST['join_trial_team']) ) {
				// send email to notify
				$trial_message  = 'Form Information Details: <br/>';
				$trial_message .= 'Name: '.$me->first_name.' <br/>';
				$trial_message .= 'Email: '.$user->email.' <br/>';
				$trial_message .= 'Birthdate:  '. get_user_meta( $current_user->ID, 'birthday', true ) .' <br/>';
				$trial_message .= 'Phone number: '. get_user_meta( $current_user->ID, 'phone', true ) .'  <br/>';
				$trial_message .= 'Address line1: '. get_user_meta( $current_user->ID, 'address', true ) .'  <br/>';				
				$trial_message .= 'City: '. get_user_meta( $current_user->ID, 'city', true ) .'  <br/>';				
				$trial_message .= 'Country: '. get_user_meta( $current_user->ID, 'country', true ) .'  <br/><br/><br/>';

				$ttm_skintype=get_term(get_user_meta( $current_user->ID, 'skin_type', true ));
				$ttm_interest=get_term(get_user_meta( $current_user->ID, 'interests', true ));
				$ttm_skinconcern=get_term(get_user_meta( $current_user->ID, 'skin_concerns', true ));

				$trial_message .= 'Skin Type: '. $ttm_skintype->name .'  <br/>';
				$trial_message .= 'Skin Tone: '. get_user_meta( $current_user->ID, 'skin_tone', true ) .'  <br/>';
				$trial_message .= 'Skin Concerns: '. $ttm_skinconcern->name .'  <br/>';
				$trial_message .= 'Interests: '. $ttm_interest->name .'  <br/><br/>';

				$trial_message .= 'Top Three Products: '. get_user_meta( $current_user->ID, 'top_three_products', true ) .'  <br/>';
				$trial_message .= 'Top Three Makeup: '. get_user_meta( $current_user->ID, 'top_three_makeup', true ) .' <br/>';
				$trial_message .= 'Skincare Products: '. get_user_meta( $current_user->ID, 'top_three_skincare', true ) .'  <br/>';
				$trial_message .= 'Skincare Treatments in the past 4 weeks: '. get_user_meta( $current_user->ID, 'what_treatment', true ) .'  <br/>';
				$trial_message .= 'Disliked Products: '. get_user_meta( $current_user->ID, 'disliked_products', true ) .'  <br/><br/>';

				//echo $trial_message;
				wp_mail( 'Seangerard2013@gmail.com, georgio.amista@gmail.com, top.garperio@gmail.com', 'Trial Form details submitted by '.$me->first_name.' '.$user->email, $trial_message);

			}



			update_user_meta($current_user->ID, 'join_trial_team', $_POST['join_trial_team']);
			


			if ( is_wp_error( $current_user->ID ) ) {
			//	echo '<p>There was a problem updating your profile</p>';
			}else{
			//	echo '<p>Profile Updated</p>';
			}
		}
	?>
	<form method="post" class="bir-profile-form form-inline">	
		<div class="row">

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
			</div>
			<div class="col-md-6">
				<div class="row form-row"><h4>&nbsp;</h4></div>
				<div class="row form-row">
					<div class="form-group">
						<label>Birthday :</label> 
						<input type="text" name="birthday" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'birthday', true ); ?>" />
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Address :</label> 
						<input type="text" name="address" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'address', true ); ?>" />
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>City :</label> 
						<input type="text" name="city" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'city', true ); ?>" />
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

			<div class="row clearfix"></div>

			<div class="col-md-12">
				<div class="row form-row">
					<div class="yp-title1 mintop20">Beauty Profile</div>
					<div class="yp-title2 mintop20"></div>
					<div class="yp-line"></div>
					<div class="clearfx"></div>
				</div>				
			</div>

			<div class="col-md-7">			

				<div class="row form-row">
					<div class="form-group">
						<label>Skin Tone : <span id="skin-tone-selected"><?php echo $skin_tone = get_user_meta($current_user->ID,'skin_tone',true); ?></span></label>
						<input type="hidden" id="skin-tone-field" name="skin_tone" value="<?php echo get_user_meta($current_user->ID,'skin_tone',true); ?>"/>
						<div class="skin-tone-swatches">
							
							<div skin-tone="fair" class="skin-tone skin-2 <?php echo ($skin_tone == 'fair')?'active':'empty';?>"></div>
							<div skin-tone="medium" class="skin-tone skin-4 <?php echo ($skin_tone == 'medium')?'active':'empty';?>"></div>
							<div skin-tone="deep" class="skin-tone skin-6 <?php echo ($skin_tone == 'deep')?'active':'empty';?>"></div>
							<?php /*
							<div skin-tone="pocelain" class="skin-tone skin-1 <?php echo ($skin_tone == 'porcelain')?'active':'empty';?>"></div>					
							<div skin-tone= "light-medium" class="skin-tone skin-3 <?php echo ($skin_tone == 'light-medium')?'active':'empty';?>"></div>					
							<div skin-tone="medium-dark" class="skin-tone skin-5 <?php echo ($skin_tone == 'medium-dark')?'active':'empty';?>"></div>					
							<div skin-tone="deep" class="skin-tone skin-7 <?php echo ($skin_tone == 'deep')?'active':'empty';?>"></div>
							*/ ?>

						</div>
					</div>
				</div>
				
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
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'skin-care-concerns', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$skin_concerns =  get_user_meta( $current_user->ID, 'skin_concerns', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $skintype=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="skin_concerns[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $skin_concerns ))?'checked="checked"':'';?>/>							
							<?php echo $skintype->name;?>
							</div>

						<?php endforeach; ?>
						</div>
						
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Interests</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'category';
							$terms = get_terms($term_taxonomy);					
							$interests =  get_user_meta( $current_user->ID, 'interests', true );
						?>
						<?php foreach($terms as $term):?>
							<?php if($term->parent == "0"):?>
							<div class="col-sm-4">							
							<input type="checkbox" name="interests[]" value="<?php echo $term->term_id;?>" <?php echo (in_array($term->term_id, $interests ))?'checked="checked"':'';?>/>							
							<?php echo $term->name;?>															
							</div>
							<?php endif;?>
						<?php endforeach; ?>
						</div>
						
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Top 3 Beauty Products I am obsessed with</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="top_three_products"><?php echo get_user_meta( $current_user->ID, 'top_three_products', true ); ?></textarea>
					</div>
				</div>

			</div>
			<div class="col-md-5">

				<div class="row form-row">
					<div class="form-group">
						<label>What are your top 3 favourite makeup products?</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="top_three_makeup"><?php echo get_user_meta( $current_user->ID, 'top_three_makeup', true ); ?></textarea>
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>What are your top 3 favourite skincare products?</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="top_three_skincare"><?php echo get_user_meta( $current_user->ID, 'top_three_skincare', true ); ?></textarea>
					</div>
				</div>

						

				<div class="row form-row">
					<div class="form-group">
						<label>What skincare products are you using now?</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="what_skincare"><?php echo get_user_meta( $current_user->ID, 'what_skincare', true ); ?></textarea>
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>What skincare treatments have you had in the past 4 weeks (peels, facials, injectibles, etc)</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="what_treatment"><?php echo get_user_meta( $current_user->ID, 'what_treatment', true ); ?></textarea>
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Skin care products you have disliked before, and why?</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="disliked_products"><?php echo get_user_meta( $current_user->ID, 'disliked_products', true ); ?></textarea>
					</div>
				</div>				

			</div>

			<div class="col-md-12">
				<?php  $ttf = get_user_meta( $current_user->ID, 'join_trial_team', true );  ?>
				<div class="trial-team-form row form-row">					
					<div class="form-group">
						<label>I would like to join the Trial Team</label>
						<input type="checkbox" name="join_trial_team" value="true" <?php if($ttf){echo 'checked="checked"';} ?>/>						
					</div>
				</div>				
			</div>

		</div><!--row-->
		<div class="clearfx"></div>		
		

		<div class="row">
				<input type="submit" class="btn btn-primary cbtn" value="Update Profile" />		
		</div>	
	</form>
</div>




<div class="cpdtop"></div>

<div class="cpdbotpad"></div>