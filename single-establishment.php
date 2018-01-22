<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content single-establishment-wrap container">
  <div class="row">
    <div id="main" class="main-column establishment-column col-md-9">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <div class="col-md-4">
            <div class="content-image-banner">
              <?php the_post_thumbnail();?>
            </div>
            <div class="establishment-details">
              <ul class="list-group" style="margin-top:20px;">
                <li class="list-group-item"><i class="fa fa-map-marker"></i>
                  <?php the_field('establishment_address');?>
                </li>
                <li class="list-group-item"><i class="fa fa-phone"></i>
                  <?php the_field('establishment_phone');?>
                </li>
              </ul>
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
                    <div class="product-attributes establishment-attributes">
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
                  <?php the_content();?>
                  <?php #echo preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', get_the_content());?>
                  <?php /*
                  <?php if( get_field('short_description') ): ?>
                    <?php the_field('short_description'); ?>                  
                  <?php else:?>
                    <p>We currently have no further information at the moment, we will update this as soon as possible, please visit this page again.</p>
                  <?php endif; ?>

                  */?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
          $postCategories = wp_get_post_categories(get_the_ID()); // get all categories under this post
          foreach($postCategories as $postCategory){
            $categoryObject = get_category($postCategory);
            $thisCategories[] = $categoryObject->slug;
          }
        ?>
        <div class="row">
          <div class="col-md-12">
            <div class="tabbable  bi-tabs" id="tabs-single-product">
              <ul class="nav nav-tabs">
                <?php if ( !in_array('aesthetics', $thisCategories) ) : ?>
                <li><a href="#panel-reviews" data-toggle="tab">Reviews</a></li>                
                <?php if( get_field('locations') ): ?><li><a href="#panel-locations" data-toggle="tab">Location</a></li><?php endif;?>
                <?php else:?>
                <?php if( get_field('locations') ): ?><li class="active"><a href="#panel-locations" data-toggle="tab">Location</a></li><?php endif;?>
                <?php endif; ?>
                <li class="active"><a href="#panel-map" data-toggle="tab">Map</a></li>
                
              </ul>
              <div class="tab-content" style="margin-bottom:30px;">
                <?php if ( !in_array('aesthetics', $thisCategories) ) : ?>
                <div class="tab-pane" id="panel-reviews">
                  <h2>Reviews</h2>
                  <p>
                    <?php get_template_part('section/review','form');?>
                  </p>
                </div>
                <div class="tab-pane" id="panel-locations">
                  <?php if( get_field('locations') ): ?>
                  <h2>Locations</h2>
                  <?php the_field('locations');?>
                  <?php endif; ?>
                </div>
                 <div class="tab-pane active" id="panel-map">
                  <?php if( get_field('establishment_map') ): ?>
                  <h2>Map</h2>                  
                  <?php $map = get_field('establishment_map'); ?>
                  <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
                  </div>                  
                  <?php endif; ?>
                </div>
                <?php else:?>
                <div class="tab-pane active" id="panel-locations">
                  <?php if( get_field('locations') ): ?>
                  <h2>Locations</h2>
                  <?php the_field('locations');?>
                  <?php endif; ?>
                </div>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <?php get_template_part('section/review','related'); ?>
    </div>
    <div id="sidebar" class="sidebar col-md-3">
      <?php get_sidebar('product');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
