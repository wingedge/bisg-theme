<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
class BIReviewer {	
	private $rdb;	
	public function __construct(){		
		$this->rdb = new wpdb('juxeuxkcbt', 'YVH6gra4wu', 'juxeuxkcbt', 'localhost');		
	}

	public function add_review(){
		//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
		$this->rdb->show_errors();
		if( $this->is_reviewer_login() ){
			$user = $this->get_user_profile();
			$existing = $this->get_review_by_post($_POST['review_post_id']);
			//    id  reviewer_id  post_id  title content rating  date_reviewed        deleted_at  approved  
			$wpuser = wp_get_current_user();

			$reviewData = array(				
				'reviewer_id'=>$user->id,
				'wpuserid' => $wpuser->ID,
				'post_id'=> $_POST['review_post_id'],
				'title' => $_POST['review_title'],
				'content' => $_POST['review_content'],
				'rating' => $_POST['review_rating'],
				'date_reviewed' => date("Y-m-d H:i:s"),
				'deleted_at' => NULL,
				'approved' => 1,
			);
			
			if( empty($existing) ){
				$this->add_points($user->id,'first to review','15');
			}

			$this->rdb->insert('bir_reviews',$reviewData);

			if( strlen($reviewData['content']) >= 200 ){
				$this->add_points($user->id,'added a review, 200 chars','10');				
			}else{
				$this->add_points($user->id,'added a review, less 200 chars','5');				
			}
		}		
	}
	public function add_points($reviewerId,$remark,$points){
		$wpuser = wp_get_current_user();
		$pointsData = array(
			'reviewer_id' => $wpuser->ID, //$reviewerId,
			'wpuserid' => $wpuser->ID,
			'points' => $points,
			'remark' =>$remark,
			'deleted_at' => date('Y-m-d H:i:s',strtotime(date("Y-m-d", time()) . " + 365 day")),
			'created_at' => date('Y-m-d H:i:s'),
		);
		$this->rdb->insert('bir_reviewer_points',$pointsData);
	}

	public function get_user_points($reviewerId){
		$wpuser = wp_get_current_user();
		$sql = 'SELECT * FROM bir_reviewer_points WHERE reviewer_id = "'.$reviewerId.'" OR wpuserid = "'.$wpuser->ID.'" ORDER BY created_at DESC';		
		$points = $this->rdb->get_results($sql);
		return $points;
	}

	// check remark if it exists, if not add it (profile,thumbnail, one time points only)
	public function check_and_add_points($remark,$points){
		$wpuser = wp_get_current_user();
		$check = 'SELECT * FROM bir_reviewer_points WHERE remark = "'.$remark.'" AND wpuserid = "'.$wpuser->ID.'"';		
		//echo $check;
		$exists = $this->rdb->get_row($check);
		if($exists){
			// do nothing, it already exists
			//print_r($exists);
			return false;
		}else{
			//print_r($exists);
			$this->add_points($wpuser->ID,$remark,$points);
			return true;
		}		
	}

	public function get_all(){        
        $sql = 'SELECT * FROM bir_reviews  WHERE approved="1" ORDER BY date_reviewed DESC LIMIT 20';
        $reviews = $this->rdb->get_results($sql);
        return $reviews;   
	}

	public function get_review_by_post($id){
		$sql = 'SELECT * FROM bir_reviews  WHERE approved="1" AND post_id="'.$id.'" ORDER BY date_reviewed DESC';
        $reviews = $this->rdb->get_results($sql);
        return $reviews; 	
	}

	public function get_reviewer($id){
		$sql = 'SELECT id,avatar,first_name,last_name FROM bir_reviewer WHERE id="'.$id.'"';
		return $this->rdb->get_row($sql);
	}

	public function get_ratings($postId){
		$sql = 'SELECT AVG(rating) AS average FROM bir_reviews WHERE post_id = "'.$postId.'"';
		$row =  $this->rdb->get_row($sql);
		if($row){
			return  number_format($row->average,1);
		}else{
			return '0';
		}
		//print_r($rows);
	}

