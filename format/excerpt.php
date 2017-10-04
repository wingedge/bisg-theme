<div class="row">
  <div class="col-md-12">
    <div class="content-image-banner">
      <?php $format = get_post_format( get_the_id() ); ?>
      <?php if($format == 'video'):?>
      <div class="video-wrapper">
      <?php
      $vidId = get_field('_video-id');
      $host = get_field('_video-host');
      switch($host){
        case 'youtube' : 
        echo '<iframe wmode="transparent" src="http://www.youtube.com/embed/'.$vidId.'?wmode=transparent" frameborder="0" allowfullscreen=""></iframe>';
        break;
        default : 
        echo '<iframe wmode="transparent" src="http://www.youtube.com/embed/'.$vidId.'?wmode=transparent" frameborder="0" allowfullscreen=""></iframe>';
        break;
      }
      ?>
      </div>
      <?php else:?>
      <a href="<?php the_permalink();?>">
        <?php the_post_thumbnail();?>
      </a>
      <?php endif;?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="content-title">
      <h2>
        <a href="<?php the_permalink();?>"><?php the_title();?></a>
      </h2>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="content-categories"> <strong>Categories : </strong>
      <?php the_category(); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="entry-content">
      <?php the_excerpt(); ?>
    </div>
  </div>
</div>