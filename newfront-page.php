<?php /* Template name: New Home Page */
get_header(); ?>

<div class="main-content container homepage-main">

		<div class="NFpad10"></div>

		<div class="NF-BITV">
		  <div class="row">
		    <div class="col-sm-12 slider">
		      
		      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		          <div class="carousel-inner" role="listbox">      


		              <?php  

		              	$argsSlider = array(
							'posts_per_page'=>6,
							'post_type'	=> 'post',							
							'order' 			=> 'DESC',
							'orderby'			=> 'date',
							'tax_query' 		=> array(array(
										              'taxonomy' => 'post_tag',
										              'field' => 'slug',
										              'terms' => 'featured',
										           )),
							);					                    	

		                  $trendingnowargslider1 = new WP_Query($argsSlider);
		              ?>


		              


		              <?php $ctr = 0; ?>

		              <?php if ($trendingnowargslider1->have_posts()) : while ( $trendingnowargslider1->have_posts() ) : $trendingnowargslider1->the_post();?>  

		              
		                  <div class="item <?php if ($ctr == 0){ echo('active '); } ?>">
		                    <img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" class="tims-image" width="100%" height="300">
		                    <div class="carousel-caption">
		                      <div class="NF-SContent">
		                      <h5><?php $category = get_the_category(); echo $category[0]->cat_name; ?> </h5>
		                      <a href="<?php the_permalink(); ?>"><h1><?php the_title();?></h1></a>
		                      <p><?php the_excerpt();?></p>
		                    </div>
		                    </div>   
		                  </div>                


		                  <?php 

		                    $NScategoryname[$ctr] = $category[0]->cat_name;
		                    $NStitle[$ctr] = get_the_title();
		                    $ctr = $ctr + 1; 

		                  ?>   


		              <?php endwhile; endif; wp_reset_postdata();?>

		          </div> 


		      </div>



		      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span>
		      </a>

		      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span>
		      </a>


		    </div>
		  </div>
		</div>


		<div class="NFpad10"></div>

		  <div class="container">
		  
		    <div class="row">        

		        <ul class="NF-slider">
		              
		                  <?php $ctr = $ctr - 1; //overlap counter
		                  for ($x = 0; $x <= $ctr; $x++) { ?>
		                      
		                      <li data-target="#carousel-example-generic" data-slide-to="<?php echo $x; ?>" class="<?php if ($x == 0){ echo('active '); } ?>NFCLine">
		                          <div class="NFCattitle"> <?php echo $NScategoryname[$x] ?></div>
		                          <div class="NFCatdesc"> <?php echo $NStitle[$x] ?> </div>
		                      </li>


		                  <?php } ?>


		                                 

		              
		        </ul>
		    </div>
		</div>
		
	
		<hr class="newhomepagehr">

		<!-- SKINCARE CATEGORY -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">SKINCARE</div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <?php         
		      $skinargs = new WP_Query( array ( 
		        'category_name' => 'skincare', 
		        'posts_per_page' => '4',
            'order'       => 'DESC',
            'orderby'     => 'date'
            ) 
		      );
		      ?>
		   <?php if ($skinargs->have_posts()) : while ( $skinargs->have_posts() ) : $skinargs->the_post();?>   
		   <div class="col-sm-3">
		      <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>		      
		      <div class="clearfx Mpad"></div>
		   </div>
		   <?php endwhile; endif; wp_reset_postdata();?>      
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/skincare-articles">CHECK OUT ALL ARTICLES ON SKINCARE</a></div>
		   </div>

		</div>
		<div class="NFpad40"></div>



		<!--  Insider  deals CATEGORY -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">Insider Deals</div>
		</div>
		<div class="NFpad10"></div>

		<div class="row">

			<div class="slick-slider-four" id="featured-carousel">
			   <?php         
			      $skinargs = new WP_Query( array ( 
			      	'post_type'     => 'insider_deals',
			        'posts_per_page' => '-1',
		            'order'       => 'DESC',
		            'orderby'     => 'date',	            
	            	) 
			      );
			      ?>
			   <?php if ($skinargs->have_posts()) : while ( $skinargs->have_posts() ) : $skinargs->the_post();?>   
			   <div class="col-sm-3">
			      <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
			      <div class="NFpad10"></div>
			      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
			      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>		      
			      <div class="clearfx Mpad"></div>
			   </div>
			   <?php endwhile; endif; wp_reset_postdata();?>   
		   </div>

		</div>


		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/insider-deals">CHECK OUT ALL BEAUTY INSIDER DEALS</a></div>
		   </div>

		</div>
		<div class="NFpad40"></div>






		<!-- MAKEUP & TRENDING TREADS CATEGORY -->
		<div class="row" >
		   <div class="col-sm-8">
		      <div class="row">
		         <div class="col-sm-12 NFup NFMainCat">MAKEUP</div>
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <?php         
		            $makeupargs = new WP_Query( array ( 
		              'category_name' => 'makeup', 
		              'posts_per_page' => '2',
                  'order'       => 'DESC',
                  'orderby'     => 'date'
                  ) 
		            );
		            ?>
		         <?php if ($makeupargs->have_posts()) : while ( $makeupargs->have_posts() ) : $makeupargs->the_post();?>   
		         <div class="col-sm-6">
		            <div class="NFMainCatImg-medium"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		            <div class="NFpad10"></div>
		            <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		            <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		            <div class="clearfx Mpad"></div>
		         </div>
		         <?php endwhile; endif; wp_reset_postdata();?>      
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <div class="col-sm-6"></div>
		         <div class="col-sm-6">
		            <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/makeup-articles">CHECK OUT ALL ARTICLES ON MAKEUP</a></div>
		         </div>
		      </div>

		      <div class="NFpad20"></div>

		      <div class="row">
		         <div class="col-sm-12 NFup NFMainCat">HAIR</div>
		      </div>

		      <div class="NFpad10"></div>

		      <div class="row">
		         <?php         
		            $hairargs = new WP_Query( array ( 
		              'category_name' => 'hair', 
		              'posts_per_page' => '2',
                  'order'       => 'DESC',
                  'orderby'     => 'date' ) 
		            );
		            ?>
		         <?php if ($hairargs->have_posts()) : while ( $hairargs->have_posts() ) : $hairargs->the_post();?>  
		         <div class="col-sm-6">
		            <div class="NFMainCatImg-medium"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></div></a>
		            <div class="NFpad10"></div>
		            <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		            <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		            <div class="clearfx Mpad"></div>
		         </div>
		         <?php endwhile; endif; wp_reset_postdata();?>             
		      </div>

		      <div class="NFpad10"></div>
		      <div class="row">
		         <div class="col-sm-6"></div>
		         <div class="col-sm-6">
		            <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/hair-articles">CHECK OUT ALL ARTICLES ON HAIR</a></div>
		            <div class="clearfx Mpad"></div>
		         </div>
		      </div>
		   </div>
		   


		   <div class="col-sm-4">
		      <div class="row">
		         <div class="col-sm-12 NFup NFMainCat-Black">TRENDING READS</div>
		      </div>
		      <div class="NFpad10"></div>
		      <?php
		         $trendingnowargs = new WP_Query( array ( 
		           'category_name' => 'scoop', 
		           'posts_per_page' => '2',
               'order'       => 'DESC',
               'orderby'     => 'date'
               ) 
		         );?>
		      <?php if ($trendingnowargs->have_posts()) : while ( $trendingnowargs->have_posts() ) : $trendingnowargs->the_post();?>  
		      <div class="row">
		         <div class="col-sm-4">
		            <div class="NFMainCatImg-box"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'thumbnail'); ?>" width="100%"></a></div>
		         </div>
		         <div class="col-sm-8 NFnopadding-LR">
		            <div class="NFMainCatTR-title"><a href="<?php the_permalink();?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a> </div>
		            <div class="NFMainCatTR-desc "><?php the_title();?></div>
		            <a href="<?php the_permalink();?>" class="NFMainCatTR-RN NFup">Read Now </a>
		            <div class="clearfx Mpad"></div>
		         </div>
		      </div>
		      <div class="NFpad10"></div>

		      

		      <?php endwhile; endif; wp_reset_postdata();?> 
		      <div class="row">
		      		<div class="NFMCHK"><a href="https://beautyinsider.sg/category/scoop/">CHECK OUT ALL ARTICLES ON SCOOP</a></div>
		  	  </div>
		  	  <div class="NFpad10"></div>
		      <!-- <video width="100%" autoplay loop muted>
				  <source src="https://beautyinsider.sg/wp-content/uploads/2018/03/WhatsApp-Video-2018-03-20-at-6.30.04-PM.mp4" type="video/mp4">
			  </video> -->

			  <div class="row">
		         <center><a href="https://beautyinsider.sg/awards-2018/"><img src="https://beautyinsider.sg/wp-content/uploads/2018/05/Intro-Teaser-New.gif" width="100%"></a></center>
		      </div>
		    
			  <div class="NFpad10"></div>
		      <div class="NFreviews">
		         <div class="NFredbk2 NFup NFMainCat">Recent Reviews</div>
		         <div class="recent-review s-widget">
		            <?php 
		               #$review = new BIReviewer();
		               global $BIReview;
		               $BIReview->render_random_review();
		               ?>
		         </div>
		      </div>

		      <div class="NFpad10"></div>

		      


		   </div>


		</div>
		<div class="NFpad40"></div>
		<!-- BODY -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">BODY</div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <?php         
		      $bodyargs = new WP_Query( array ( 
		      'category_name' => 'body', 
		      'posts_per_page' => '4',
          'order'       => 'DESC',
          'orderby'     => 'date',
          ) 
		      );?>
		   <?php if ($bodyargs->have_posts()) : while ( $bodyargs->have_posts() ) : $bodyargs->the_post();?>  
		   <div class="col-sm-3">
		      <div class="NFMainCatImg"> <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		      <div class="clearfx Mpad"></div>
		   </div>
		   <?php endwhile; endif; wp_reset_postdata();?>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/body-articles">CHECK OUT ALL ARTICLES ON BODY</a></div>
		      <div class="clearfx Mpad"></div>
		   </div>
		</div>
		<!-- SCOOP / TRIED, TESTED & LOVED -->
		<div class="row">
		   <div class="col-sm-8">
			  <div class="NFpad40"></div>
		      <div class="NF-BITV">
		         <div class="row">
		            <div class="col-sm-12">
		               <div class="NF-BITV-title">THE SCOOP</div>
		               <a href="<?php bloginfo('url'); ?>/category/scoop/"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/03/thescoop2.jpg"></a>
		            </div>
		         </div>
		      </div>
		   </div>
		   <div class="col-sm-4" style="background: #fefcfe">
			  <div class="NFpad40"></div>
		      <div class="NFredbk NFup NFMainCat">TRIED, TESTED & LOVED</div>
		      <div class="NFpad10"></div>
		      <div class="featured-video-container slick-slider-one" id="sidebar-product-carousel">
		         <?php $sidebarArgs = array(          
		            'posts_per_page'  => -1,
		            'post_type'     => 'product',
		            'order'       => 'DESC',
		            'orderby'     => 'date', 
		            'tax_query' => array(
		              array(
		              'taxonomy' => 'product_cat',
		              'terms' => 'tried-tested-loved',
		              'field' => 'slug',
		              'operator' => 'IN',
		              ), 
		            ),
		            'file_template'   => 'section/sidebar-products.php', 
		            );
		            
		            ?>
		         <?php bi_display_products($sidebarArgs);?>
		      </div>
		   </div>
		</div>

		<div class="NFpad40"></div>
		<!-- SPAS -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">SPAS</div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <?php         
		      $spasargs = new WP_Query( array ( 
		      'category_name' => 'spas', 
		      'posts_per_page' => '4',
          'order'       => 'DESC',
          'orderby'     => 'date',
          ) 
		      );?>
		   <?php if ($spasargs->have_posts()) : while ( $spasargs->have_posts() ) : $spasargs->the_post();?>  
		   <div class="col-sm-3">
		      <div class="NFMainCatImg"> <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		      <div class="clearfx Mpad"></div>
		   </div>
		   <?php endwhile; endif; wp_reset_postdata();?>     
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/spas-articles">CHECK OUT ALL ARTICLES ON SPAS</a></div>
		      <div class="clearfx Mpad"></div>
		   </div>
		</div>
		<div class="NFpad40"></div>
		<!-- BEAUTY SALONS -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">BEAUTY SALONS</div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <?php         
		      $beautysalonargs = new WP_Query( array ( 
		      'category_name' => 'beauty-salon', 
		      'posts_per_page' => '4',
          'order'       => 'DESC',
          'orderby'     => 'date'
        ) 
		      );?>
		   <?php if ($beautysalonargs->have_posts()) : while ( $beautysalonargs->have_posts() ) : $beautysalonargs->the_post();?>  
		   <div class="col-sm-3">
		      <div class="NFMainCatImg"> <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		      <div class="clearfx Mpad"></div>
		   </div>
		   <?php endwhile; endif; wp_reset_postdata();?>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/beauty-salon-articles">CHECK OUT ALL ARTICLES ON BEAUTY SALONS</a></div>
		      <div class="clearfx Mpad"></div>
		   </div>
		</div>
		<div class="NFpad40"></div>
		<!-- BI TV  -->
		<div class="NF-BITV">
		   <div class="row">
		      <div class="col-sm-12">
		         <div class="NF-BITV-title">Popular Videos</div>
		         <div class="NFpad20"></div>
		         <div class="featured-container slick-slider-four" id="featured-carousel">
		            <?php         
		               $beautysalonargs = new WP_Query( array ( 
		               'category_name' => 'most-popular-video, featured-video',
                   'order'       => 'DESC',
                  'orderby'     => 'date'
                 ) 
		               );?>
		            <?php if ($beautysalonargs->have_posts()) : while ( $beautysalonargs->have_posts() ) : $beautysalonargs->the_post();?>  
		            <div class="col-sm-4">
		               <div class="NFMainCatImg2"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>"></a></div>
		               <div class="NFpad10"></div>
		               <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		               <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Play Now</a>
		            </div>
		            <?php endwhile; endif; wp_reset_postdata();?>
		         </div>
		      </div>
		   </div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/category/most-popular-video/">CHECK OUT ALL VIDEOS</a></div>
		      <div class="clearfx Mpad"></div>
		   </div>
		</div>
		<div class="NFpad40"></div>


		<!-- HAIR SALONS -->
		<div class="row">
		   <div class="col-sm-12 NFup NFMainCat">HAIR SALONS</div>
		</div>
		<div class="NFpad10"></div>
		<div class="row">
		   <?php         
		      $hairsalonsargs = new WP_Query( array ( 
		      'category_name' => 'hair-salons', 
		      'posts_per_page' => '3',
          'order'       => 'DESC',
          'orderby'     => 'date'
          ) 
		      );?>
		   <?php if ($hairsalonsargs->have_posts()) : while ( $hairsalonsargs->have_posts() ) : $hairsalonsargs->the_post();?>  
		   <div class="col-sm-3">
		      <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"> </a></div>
		      <div class="NFpad10"></div>
		      <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		      <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		      <div class="clearfx Mpad"></div>
		   </div>
		   <?php endwhile; endif; wp_reset_postdata();?> 

		   <div class="col-sm-3" style="border: solid 5px #e80062;">		      
		      	<a href="<?php bloginfo('url'); ?>/category/five-minutes-with/"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/06/5min-resize.gif" width="100%"> </a>		      
		   </div>

		</div>

		<div class="NFpad10"></div>

		<div class="row">
		   <div class="col-sm-3"></div>
		   <div class="col-sm-3"></div>		   
		   <div class="col-sm-3">
		      <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/hair-salons-articles">CHECK OUT ALL ARTICLES ON HAIR SALONS</a></div>
		      <div class="clearfx Mpad"></div>
		   </div>
		   <div class="col-sm-3"></div>
		</div>
		<div class="NFpad40"></div>




		<!-- AESTHETICS & WELLNESS -->
		<div class="row">
		   <div class="col-sm-6">
		      <div class="row">
		         <div class="col-sm-12 NFup NFMainCat">AESTHETICS</div>
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <?php         
		            $aestheticsargs = new WP_Query( array ( 
		            'category_name' => 'aesthetics', 
		            'posts_per_page' => '2',
                'order'       => 'DESC',
                'orderby'     => 'date'
              ) 
		            );?>
		         <?php if ($aestheticsargs->have_posts()) : while ( $aestheticsargs->have_posts() ) : $aestheticsargs->the_post();?>  
		         <div class="col-sm-6">
		            <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		            <div class="NFpad10"></div>
		            <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		            <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		            <div class="clearfx Mpad"></div>
		         </div>
		         <?php endwhile; endif; wp_reset_postdata();?>
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <div class="col-sm-6"></div>
		         <div class="col-sm-6">
		            <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/aesthetics-articles">CHECK OUT ALL ARTICLES ON AESTHETICS</a></div>
		            <div class="clearfx Mpad"></div>
		         </div>
		      </div>
		   </div>
		   <div class="col-sm-6">
		      <div class="row">
		         <div class="col-sm-12 NFup NFMainCat">WELLNESS</div>
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <?php         
		            $wellnessargs = new WP_Query( array ( 
		            'category_name' => 'wellness', 
		            'posts_per_page' => '2',
                'order'       => 'DESC',
                'orderby'     => 'date'
                ));?>
		         <?php if ($wellnessargs->have_posts()) : while ( $wellnessargs->have_posts() ) : $wellnessargs->the_post();?>  
		         <div class="col-sm-6">
		            <div class="NFMainCatImg"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large'); ?>" width="100%"></a></div>
		            <div class="NFpad10"></div>
		            <div class="NFMainCatDesc"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
		            <a href="<?php the_permalink();?>" class="NFMainCatRN NFup">Read Now </a>
		            <div class="clearfx Mpad"></div>
		         </div>
		         <?php endwhile; endif; wp_reset_postdata();?>
		      </div>
		      <div class="NFpad10"></div>
		      <div class="row">
		         <div class="col-sm-6"></div>
		         <div class="col-sm-6">
		            <div class="NFMCHK"><a href="<?php bloginfo('url'); ?>/wellness-articles">CHECK OUT ALL ARTICLES ON WELLNESS</a></div>
		            <div class="clearfx Mpad"></div>
		         </div>
		      </div>
		   </div>
		</div>
		<div class="NFpad40"></div>

		<!-- New Homepage Code ends here -->
    <div class="row cwidth">
       <div class="col-md-12 recommended-columns">
          <h3 class="pink-dashed"><span>Recommended</span></h3>
          <div class="featured-container slick-slider-four curec" id="featured-carousel">
             <?php bi_display_featured();?>
          </div>
       </div>
    </div>

    <div class="NFpad40"></div>

		<h3 class="pink-dashed" style="margin-top:0;"><span>Review Now</span></h3>
		<div class="row cwidth">
		   <div class="col-md-12">
		      <div class="yp-title1">Products</div>
		      <div class="clearfx"></div>
		      <div class="featured-video-container" id="products-carousel">
		         <?php get_template_part('section/frontpage','reviewnow'); ?>
		      </div>
		   </div>
		</div>

    <div class="NFpad40"></div>

		<div class="cpdtop"></div>
		<div class="row cwidth">
		   <div class="col-md-12">
		      <div class="yp-title1">Establishments</div>
		      <div class="clearfx"></div>
		      <div class="featured-video-container" id="products-carousel">
		         <?php get_template_part('section/frontpage','reviewestablishments'); ?>
		      </div>
		   </div>
		</div>

    <div class="NFpad40"></div>

		<div class="row mbc cwidth">
		   <div class="col-md-12 recommended-columns">
		      <h3 class="pink-dashed"><span>Insider Deals</span></h3>
		      <div class="featured-container slick-slider-four" id="featured-carousel">
		         <?php bi_insider_deals();?>
		      </div>
		   </div>
		</div>

    <div class="NFpad40"></div>
		
		<div class="container-fluid mbc-off2">
	    <div class="row">
	      <div class="our-partners">
	        <div class="col-md-12">
	          <h3 class="pink-dashed"><span>Our Partners</span></h3>
	        </div>
	        <div id="our_partners" class="text-center">
	          <div class="col-md-2 col-xs-6 col-sm-4"> <a href="http://justrunlah.com/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/jrl-logo.png" class="img-responsive" alt="just Ran Lah"> </a> </div>
	          <div class="col-md-2 col-xs-6 col-sm-4"> <a href="http://www.missuniversesingapore.com.sg/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/MUS-2015-Logo-pink.png" class="img-responsive"  alt="Mus"> </a> </div>
	          <div class="col-md-2 col-xs-6 col-sm-4"> <a href="https://www.facebook.com/MissSingaporeBeautyPageant/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/06/miss-singapore-beauty-pageant.png" class="img-responsive"  alt="miss singapore"> </a> </div>
	          <div class="col-md-3 col-xs-6 col-sm-6"> <a href="http://www.spaandwellness.org/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/swas-logo.png" class="img-responsive" alt="Spa &amp; Wellness"> </a> </div>
	          <div class="col-md-3 col-xs-12 col-sm-6"> <a href="http://www.cosmoprof.com.sg/" target="_blank" rel="noopener"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/04/cosmo-prof-acad-web.png" class="img-responsive"  alt="Cosnoprof"> </a> </div>
	        </div>
	      </div>
	    </div>
	  </div>

   

</div>


<?php get_footer(); ?>
