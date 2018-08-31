<?php /* Template name: Beauty Awards 2018 winners Category Page */
get_header(); 
?>

<style type="text/css">
	
	.awardsbk{
		
		background-repeat: no-repeat;
        background-size: cover;
	}

	.awardsbk h3{
		font-size: 20px;		
		font-family: "Playfair Display",serif;
	    font-weight: 400;
	}

	

	.awardsMenu{
		background-color: #e3006a;
		padding: 10px 0;
	}

	.awardsMenu ul{
		color: #fff;
		text-align: center;
		margin-bottom: 0;
		text-transform: uppercase;
		margin-left: -40px;
	}

	.awardsMenu ul li{
		display: inline;
		padding-right: 20px;

	}

	.awardsMenu ul li a{
		text-decoration: none;
		color: #fff;
		font-size: 11px;
		padding: 5px 10px;
	}

	.awardsMenu ul li a:hover, .awardsMenu ul li.active a{
		color: #fff;
		background: #b20355;
		border-radius: 10px;
	}

	.awardsRead{
		font-family: "Catamaran",sans-serif;
	    color: #e80062;
	    font-weight: 400;
	    font-size: 12px;
	    text-decoration: none;
	    border-bottom: 1px solid #e80062;
	    padding: 0 5px;
	    margin-bottom: 10px;
	}

	.winner-title{
		font-weight: bold;
		color: #fc1d78;
		font-size: 22px;
	}

	.award-details{
		background-color: #fbe5f2;
		padding:15px;
	}

	.award-details h3{
		font-size: 14px;
		font-weight: bold;
		content: #000;
	}

	.winner-image{
		border:5px solid #fbe5f2;
	}

.winner-category {
	border-bottom: 2px solid #fbe5f2;
	font-size: 38px;
	font-family: "Playfair Display",serif;
	font-weight: bold;
	margin-bottom: 30px;
}

	button.AwardButton {
		background: #fc1d78 !important; 
		color: #fff;
		border: 0 !important; 
		border-radius: 0 !important; 
	}

	button:hover.AwardButton {
		background: #d31462 !important;
		border-radius: 0 !important; 
	}

	a.AwardsA{
		text-decoration: none !important;
		outline: none !important;
	}

	.collapse.in{
		margin-bottom: 10px;
	}

	
	.awardsRead[aria-expanded="false"]:before{
	  content:"Read More";
	}

	.awardsRead[aria-expanded="true"]:before{
	  content:"View Less";
	}

	.awardsRead[aria-expanded="true"] span{		display:none;	}
	.awardsRead[aria-expanded="false"] span{	display:none;	}

	.awardsfoot{
		margin-bottom: -57px;
	}


</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-12"><img src="<?php bloginfo('template_directory'); ?>/img/awardsHeaderSingle.gif" width="100%"></div>
	</div>	



	<div class="row awardsMenu">
		<div class="container">
			<ul>
				<li  class="active"><a data-toggle="tab" href="#FaceSaver" >Face Saver</a></li>
				<li><a data-toggle="tab" href="#Makeup">Face Makeup</a></li>
				<li><a data-toggle="tab" href="#EyeMakeup">Eye Makeup</a></li>
				<li><a data-toggle="tab" href="#HairProducts">Hair Products</a></li>
				<li><a data-toggle="tab" href="#BodyProducts">Body Products</a></li>
				<li><a data-toggle="tab" href="#Lip">Lip Saver</a></li>		
				<li><a data-toggle="tab" href="#Supplement">Supplement</a></li>
				<li><a data-toggle="tab" href="#Natural">Natural / Organic Products</a></li>
				<li><a data-toggle="tab" href="#Professional">Professional Products</a></li>
				<li><a data-toggle="tab" href="#Trending">Trending Products</a></li>
				<li><a data-toggle="tab" href="#BeautyTools">Beauty Tools</a></li>
				<li><a data-toggle="tab" href="#Breakthrough">Breakthrough Product</a></li>
			    <li><a data-toggle="tab" href="#NewComers">New Comers</a></li>			    
			</ul>
		</div>
	</div>


</div>