	public function update_names(){
		return;
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		echo 'updating name';
		global $wpdb;
		$this->rdb->show_errors();
		$sql = 'SELECT id, email FROM bir_reviewer';
		$users = $this->rdb->get_results($sql);
		foreach($users as $user){
			$sqlU = 'SELECT * FROM wp_users WHERE user_email = "'.$user->email.'"';
			$wpuser = $wpdb->get_row($sqlU);
			
			if($wpuser){

				echo $wpuser->ID.'<br/>';

				$fnameSql = 'SELECT meta_value FROM wp_usermeta WHERE meta_key="first_name" AND user_id="'.$wpuser->ID.'"';
				$lnameSql = 'SELECT meta_value FROM wp_usermeta WHERE meta_key="last_name" AND user_id="'.$wpuser->ID.'"';

				$fname = $wpdb->get_row($fnameSql);
				$lname = $wpdb->get_row($lnameSql);

				if(!empty($fname->meta_value) && !empty($lname->meta_value)){					
					$update = array(
						'wpuserid' => $wpuser->ID,
						'first_name'=>$fname->meta_value,
						'last_name'=>$lname->meta_value,
					);

					$this->rdb->update('bir_reviewer',$update,array('id'=>$user->id));
				}
			}			
		}
	}

	public function update_wp_points(){		
		global $wpdb;
		$this->rdb->show_errors();
		$sql = 'SELECT id, wpuserid FROM bir_reviewer';
		$users = $this->rdb->get_results($sql);
		foreach($users as $user){
			$update = array(
				'wpuserid' => $user->wpuserid,
			);
			$this->rdb->update('bir_reviewer_points',$update,array('reviewer_id'=>$user->id));
			$this->rdb->update('bir_reviewer_redeem',$update,array('reviewer_id'=>$user->id));
			$this->rdb->update('bir_reviews',$update,array('reviewer_id'=>$user->id));
			echo $user->id;
		}
	}

	public function render_reviews($args=array()){
		//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
		$default = array(
			'column-size' => 'col-md-6',
		);
		$args = array_merge($default,$args);

		$reviews = $this->get_all();		
		foreach($reviews as $r){
			//$r->user = $this->get_reviewer($r->reviewer_id);
			$r->user = get_userdata( $r->wpuserid );
			$r->post = get_post($r->post_id);
			// display start
			include(locate_template('section/review-generalbox.php'));
		} // endforeach
	}

	public function show_reviews($post_id){
		
		$args['column-size'] = 'col-md-12 individual-review';
		$args['full-content'] = true;

		$reviews = $this->get_review_by_post($post_id);		

		foreach($reviews as $r){
			//$r->user = $this->get_reviewer($r->reviewer_id);
			$r->user = get_userdata( $r->wpuserid );
			$r->post = get_post($r->post_id);
			// display start
			include(locate_template('section/review-generalbox.php'));
		} // endforeach

		$this->show_pagination(count($reviews),1);
	}

	public function get_review_count($post_id){
		$sql = 'SELECT COUNT(*) as total FROM bir_reviews  WHERE approved="1" AND post_id="'.$post_id.'"';
        $reviews = $this->rdb->get_row($sql);        
        return $reviews->total; 	
	}


	public function show_pagination($total,$paged){
		$paginateArgs = array(			
			'format' => '?pp=%#%',
			'current' => $paged,
			'total' => $total
		);
		//echo paginate_links($paginateArgs); 
	}

	public function render_random_review(){
		
		$sql = 'SELECT * FROM bir_reviews WHERE approved="1" ORDER BY rand() LIMIT 1';
		$reviews = $this->rdb->get_results($sql);		
		
		foreach($reviews as $r):
			$r->user = $this->get_reviewer($r->reviewer_id);
			$r->post = get_post($r->post_id);
			include(locate_template('section/review-randombox.php'));
		endforeach;
	}

