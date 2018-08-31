<div class="cpdtop"></div>
<div class="yp-title1 mintop20">Your Reviews</div>
<div class="clearfx"></div>

<div class="yp-mp">
<div class="cpdbotpad"></div>

<div class="row yp-products">
    <?php $recentReviews = $BIReview->get_reviews_by_user($current_user->ID);?>
    <?php if($recentReviews):?>
    <?php foreach($recentReviews as $recentReview):?>
     <?php $reviewedPost = get_post($recentReview->post_id); ?>  

    <div class="col-sm-4">
        <div class="yp-p">
          <a href="<?php echo get_post_permalink($recentReview->post_id); ?>">
            <center>
              <div class="yp-p-thumb"><?php echo get_the_post_thumbnail($recentReview->post_id, 'thumbnail' );?></div>
              <div class="newylr-container">
                        <h5><?php echo $recentReview->title; ?></h5>
                        <p><strong><?php echo get_the_title($recentReview->post_id); ?></strong></p>
                        <p><?php echo $recentReview->content; ?></p>
                        <p>Rating : <?php echo $recentReview->rating;?>/5</p>
              </div>
             </center>
          </a>
        </div>
    </div>

    <?php endforeach;?><?php else:?>
              <div class="wmsg"> <p>No Reviews</p> </div>
    <?php endif;?>

</div>

</div>
