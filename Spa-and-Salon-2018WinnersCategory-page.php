<?php /* Template name: Spa and Awards 2018 winners Category Page */
get_header(); 
?>

<style type="text/css">

	.nopadding {
	   padding: 0 !important;
	   margin: 0 !important;
	}
	
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
		<div class="col-12"><img src="<?php bloginfo('template_directory'); ?>/img/Spa-Awards-2018-Hero-Ba1nner.jpg" width="100%"></div>
	</div>	



	<div class="row awardsMenu">
		<div class="container">
			<ul>
				<li class="active"><a data-toggle="tab" href="#Facials" >FACIALS</a></li>
				<li><a data-toggle="tab" href="#HairSalon">HAIR SALON</a></li>
				<li><a data-toggle="tab" href="#SPA">SPA</a></li>
				<li><a data-toggle="tab" href="#NailSalon">NAIL SALON</a></li>
				<li><a data-toggle="tab" href="#BeautySalon">BEAUTY SALON</a></li>		    
			</ul>
		</div>
	</div>
</div>

<div class="main-content container homepage-main awardsbk">

	<div class="container" style="display:none;"> 

		<div class="row">
			<div class="col-sm-6 text-center">
				Best Facials Treatment 
			</div>

			<div class="col-sm-6 text-center nopadding">
				<img src="<?php bloginfo('template_directory'); ?>/img/Spa-Award-Winner-Category-Beauty-Salon.jpg" width="100%" >
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 text-center nopadding">
				<img src="<?php bloginfo('template_directory'); ?>/img/Spa-Award-Winner-Category-Facials.jpg" width="100%" > 
			</div>

			<div class="col-sm-6 text-center">
				Best Hair Salon
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 text-center">				
				Best Hair Salon  
			</div>

			<div class="col-sm-6 text-center nopadding">
				<img src="<?php bloginfo('template_directory'); ?>/img/Spa-Award-Winner-Category-Hair-Removal.jpg" width="100%">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 text-center nopadding">
				<img src="<?php bloginfo('template_directory'); ?>/img/Spa-Award-Winner-Category-Hair-Salon.jpg" width="100%">
			</div>

			<div class="col-sm-6 text-center">
				Best Makeover Treatment
			</div>
		</div>
	</div>

	<div class="container">			

			<?php 
		
				$SpaCatArray = array(
					"Facials" => 'best-facials',
					"HairSalon" => 'best-hair-salon',
					//"SPA" => 'best-spa',
					//"NailSalon" => 'best-nail-salon',			
					//"BeautySalon" => 'best-beauty-salon',
				);

			?>


			<div class="tab-content">
				<?php $cx = 0; foreach($SpaCatArray as $SpaCatKey => $SpaCatTerm): $cx++; ?>
				    <div id="<?php echo $SpaCatKey;?>" class="tab-pane fade cat-tab-pane tab-<?php echo $cx;?>  <?php echo $cx==1?'in active':'';?>">
					    
				    	<?php 
				    		echo $SpaCatTerm . "<br>";
							echo $cx;
							echo 'test';
				    	?>

					    <?php 

							$awardsPostsQuery = array(
							    'post_type' => 'spa_winners',
							    'posts_per_page' => -1, 
							    'tax_query' => array(
							        array(
							            'taxonomy' => 'spa_winners_cat',
							            'field' => 'slug',
							            'terms' => $SpaCatTerm,
							        )
							    )
							);  

							print_r($awardsPostsQuery);
			            ?>		
			            <?php $SpaAwardsquery = new WP_Query( $awardsPostsQuery ); ?>
			            <?php if ( $SpaAwardsquery->have_posts() ) :?>				            
					        <?php while ( $SpaAwardsquery->have_posts() ) :?> 
					        	<?php $SpaAwardsquery->the_post();?>        
								<h4><?php the_title();?></h4>
								<?php the_content();?>
						    <?php endwhile;?>				             			            
				        <?php else:?>
				        <?php endif;?>				            
			            <?php wp_reset_postdata(); ?>
				    </div>
				<?php endforeach;?>
		 	</div>


		 	<div class="NFpad20"></div>	
	</div>

</div>

<div class="container-fluid awardsfoot">
	<div class="row awardsMenu">
		<div class="container">
			<ul>
				<li class="active"><a data-toggle="tab" href="#best-facials" >FACIALS</a></li>
				<li><a data-toggle="tab" href="#best-hair-salon">HAIR</a></li>
				<li><a data-toggle="tab" href="#best-spa">SPA</a></li>
				<li><a data-toggle="tab" href="#best-nail-salon">NAIL and HAIR REMOVAL</a></li>
				<li><a data-toggle="tab" href="#best-beauty-salon">BEAUTY SALON</a></li>		    
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>