	public function get_user_profile($email=NULL){


		$sessionId = $_COOKIE['biReviewer'];
		//$sql = "SELECT r.*, o.* FROM bir_reviewer r INNER JOIN bir_reviewer_options o ON o.reviewer_id = r.id WHERE r.active=1 AND r.session_id='$sessionId'";		
		$sql = "SELECT * FROM bir_reviewer WHERE session_id = '$sessionId'";

		$current_user = wp_get_current_user();
		$email = $current_user->user_email;
		$wpid = $current_user->ID;

		if($email){
			$sql = "SELECT * FROM bir_reviewer WHERE wpuserid = '$wpid'";
		}

		$user = $this->rdb->get_row($sql);
		//if($user){
		
		$user->options = $this->rdb->get_results("SELECT * FROM bir_reviewer_options WHERE reviewer_id = '$user->id'");
		$user->total_points = $this->get_points($wpid);			
		$user->level = $this->get_account_type($user->total_points);			
		if(empty($user->id)){
			$user->id = $wpid;
		}

		//}else{
		//	$user->options = false;
		// $user->total_points = $this->get_points($user->id);		
		//	$user->level = 'regular';
		//}

		// get user using wp_id

		#print_r($user);

		return $user;
	}
	
	public function is_reviewer_login(){		
		//if ( isset($_COOKIE['biReviewer']) ){

		if( is_user_logged_in() ){
			return true;		
		}else{
			return false;
		}		
	}

	public function get_points($reviewerId){
		$sql = 'SELECT SUM(points) AS total FROM bir_reviewer_points WHERE wpuserid = "'.$reviewerId.'" AND deleted_at > NOW()';
		$points = $this->rdb->get_row($sql);
		
		$sql = 'SELECT SUM(points_used) AS total FROM bir_reviewer_redeem WHERE wpuserid = "'.$reviewerId.'" AND (deleted_at > NOW() OR deleted_at IS NULL or deleted_at = "0000-00-00 00:00:00")';
		
		$used_points = $this->rdb->get_row($sql);

		if($points){
			//return $points->total - $used_points->total;			
			return $points->total;
		}else{
			return 0;
		}
	}

	public function get_rewards_by_points($points,$limit=3){
		$sql = "SELECT * FROM bir_rewards WHERE required_points <= $points LIMIT $limit";
		$rewards = $this->rdb->get_results($sql);

		if($rewards){
			return $rewards;
		}else{
			return false;
		}
		
	}

	public function get_redemption_by_user($userid,$limit){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$sql = "SELECT * FROM bir_reviewer_redeem INNER JOIN bir_rewards ON bir_rewards.id = bir_reviewer_redeem.reward_id  WHERE wpuserid = $userid LIMIT $limit";
		$redeem = $this->rdb->get_results($sql);
		return $redeem;
	}

	public function get_reviews_by_user($userid,$limit){
		global $wpdb;
		$sql = "SELECT * FROM bir_reviews WHERE wpuserid = $userid LIMIT $limit";
		$reviews = $this->rdb->get_results($sql);
		return $reviews;

		// get the items

	}

	public function get_account_type($points){    	
    	$sql = 'SELECT * FROM bir_account_type';
    	$accounts = $this->rdb->get_results($sql);    	    	
    	foreach($accounts as $account){    	    		
    		#print_r($account);
    		if ( $points >= $account->min_points && $points <= $account->max_points){    		
    			$account_type = $account;
    		}
    	}    	
    	return $account_type->description;
    }
}

/*initialize and enable sessions*/

// enabling sessions
$BIReview = new BIReviewer();

$_GLOBALS['BIReview']= $BIReview;

// login for review

if( isset($_POST['review_login']) ){
	$sId = $BIReview->login();
	//session_destroy();
}

if( isset($_GET['reviewer_logout']) ){
	setcookie( 'biReviewer', '', time() - 86500);
	session_destroy();
}
// check if post is reviewed
if(isset($_POST['submit_review'])){
	
	$BIReview->add_review();
}