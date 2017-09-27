<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
class BIReviewer {	
	private $rdb;	
	public function __construct(){		
		$this->rdb = new wpdb('juxeuxkcbt', 'YVH6gra4wu', 'juxeuxkcbt', 'localhost');		
	}

	public function get_all(){        
        $sql = 'SELECT * FROM bir_reviews  WHERE approved="1" ORDER BY date_reviewed DESC LIMIT 0,50';
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
						'first_name'=>$fname->meta_value,
						'last_name'=>$lname->meta_value,
					);

					$this->rdb->update('bir_reviewer',$update,array('id'=>$user->id));
				}
			}


			
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
			$r->user = $this->get_reviewer($r->reviewer_id);
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
			$r->user = $this->get_reviewer($r->reviewer_id);
			$r->post = get_post($r->post_id);
			// display start
			include(locate_template('section/review-generalbox.php'));
		} // endforeach
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

	public function get_user_profile(){
		$sessionId = $_COOKIE['biReviewer'];
		//$sql = "SELECT r.*, o.* FROM bir_reviewer r INNER JOIN bir_reviewer_options o ON o.reviewer_id = r.id WHERE r.active=1 AND r.session_id='$sessionId'";
		$sql = "SELECT * FROM bir_reviewer WHERE session_id = '$sessionId'";
		$user = $this->rdb->get_row($sql);
		if($user){
			$user->options = $this->rdb->get_results("SELECT * FROM bir_reviewer_options WHERE reviewer_id = '$user->id'");
			$user->total_points = $this->get_points($user->id);			
			$user->level = $this->get_account_type($user->total_points);			
		}

		#print_r($user);

		return $user;
	}
	
	public function is_reviewer_login(){		
		if ( isset($_COOKIE['biReviewer']) ){
			return true;
		}else{
			return false;
		}		
	}

	public function get_points($reviewerId){
		$sql = 'SELECT SUM(points) AS total FROM bir_reviewer_points WHERE reviewer_id = "'.$reviewerId.'" AND deleted_at > NOW()';
		$points = $this->rdb->get_row($sql);
		if($points){
			return $points->total;			
		}else{
			return 0;
		}
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