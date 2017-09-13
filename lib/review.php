<?php 

class BIReviewer {
	private $db;
	private $table;
	private $post_id;

	public function __construct(){
		global $wpdb;
		$this->db = $wpdb;	
		$this->table = 'wp_reviews';
	}

	public function get_all(){        
        $sql = 'SELECT r.*, p.post_title FROM ' . $this->table . ' AS r INNER JOIN wp_posts AS p ON r.post_id = p.ID WHERE r.approved=1 ORDER BY r.date_added DESC LIMIT 0,20';                
        $reviews = $this->db->get_results($sql);
        return $reviews;   
	}

	public function render_reviews(){
		$reviews = $this->get_all();
		//print_r($reviews);
		/*
	 	[review_id] => 6
	    [user_id] => 18
	    [post_id] => 93
	    [author] => 
	    [email] => 
	    [review_title] => Great Service!
	    [review] => It was my birthday and a friend brought me here for my day! They had these little surprise for me and I definitely loved it!
	    [tips] => 
	    [recommendations] => 
	    [star_rating] => 5
	    [date_added] => 1446130280
	    [approved] => 1
	    [x] => 1
	    [post_title] => Spa Club at Beach Road
		*/
		foreach($reviews as $r){
			$r->user = get_userdata($r->user_id);
			
			// display start
			?>
				<div class="col-md-6">					
					<div class="panel review-panel">
						<div class="panel-heading">
							<h3 class="review-title"><i class="fa fa-quote-left"></i> <?php echo stripslashes($r->review_title);?> <i class="fa fa-quote-right"></i></h3>
							<img class="review-avatar" src="<?php echo esc_url(get_avatar_url($r->user_id,32));?>" />
							<div class="review-rating"><div class="review-score" data-rating='<?php echo $r->star_rating;?>'></div></div>
							
						</div>
						<div class="panel-body">
							<div class="review-image">
								<?php echo get_the_post_thumbnail($r->post_id,'thumbnail'); ?>
							</div>
							<div class="review-content">
								<h4 class="review-post-title"><?php echo $r->post_title;?></h4>														
								<?php  
									$text = stripslashes($r->review);
									$more = '&nbsp;<a href="#"> ... read more</a>';
									echo wp_trim_words( $text, 15, $more);
								?>
							</div>
						</div>
						<div class="panel-footer review-footer">
							reviewed by <?php echo $r->user->first_name; ?> <?php echo $r->user->last_name; ?> on <?php echo date('F d, Y',$r->date_added);?>														
						</div>
					</div>
					
							
				</div>
			<?php // display end
		} // endforeach
	}

	public function render_random_review(){
		$sql = 'SELECT r.*, p.post_title FROM ' . $this->table . ' AS r INNER JOIN wp_posts AS p ON r.post_id = p.ID WHERE r.approved=1 ORDER BY rand() LIMIT 1';
		$reviews = $this->db->get_results($sql);		
		foreach($reviews as $r):
			$r->user = get_userdata($r->user_id);
		?>
			<div class="recent-review-box">
		      <h1>Recent Reviews</h1>
		      <p>Real women talk about products and treaments</p>
		      <div class="recent-review-product-box">
		      	<?php echo get_the_post_thumbnail($r->post_id,'full'); ?>
		      	<strong><?php echo stripslashes($r->review_title);?></strong> 
		      	<span><?php echo $r->post_title;?></span>
		      	<div class="star-rating">
		        	<?php for($i=0; $i<$r->star_rating;$i++):?>
		        	<i class="fa fa-star" aria-hidden="true"></i>
		        	<?php endfor;?>
		        	<?php for($i=$r->star_rating; $i<5;$i++):?>
		        	<i class="fa fa-star grey-star" aria-hidden="true"></i>
		        	<?php endfor;?>		            
		        </div> 
		      </div>
		      <div class="recent-review-comment-box">
		      <img src="<?php echo esc_url(get_avatar_url($r->user_id));?>"/> <i><?php echo $r->user->first_name; ?> <?php echo $r->user->last_name; ?></i>
		      <p><?php  
				$text = stripslashes($r->review);
				$more = '&nbsp;<a href="'.site_url('all-reviews').'"> ... read more</a>';
				echo wp_trim_words( $text, 30, $more);	?></p>
		      </div>
		    </div>
		<?php 
		endforeach;

	}
}
	