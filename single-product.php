<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content single-product-wrap container">
  <div class="row">
    <div id="main" class="main-column product-column col-md-9 col-sm-8">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <div class="col-md-4">
            <div class="content-image-banner">
              <?php the_post_thumbnail();?>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="entry-content">
                  <h2 class="content-title">
                    <?php the_title();?>
                  </h2>
                  <?php /*
                  <div class="product-attributes">
                    <?php $attributes = get_the_terms(get_the_id(),'attribute_category'); ?>
                    <?php if($attributes):?>
                    <?php foreach($attributes as $attribute):?>
                    <?php if($attribute->parent > 0):?>
                    <span class="attribute btn btn-default btn-sm"><?php echo $attribute->name;?></span>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                    <?php $attributes = get_the_terms(get_the_id(),'category'); ?>
                    <?php if($attributes):?>
                    <?php foreach($attributes as $attribute):?>
                    <?php if($attribute->parent > 0):?>
                    <span class="attribute btn btn-default btn-sm"><?php echo $attribute->name;?></span>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                  </div>
                  <?php echo get_the_tag_list('<p>Tags: ',', ','</p>'); ?>
                  */ ?>
                  <?php if( get_field('short_description') ): ?>
                    <?php the_field('short_description'); ?>                  
                  <?php else:?>
                    <?php the_content(); ?>
                  <?php endif; ?>
                  
                  

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tabbable bi-tabs" id="tabs-single-product">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#panel-reviews" data-toggle="tab">Reviews( <?php echo $BIReview->get_review_count(get_the_ID());?> )</a></li>
                <!--<li><a href="#panel-description" data-toggle="tab">Description</a></li>-->
                <li><a href="#panel-details" data-toggle="tab">Details</a></li>
                <li><a href="#panel-ingredients" data-toggle="tab">Ingredients</a></li>
                <li><a href="#panel-videos" data-toggle="tab">Videos</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="panel-details">
                  <h2>Details</h2>
                  <?php if( get_field('full_description') ): ?>
                  <?php the_field('full_description'); ?>
                  <?php else: ?>
                  <?php the_content();?>
                  <?php endif; ?>
                </div>
                <div class="tab-pane" id="panel-videos">
                  <h2>Videos</h2>
                  <?php  the_field('videos');?>
                </div>
                <div class="tab-pane" id="panel-ingredients">
                  <h2>Ingredients</h2>
                  <?php the_field('ingredients');?>
                </div>
                <div class="tab-pane active" id="panel-reviews">
                  <h2>Reviews</h2>                  
                  <?php get_template_part('section/review','form');?>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>

      <?php get_template_part('section/review','related'); ?>

    </div>
    <div id="sidebar" class="sidebar col-sm-4 col-md-3">
      <?php get_sidebar('product');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
