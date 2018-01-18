<?php 
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>
<div class="main-content container sub-page">
  <div class="row">
    <div id="main" class="main-column col-md-12">   
      <?php while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">         
            <h2 class="content-title"><?php the_title();?></h2>
            <hr class="divider"/>
            <div class="row">
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12"><?php putRevSlider( 'professional-featured-posts' ); ?></div>
                </div>

                <div class="row">
                  <div class="col-sm-4">                    
                    <h2 style="font-size: 22px;color: #d10019;line-height: 22px;text-align: right;font-family:Playfair Display;font-weight:900;font-style:normal">
                      Are you in the beauty industry?
                    </h2>
                  </div>
                  <div class="col-sm-8"> 
                    <p style="margin-top:20px">Learn more about the trends, technology and your fellow brand managers, doctors, and industry thought leaders.</p>
                  </div>                  
                </div>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <h3 class="pink-dashed"><span>Featured</span></h3>
                    <div class="featured-container slick-slider-four" id="featured-carousel">
                      <?php 
                        $args1 = array(
                          'post_type' => array('brand','establishment'),
                          'tax_query' => array(array(
                              'taxonomy' => 'category',
                              'field' => 'slug',
                              'terms' => 'professional',                              
                          )),
                        );                        
                      ?>
                      <?php bi_display_professional($args1);?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <h3 class="pink-dashed"><span>Devices</span></h3>
                    <div class="featured-video-container slick-slider-four" id="articles-carousel">
                      <?php 
                        $args = array(
                          'post_type' => 'post',
                          'tax_query' => array(array(
                              'taxonomy' => 'category',
                              'field' => 'slug',
                              'terms' => 'professional',
                          )),
                        );                        
                      ?>                      
                      <?php bi_display_products($args);?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <h3 class="pink-dashed"><span>Skin Care</span></h3>
                    <div class="featured-video-container slick-slider-four" id="skincare-carousel">
                      <?php 
                        $args = array(
                          'post_type' => 'product',
                          'tax_query' => array(array(
                              'taxonomy' => 'category',
                              'field' => 'slug',
                              'terms' => array('skin-care'),
                              'operator' => 'IN',
                          )),
                        );                        
                      ?>                      
                      <?php bi_display_products($args);?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <h3 class="pink-dashed"><span>Hair / Grooming</span></h3>
                    <div class="featured-video-container slick-slider-four" id="skincare-carousel">
                      <?php 
                        $args = array(
                          'post_type' => 'product',
                          'tax_query' => array(array(
                              'taxonomy' => 'category',
                              'field' => 'slug',
                              'terms' => array('hair-care'),
                              'operator' => 'IN',
                          )),
                        );                        
                      ?>                      
                      <?php bi_display_products($args);?>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <img class="img-logo" src="/wp-content/uploads/2017/05/binsider-circle-logo-90x90.png" width="90" height="90"/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h3 style="font-size: 55px;color: #d10019;text-align: center;font-family:Playfair Display;font-weight:700;font-style:normal" class="vc_custom_heading">
                      can Help your Beauty Biz!
                    </h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p>✓ announce your sales and promos</p>
                    <p>✓ add your brand or establishment to our directory</p>
                    <p>✓ include your brand in our editorial specials</p>
                    <p>✓ tie-up for contests and product seeding campaigns</p>
                    <p>✓ get digital marketing and SEO experts to build your image, reach, ranking and sales leads</p>
                    <h2>Tell us how to reach you so we can help.</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div style="overflow:hidden;">
                    <?php echo do_shortcode('[contact-form-7 id="22053" title="Contact form Professionals"]');?>
                    </div>
                  </div>
                </div>




              </div><!--sidebar-->
            </div><!-- row-->

            <?php #the_content(); ?>
          </div>
        </div>
      <?php endwhile; // End the loop. Whew. ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>