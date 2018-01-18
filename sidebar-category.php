	<div class="recent-articles">
	<?php 
		$defaultArticles = array(		
		'posts_per_page' 	=> 4,
		'post_type'			=> 'post',		
		);
		$defaultArticles = array(
                'category_name' => single_cat_title(null,false),                
                'posts_per_page' => 5,
                'orderby' => 'date',                
                'order' => 'desc',
              );
	?>
	<?php bi_display_articles($defaultArticles);?>
	</div>
	<div class="readmore readmore-cat"><a href="<?php echo site_url('/blog/'); ?>"><span>View More</span></a></div>

	
            <div class="row">
          <div class="col-md-12 text-center" style="margin-top:20px;">
            <img class="img-logo" src="/wp-content/uploads/2017/05/binsider-circle-logo-90x90.png" height="90" width="90">
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
				<?php echo do_shortcode(' [contact-form-7 id="22053" title="Contact form Us"] ');?>
			</div>
          </div>
        </div>
	