<div class="main-content container homepage-main awardsbk">
	
	<div class="NFpad20"></div>		

	<?php 
		
		$beautyCatArray = array(
			"FaceSaver" => 'best-face-saver',
			"Breakthrough" => 'best-breakthrough-product',
			"Supplement" => 'best-supplement',
			"Natural" => 'best-natural-organic-products',			
			"Trending" => 'best-trending-products',
			"Lip" => 'best-lip-saver',
			"Professional" => 'best-professional-products',
			"Makeup" => 'best-face-makeup',
			"BeautyTools" => 'best-beauty-tool',
			"HairProducts" => 'best-hair-product-winning-main-category',
			"BodyProducts" => 'best-body-product',
			"NewComers" => 'best-new-comer',
			"EyeMakeup" => 'best-eye-makeup-winning-main-category',
		);
	?>
	<div class="tab-content">
		<?php $cx = 0; foreach($beautyCatArray as $beautyCatKey => $beautyCatTerm): $cx++; ?>
	    <div id="<?php echo $beautyCatKey;?>" class="tab-pane fade cat-tab-pane tab-<?php echo $cx;?>  <?php echo $cx==1?'in active':'';?>">
		    
		    <?php 		    	
				$awardsPostsQuery = array(
				    'post_type' => 'beauty_winners',
				    'posts_per_page' => -1, 
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'winners_cat',
				            'field' => 'slug',
				            'terms' => $beautyCatTerm,
				        )
				    )
				);
				// get 	
				$currentTerm = get_term_by( 'slug', $beautyCatTerm, 'winners_cat' );
				$subCategoryTerm = get_term_by( 'slug', 'winning-sub-category', 'winners_cat' );
				$choiceAwardTerm = get_term_by( 'slug', 'choice-of-awards', 'winners_cat' );
			
				$awardsPosts = new WP_Query($awardsPostsQuery);?>			
				
				<div class="row">
						<div class="col-md-12">
							<h2 class="winner-category"><?php echo $currentTerm->name;?></h2>
							<p><?php echo term_description($currentTerm->term_id);?></p>
						</div>
				</div>

				<?php if ($awardsPosts->have_posts()) : ?>
					<?php while ( $awardsPosts->have_posts() ) : $awardsPosts->the_post();?>  
					<?php // get all terms
						// get all categories under "choice of awards"
						$terms = get_the_terms( get_the_id(), 'winners_cat');
						
						$subCategories = array();
						$choiceAwards = array();
						
						foreach ( $terms as $term ) {
							if ($term->parent == 0){ // don't show top level cat
								continue; // skip
							}
							if($term->parent == $subCategoryTerm->term_id){ 
								$subCategories[] = $term->name;
							}
							
							if($term->parent == $choiceAwardTerm->term_id){ 
								$choiceAwards[] = $term->name;
							}							
						}
					?>
					

					<div class="row">
						<div class="col-sm-6 text-center">
					   		<div class="winner-image">
					   			<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'medium'); ?>">
					   		</div>
					    </div>					    
					    <div class="col-sm-6">
							<h3><?php echo implode(', ', $subCategories);?></h3>
							<?php if(get_field('winner_misc_award')):?>
								<h4><?php the_field('winner_misc_award');?></h4>
							<?php endif;?>
							<p class="winner-title"><strong><?php the_title();?></strong></p>
							<?php if ($choiceAwards):?>
							<p><strong>Choice of Awards:</strong> 
							<?php echo implode(', ', $choiceAwards);?>
							</p>
							<?php endif;?>
							<div class="winner-text winner-main-text">
								<?php the_content();?>	
							</div>							
							<div class="clearfix"></div>
							
							
							
								<div class="collapse award-details" id="collapse<?php the_id();?>">
									
									<?php if(get_field('winner_why_we_love_this_product')):?>
									<div class="row">
										<div class="col-md-12">
											<h3>Why we love this product</h3>
											<div class="winner-text">											
												<?php the_field('winner_why_we_love_this_product');?>
											</div>
										</div>									
									</div>
									<?php endif;?>

									<?php if(get_field('winner_where_to_buy_slug')):?>
									<div class="row">
										<div class="col-md-12">
											<a href="<?php bloginfo('url'); ?>/brand/<?php the_field('winner_where_to_buy_slug');?>" target="_blank" class="AwardsA"><button type="button" class="btn btn-primary btn-sm AwardButton">Click here to know where to buy</button></a>
										</div>
									</div>
									<?php endif;?>
									<!--
									<div class="row">
										<div class="col-md-6">
											<h3>Where to buy</h3>
											<div class="winner-text">
												<?php the_field('winner_where_to_buy');?>
											</div>
										</div>									
										<div class="col-md-6">
											<h3>Contact Details</h3>
											<div class="winner-text">
												<?php the_field('winner_contact_details');?>
											</div>
										</div>									
									</div> -->

									<?php if(get_field('winner_product_video')):?>
									<div class="row">
										<div class="col-md-12">
											<h3>Video</h3>
											<div class="winner-text">
												<?php the_field('winner_product_video');?>
											</div>
										</div>									
									</div>
									<?php endif;?>
								</div>
							

							<?php if(get_field('winner_why_we_love_this_product') or get_field('winner_where_to_buy_slug') or get_field('winner_product_video')):?>
							<a data-toggle="collapse" href="#collapse<?php the_id();?>" class="awardsRead NFup"><span>read more</span></a>
							<?php endif;?>

					    </div>
					</div>
					<div class="NFpad20"></div>	
			<?php endwhile; endif; wp_reset_postdata();?>  	      
	    </div>
	<?php endforeach;?>
    

 	</div>
 	<div class="NFpad20"></div>	


</div>

<div class="container-fluid awardsfoot">
	<div class="row awardsMenu">
		<div class="container">
			<ul>
				<li  class="active"><a data-toggle="tab" href="#FaceSaver">Face Saver</a></li>
				<li><a data-toggle="tab" href="#Makeup">Face Makeup</a></li>
				<li><a data-toggle="tab" href="#EyeMakeup">Eye Makeup</a></li>
				<li><a data-toggle="tab" href="#HairProducts">Hair Products</a></li>
				<li><a data-toggle="tab" href="#BodyProducts">Body Products</a></li>
				<li><a data-toggle="tab" href="#Lip">Lip Saver</a></li>		
				<li><a data-toggle="tab" href="#Supplement">Supplement</a></li>
				<li><a data-toggle="tab" href="#Natural">Natural / Organic Products</a></li>
				<li><a data-toggle="tab" href="#Professional">Professional Products</a></li>
				<li><a data-toggle="tab" href="#Trending">Trending Products</a></li>
				<li><a data-toggle="tab" href="#BeautyTools">Beauty Tools</a></li>
				<li><a data-toggle="tab" href="#Breakthrough">Breakthrough Product</a></li>
			    <li><a data-toggle="tab" href="#NewComers">New Comers</a></li>			    
			</ul>
		</div>
	</div>

</div>
<?php get_footer(); ?>