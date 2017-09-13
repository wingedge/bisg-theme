<div class="row">
  <div class="col-md-12">
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
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="content-title">
      <h2><?php the_title();?></h2>
    </div>
  </div>
</div>