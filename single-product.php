<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>
<div class="main-content container">
  <div class="row">
    <div id="main" class="main-column product-column col-md-9">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
          
          <div class="col-md-6">
            <div class="content-image-banner">
              <?php the_post_thumbnail();?>
            </div>
          </div>
       
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
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
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="entry-content">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
        </div>
        
      </div>
      
      <?php endwhile; // End the loop. Whew. ?>
    </div>
    <div id="sidebar" class="sidebar col-md-3">
      <div class="row">
        <div class="col-md-12">
          <h3 class="cat-titles"><span>Recent Blogs</span></h3>
        </div>
      </div>
      <?php get_sidebar('articles');?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
