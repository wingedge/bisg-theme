<div class="row">
  <div class="col-md-12">
    <div class="content-image-banner">
      <?php the_post_thumbnail();?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="content-title">
      <h2>
        <?php the_title();?>
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
      <?php the_content(); ?>
    </div>
  </div>
</div>