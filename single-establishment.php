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
          </div>     
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">       
                <div class="entry-content">         
                  

                  <h2 class="content-title"><?php the_title();?></h2>
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
                  <?php if( get_field('short_description') ): ?>
                    <?php the_field('short_description'); ?>                  
                  <?php else:?>
                    <p>We currently have no further information at the moment, we will update this as soon as possible, please visit this page again.</p>
                  <?php endif; ?>
                </div>        
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">   
          <div class="col-md-12">
            <div class="tabbable  bi-tabs" id="tabs-single-product">           
              
              <ul class="nav nav-tabs">
                <li class="active"><a href="#panel-reviews" data-toggle="tab">Reviews(0)</a></li>
                <!--<li><a href="#panel-description" data-toggle="tab">Description</a></li>-->
                <li><a href="#panel-locations" data-toggle="tab">Location</a></li>                
              </ul>           

              <div class="tab-content">                
                <div class="tab-pane" id="panel-details">               
                  <h2>Details</h2>                  
                  <?php if( get_field('short_description') ): ?>
                    <?php the_field('short_description'); ?>                  
                  <?php endif; ?>                
                </div>                
                <div class="tab-pane" id="panel-locations">
                  <h2>Locations</h2>
                  <?php the_field('locations');?>
                </div>
                <div class="tab-pane active" id="panel-reviews">
                  <h2>Reviews</h2>
                  <p>
                    <?php get_template_part('section/review','form');?>
                  </p>
                </div>
              </div>

            </div>
          </div>          
        </div>
      </div>      

    <?php endwhile; // End the loop. Whew. ?>
    </div>
    
    <div id="sidebar" class="sidebar col-md-3"> 
      <?php get_sidebar('product');?>
    </div>

  </div>
</div>
<?php get_footer(); ?>
