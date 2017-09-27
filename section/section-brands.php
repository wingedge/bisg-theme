<style>
.brand_map iframe {
	max-width:100%;
}
#tabs-single-product .tab-pane > div {
	padding: 25px;
}
.content-title.brand-title {
  display: block;
  margin-bottom: 0;
  padding-bottom: 0;
}
.content-title.brand-title hr {
  margin: 15px 0 0;
  padding: 0;
}
.tabbable.bi-tabs {
  margin-top: 25px;
}
</style>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-md-12">
      <h2 class="content-title brand-title">About -
        <?php the_title();?><hr/>
      </h2>
    </div>
  </div>
  <div class="row" style="padding-top:25px;">
    <div class="col-md-4 brand_img_thumb">
      <?php the_post_thumbnail('full');?>
    </div>
    <div class="col-md-8 brand_content">
      <div class="brand_tag_list"><?php echo get_the_tag_list('<p>Tags: ',', ','</p>'); ?></div>
      <div class="brand_content_wrap">
        <?php the_field('brand_content');?>
      </div>
      <?php //the_content();?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable  bi-tabs" id="tabs-single-product">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#panel-contact" data-toggle="tab">Contact Information</a></li>
          <!--<li><a href="#panel-description" data-toggle="tab">Description</a></li>-->
          <li><a href="#panel-maps" data-toggle="tab">Maps</a></li>
          <li><a href="#panel-products" data-toggle="tab">Products</a></li>
          <li><a href="#panel-videos" data-toggle="tab">Videos</a></li>
          <li><a href="#panel-reviews" data-toggle="tab">Reviews</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="panel-contact">
            <div>
              <?php the_field('brand_info'); ?>
            </div>
          </div>
          <div class="tab-pane" id="panel-maps">
            <div><?php echo html_entity_decode( get_field('brand_map'));?></div>
          </div>
          <div class="tab-pane" id="panel-products">            
            <div>
            <?php 
              $args = array(
                'posts_per_page' => 4,
                'column_width'    => 'col-md-3',
                'file_template'   => 'section/category-product.php',        
                'category_name' => NULL,
                'tax_query'     => array(
                                    array(
                                      'taxonomy' => 'brand-category',
                                      'field' => 'name',
                                      'terms' => get_the_title(),
                                  )),
              );
              bi_display_products($args);
            ?>
            </div>            
          </div>
          <div class="tab-pane" id="panel-videos">
            <div><?php echo html_entity_decode( get_field('brand_video'));?></div>
          </div>
          <div class="tab-pane" id="panel-reviews">
            <h2>Reviews</h2>                  
            <?php get_template_part('section/review','form');?>        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
