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

.less-hidden{display:none;}

.msg1 #no-article, .msg2 #no-article{
  display: none;
}

/** collapse readmore **/
#summary {
  font-size: 14px;
  line-height: 1.5;
}

#summary p.collapse:not(.show) {
    height: 62px !important;
    overflow: hidden;
  
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
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
      
      <div class="brand_content_wrap more-less" id="summary">     

        <?php if (strlen(get_field('brand_content')) > 250):?>
          <div class="short-content">
            <?php 
              echo wp_trim_words( get_field('brand_content'), 50, ' <p><a href="#" class="load-more">read more</a></p>' );
            ?>
          </div>
          <div class="full-content" style="display:none;">
            <?php echo  get_field('brand_content'); ?>
            <p><a href="#" class="load-less">read less</a></p>
          </div>
        <?php else:?>
          <div class="full-content">
            <?php echo  get_field('brand_content'); ?>
          </div>
        <?php endif;?>
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
          <!--<li><a href="#panel-maps" data-toggle="tab">Maps</a></li>-->
          <li><a href="#panel-products" data-toggle="tab">Products</a></li>
          
          <?php if (get_field('brand_video')):?>
          <li><a href="#panel-videos" data-toggle="tab">Videos</a></li>
          <?php endif;?>

          <!-- <li><a href="#panel-reviews" data-toggle="tab">Reviews</a></li> -->

          <?php if( get_field('where_to_buy') ): ?>
            <li><a href="#panel-wheretobuy" data-toggle="tab">Where to buy</a></li>
          <?php endif;?>
          
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="panel-contact">
            <div>
              <?php the_field('brand_info'); ?>              
            </div>
          </div>
          <!--
          <div class="tab-pane" id="panel-maps">
            <div><?php echo html_entity_decode( get_field('brand_map'));?></div>
          </div>
          -->
          <div class="tab-pane modifiedimg" id="panel-products">            
            <div>

            <!-- award product -->
            <center>              

            <div class="msg1">
            <?php 
              //$current_page = 'acuvue';
              $current_page = get_post_field( 'post_name', get_post() );
              //echo $current_page;
              $args = array(
                'post_type' => 'beauty_winners',
                'posts_per_page' => -1,
                //'column_width'    => 'col-md-3',
                'file_template'   => 'section/category-product.php',        
                'category_name' => NULL,
                'tax_query'     => array(
                                    array(
                                      'taxonomy' => 'winners_cat',
                                      'field' => 'slug',
                                      'terms' => $current_page,
                                  )),
              );
              bi_display_products($args);
            ?>
            </div>
           
            <div class="msg2">
            <?php 
              
              //echo $current_page;
              $args = array(
                'posts_per_page' => 4,
                //'column_width'    => 'col-md-3',
                'file_template'   => 'section/category-product.php',        
                'category_name' => NULL,
                'tax_query'     => array(
                                    array(
                                      'taxonomy' => 'brand-category',
                                      'field' => 'slug',
                                      'terms' => $current_page,
                                  )),
              );
              bi_display_products($args);
            ?>
            </div>
            </center>


            </div>            
          </div>
          <?php if (get_field('brand_video')):?>
          <div class="tab-pane" id="panel-videos">
            <div><?php the_field('brand_video');?></div>
          </div>
          <?php endif;?>
          <!-- <div class="tab-pane" id="panel-reviews">
            <h2>Reviews</h2>                  
            <?php get_template_part('section/review','form');?>        
          </div> -->

          <?php if( get_field('where_to_buy') ): ?>
            <div class="tab-pane" id="panel-wheretobuy">
              <h2>Where to buy</h2>                  
              <div><?php the_field('where_to_buy');?></div>    
            </div>
          <?php endif; ?>

          

        </div>
      </div>
    </div>
  </div>
</div>
