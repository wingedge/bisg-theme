<div class="yp-title1">My Profile</div>
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
			update_user_meta($current_user->ID, 'hair_concern', $_POST['hair_concern']);
			update_user_meta($current_user->ID, 'body_concerns', $_POST['body_concerns']);
			update_user_meta($current_user->ID, 'aesthethic_concerns', $_POST['aesthethic_concerns']);
			update_user_meta($current_user->ID, 'makeup_essentials', $_POST['makeup_essentials']);
			update_user_meta($current_user->ID, 'skincare_essentials', $_POST['skincare_essentials']);
			update_user_meta($current_user->ID, 'interests', $_POST['interests']);

			update_user_meta($current_user->ID, 'top_three_products', $_POST['top_three_products']);
			update_user_meta($current_user->ID, 'top_three_services', $_POST['top_three_services']);
						

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
						<input type="text" name="birthday" id="datepicker" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo get_user_meta( $current_user->ID, 'birthday', true ); ?>" />
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
					<div class="cpdtop"></div>
					<div class="yp-title1">Beauty Profile</div>
					<div class="clearfx"></div>
				</div>				
			</div>

			<div class="col-md-12">			

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
							$skin_type = get_user_meta( $current_user->ID, 'skin_type', true );
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
						<label>Hair Concerns (if any)</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'hair-concern', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$hair_concern =  get_user_meta( $current_user->ID, 'hair_concern', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $result=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="hair_concern[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $hair_concern ))?'checked="checked"':'';?>/>							
							<?php echo $result->name;?>
							</div>

						<?php endforeach; ?>
						</div>				
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Body Concerns (if any)</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'body-concerns', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$body_concerns =  get_user_meta( $current_user->ID, 'body_concerns', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $result=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="body_concerns[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $body_concerns ))?'checked="checked"':'';?>/>							
							<?php echo $result->name;?>
							</div>

						<?php endforeach; ?>
						</div>

					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>Other Aesthetics Interests (if any)</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'other-aesthetics-interests', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$aesthethic_concerns =  get_user_meta( $current_user->ID, 'aesthethic_concerns', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $result=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="aesthethic_concerns[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $aesthethic_concerns ))?'checked="checked"':'';?>/>							
							<?php echo $result->name;?>
							</div>

						<?php endforeach; ?>
						</div>

					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>My Makeup Essentials</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'makeup-essentials', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$makeup_essentials =  get_user_meta( $current_user->ID, 'makeup_essentials', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $result=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="makeup_essentials[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $makeup_essentials ))?'checked="checked"':'';?>/>							
							<?php echo $result->name;?>
							</div>

						<?php endforeach; ?>
						</div>						
					</div>
				</div>

				<div class="row form-row">
					<div class="form-group">
						<label>My Skincare Essentials</label>
						<div class="row col-md-12 multi-checkbox">
						<?php 
							$term_taxonomy = 'attribute_category';
							$term = get_term_by('slug', 'skincare-essential', 'attribute_category');
							$term_children = get_term_children( $term->term_id, $term_taxonomy );
							$skincare_essentials =  get_user_meta( $current_user->ID, 'skincare_essentials', true );				
						?>
						<?php foreach($term_children as $term_child):?>
							<?php $result=get_term($term_child); ?>
							
							<div class="col-sm-4">							
							<input type="checkbox" name="skincare_essentials[]" value="<?php echo $term_child;?>" <?php echo (in_array($term_child, $skincare_essentials ))?'checked="checked"':'';?>/>							
							<?php echo $result->name;?>
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
							<?php $allowedInterests = array('hair','makeup','skincare','body','spa','beauty-salon','hair-salon','aesthetics','wellness','fitness');?>
							<?php if($term->parent == "0" && in_array($term->slug, $allowedInterests)):?>
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
						<label>Top 3 Beauty Products I am obsessed with (optional)</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="top_three_products"><?php echo $top3products = get_user_meta( $current_user->ID, 'top_three_products', true ); ?></textarea>
					</div>
				</div>
				<div class="row form-row">
					<div class="form-group">
						<label>Top 3 Beauty Services I am obsessed with (optional)</label>
						<textarea class="form-control" rows="5" style="width:90%;" name="top_three_services"><?php echo $top3services = get_user_meta( $current_user->ID, 'top_three_services', true ); ?></textarea>
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


<div class="yp-title1">Trial Team Form</div>
<div class="clearfx"></div>
<div class="yp-mp">
	<div class="row">
	<?php // TRIAL TEAM FORM CHECK ?>
	<?php  $joined_trial_team = get_user_meta($current_user->ID,'joined_trial_team',true); ?>	
	<?php if( $joined_trial_team ):?>
		<div class="col-xs-12">
		<p>We have received your Trial Team application form. We will get in touch with you as soon as possible once a new applicable trial campaign launches</p>
		</div>
	<?php else:?>

		<?php if( 
					empty($skin_type) || 
					empty($skin_concerns) || 
					empty($hair_concern) ||  
					empty($body_concerns) ||  
					empty($aesthethic_concerns) ||  
					empty($makeup_essentials) ||  
					empty($skincare_essentials) ||  
					empty($interests) ||  
					empty($top3products) ||  
					empty($top3services)
				):
		?>
			<div class="col-xs-12">			
				please complete profile to join the trial team form			
			</div>
		<?php else:?>
			<div class="col-xs-12">			
				<?php echo do_shortcode('[contact-form-7 id="4787" title="Trial Team"]');?>
			</div>
		<?php endif;?>

	<?php endif;?>


	</div>
</div>