<div class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12 footerbox mbc-off">
        <h3 class="footer-title">More than just a Singapore Beauty Magazine</h3>
		    <p>Beauty Insider is your best source for Singapore beauty reviews on makeup, skincare, haircare, spas and salons. We don’t just give beauty tips and trends — we tell which beauty products and treatments really work! Our exclusive Beauty Insider Rewards program also lets you earn points you can exchange for prizes, and the chance to join contests or get special beauty freebies. You can also be selected to join the Beauty Insider Trial team, where you’ll be given beauty samples to review. Beauty Insider is your chance to read, discover, and try the best beauty products and treatments in Singapore. Whether you’re looking for a brightening cream, an anti-aging routine, or the latest treatment for acne scars or tighter pores, we are your number one source for Singapore beauty.</p>
      </div>
      
      <div class="col-md-4 col-sm-6 footerbox mbc-off">
        <h3 class="footer-title">Quick Links</h3>
        <ul>
          <li><a href="<?php echo site_url('/rewards-and-redemption/');?>">Rewards and Redemption</a></li>
          <li><a href="<?php echo site_url('trial-team-form');?>">Trial Team Form</a></li>
          <li><a href="<?php echo site_url('about-us');?>">About Us</a></li>
          <li><a href="<?php echo site_url('hey-gorgeous');?>">Hey Gorgeous Bag</a></li>
          <li><a href="<?php echo site_url('contributors');?>">Contributors</a></li>
          <li><a href="<?php echo site_url('faqs');?>">FAQs</a></li>
          <li><a href="<?php echo site_url('terms-conditions');?>">Terms &amp; Conditions</a></li>
          <li><a href="<?php echo site_url('contact-us');?>">Contact Us</a></li>
            <li><a href="<?php echo site_url('advertise-with-us');?>">Advertise with Us</a></li>
        </ul>
        <h3 class="footer-title">Get in touch with us!</h3>
        <strong>Mapletree Media Pte Ltd</strong><br/>
        Atrix #01-07,<br/>
        82 Lorong 23 Geylang<br/>
        Singapore 388409<br/>
        <a href="http://www.mapletreemedia.com" target="_blank">www.mapletreemedia.com</a>
		    <div class="social-media-links" style="margin-top: 20px;">
  			  <ul class="footer-socials">        	  
  				  <li><a href="https://www.facebook.com/BeautyInsiderSG/"  target="_blank"><span class="socialmediaicon icon-fb"></span></a></li>
  				  <li><a href="https://www.instagram.com/beautyinsidersg/" target="_blank"><span class="socialmediaicon icon-instagram"></span></a></li>
  				  <li><a href="https://www.youtube.com/channel/UCivBkbF77mVPcpGfgz9dMxA" target="_blank"><span class="socialmediaicon icon-youtube"></span></a></li>
  				  <li><a href="https://twitter.com/beauty_sg" target="_blank"><span class="socialmediaicon icon-twitter"></span></a></li>
  				  <li><a href="http://www.beautyinsider.ph" target="_blank"><span class="phicon"></span></a></li>
  			  </ul>
		    </div>
      </div>
     
      <div class="col-md-4 col-sm-6 footerbox gettouch">
          <div class="subscribe-form">
            <div class="footer-subs-tip">
              <?php $beauty_tip = new WP_Query(array('post_type' => 'beauty_tips', 'orderby'=>'rand', 'posts_per_page'=>'1'));?>
              <?php while ($beauty_tip->have_posts()) : $beauty_tip->the_post(); ?>    
              <p><?php the_content(); // or the_content(); ?></p>
              <?php endwhile; wp_reset_postdata(); ?>             
            </div>
              <h2 class="footer-subs-head">Up your Makeup Game this Year</h2>
              <h3 class="footer-subs-sub cft">Be the first to know about the latest beauty products, treatments, breaking beauty news. <strong>Subscribe to our newsletter</strong></h3>
                <?php echo do_shortcode( '[contact-form-7 id="31099" title="Newsletter"]' );?>
          </div>
          <div>
            <h3 class="footer-sub-title adcustom">“Advertise with us, <a href="mailto:sean@mapletreemedia.com">email</a> or fill out the form <a href="http://beautyinsider.sg/advertise-with-us">here</a>”</h3>
          </div>
      </div>


    </div>


  </div>
</div>
<div class="copyright mbc-off" style="margin-bottom: 0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beauty Insider <?php echo date('Y');?></a>.         
        All Rights Reserved. Designed By: <a href="http://mapletreemedia.com/">Mapletree Media Pte Ltd</a>
      </div>
    </div>
  </div>
</div>

<div class="copyright mbc">
      <div class="container">
            
            <ul class="smedia">
              <li><a href="https://www.facebook.com/BeautyInsiderSG/"><img src="http://beautyinsider.sg/wp-content/uploads/2018/01/BI-ft-fb.png"></a></li>
              <li><a href="https://www.instagram.com/beautyinsidersg/"><img src="http://beautyinsider.sg/wp-content/uploads/2018/01/BI-ft-ins.png"></a></li>
              <li><a href="https://twitter.com/beauty_sg"><img src="http://beautyinsider.sg/wp-content/uploads/2018/01/BI-ft-tw.png"></a></li>
              <li><a href="https://www.youtube.com/channel/UCivBkbF77mVPcpGfgz9dMxA"><img src="http://beautyinsider.sg/wp-content/uploads/2018/01/BI-ft-yt.png"></a></li>
            </ul>
                        
            <ul class="footpage">              
              <li><a href="<?php echo site_url('about-us');?>">About Us</a></li>
              <li><a href="<?php echo site_url('faqs');?>">FAQs</a></li>
              <li><a href="<?php echo site_url('terms-conditions');?>">T&C</a></li>
              <li><a href="<?php echo site_url('contact-us');?>">Contact Us</a></li>
            </ul>              

            <p class="cfoot">Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beauty Insider <?php echo date('Y');?></a>.
            All Rights Reserved. </p>
          
      </div>
</div>



<?php if ( is_active_sidebar( 'sidebar-fppt' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-fppt' ); ?>
<?php else:?>
<?php endif; // end primary widget area ?>

<!-- canvass-->

<?php get_template_part('section/login','modal'); ?>   


<?php wp_footer(); ?>

<script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/s/a?url=beautyinsider.sg'></script>



</body>
</html>