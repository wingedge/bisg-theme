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
                  

                  <h2 class="content-title">About <?php the_title();?></h2>
                 
                  <?php echo get_the_tag_list('<p>Tags: ',', ','</p>'); ?>
                  <?php the_content();?>
                </div>        
              </div>
            </div>
          </div>
        </div>
        
        <div class="row" style="padding:15px 0;">   
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
                  <?php the_field('contact_information'); ?>                                    
                </div>                
                <div class="tab-pane" id="panel-maps">                  
                  <?php echo html_entity_decode( get_field('maps'));?>
                </div>
                <div class="tab-pane" id="panel-products">                  
                  Products
                </div>
                <div class="tab-pane" id="panel-videos">                  
                  Videos
                </div>
                <div class="tab-pane" id="panel-reviews">                  
                  Reviews
                </div>              
              </div>

            </div>
          </div>          
        </div>
      </div>   