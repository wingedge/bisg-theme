<?php get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>
<div class="main-content container single-wrap">
  <div class="row">
    <div id="main" class="main-column col-md-9 col-sm-8">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php $format = get_post_format( get_the_id() ); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <div class="col-md-12">
            <div class="content-image-banner">
              <?php the_post_thumbnail();?>
            </div>
          </div>
        </div>
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
          <div class="col-md-12">
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="col-md-12 deal-form">
            <div class="fb-like-box"></div>
            <div class="deals-step-1">
              <strong> Step 1.)</strong> <button id="insiderShare" class="insider-btn insider-step-1 btn btn-primary" type="button"> Share on Facebook </button><br/>          
            </div>
            <?php /*
            <div class="deals-step-2">
              <strong> Step 2.)</strong> <a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>" id="insiderShare2" class="insider-btn insider-step-2 btn btn-primary btn-disabled"> Share on Twitter </a><br/>
            </div>
            */ ?>
            <div id="insider-form-submit" class="deals-step-2">
              <strong>Step 2.)</strong>
              <?php echo do_shortcode('[contact-form-7 id="26444" title="Insider Deals Form"]'); ?>
            </div>
            <div class="instructions">
              <p>By submitting an entry and giving out your details, you allow Beauty Insider Singapore and the related partner merchandiser to contact you directly via email or phone call for the latest beauty updates and for your appointment even though you may be in the Do-Not-Call registry. You are also agree to receive any promotion or daily newsletter and your information will never sold to anyone. You can unsubscribe easily from Beauty Insider Singapore by sending an email to enquiry@mapletreemedia.com. Read more <a href="<?php echo site_url('terms-conditions');?>">Terms and Conditions</a></p>
            </div>
            <script>                
                $j = jQuery.noConflict();

                // Performant asynchronous method of loading widgets.js
                window.twttr = (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
                  if (d.getElementById(id)) return t;
                  js = d.createElement(s);
                  js.id = id;
                  js.src = "https://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);

                  t._e = [];
                  t.ready = function(f) {
                    t._e.push(f);
                  };

                  return t;
                }(document, "script", "twitter-wjs"));

                
                twttr.ready(function (twttr) {
                  twttr.events.bind('tweet', function(event) {
                    $j('#insiderShare2').removeClass('btn-primary').addClass('btn-default disabled').text('Shared on Twitter').attr('href','#');
                    $j('.deals-step-3').show();
                  });
                });
                

                window.fbAsyncInit = function () {
                  FB.init({
                      appId: '177828646095106',
                      status: true,
                      cookie: true,
                      xfbml: true,
                      oauth: true
                  });

                  // add disable class to submit button
                  $j('#insider-form-submit .wpcf7-submit').prop('disabled',true);
                  $j('#insider-form-submit .wpcf7-submit').addClass('btn btn-default btn-primary disabled');
           
                  $j('#insiderShare').on('click',function(){
                    FB.ui(
                    {
                        method: 'feed',                       
                        link: '<?php the_permalink();?>',
                        picture: '<?php echo get_the_post_thumbnail_url(get_the_id(),'medium_large');?>',
                        caption: '<?php the_title();?>',
                        description: 'no description',
                        quote: "Hey everyone ! Check out the latest Beauty Insider DEAL #insiderdeals #beautyinsidersg.", 
                    },
                        function (response) {                            
                            if (response === null) {
                                console.log('post was not published');
                            } else {
                                //alert('Post was published.');
                                $j('.insider-step-1').prop('disabled',true).removeClass('btn-primary').addClass('btn-default').text('Shared on FB'); 
                                $j('#insider-form-submit .wpcf7-submit').prop('disabled',false).removeClass('disabled');
                                //$j('.deals-step-2').show();
                            }
                        }
                    );

                    });
                  
           
              };

              (function (d) {
                  var js, id = 'facebook-jssdk';
                  if (d.getElementById(id)) {
                      return;
                  }
                  js = d.createElement('script');
                  js.id = id;
                  js.async = true;
                  js.src = "//connect.facebook.net/en_US/all.js";
                  d.getElementsByTagName('head')[0].appendChild(js);
              }(document));
            </script>

          </div>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
      <div class="row">
        <div>
          <h3 class="cat-titles pink-dashed" style="text-align:left;"><span>You can check these out as well</span></h3>
          <?php /*set arguments */
            $insiderArgs = array(
                'posts_per_page'  => 12,
                'post_type'     => 'insider_deals',                         
                'file_template'   => 'section/single-related-articles.php',                      
                'orderby' => 'rand',                    
            );
          ?>
          <div class="related-review-container slick-slider-four singlepost-products-carousel" id="products-carousel"><?php bi_display_articles($insiderArgs); ?></div>         
        </div>
      </div>
    </div>
    <div id="sidebar" class="sidebar col-md-3 col-sm-4">
      <?php get_sidebar('articles');?>
    </div>
  </div>
  
</div>
<?php get_footer(); ?>
