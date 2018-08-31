<?php /* Template name: Nomination Awards Page */
get_header(); ?>

<style type="text/css">
	.tabbk{
		background: url(https://beautyinsider.sg/wp-content/uploads/2018/04/bk.png) no-repeat;
		background-size: cover;
	}

	img.imgmenu{
		width: 150px;
	}

	.tabbk{
		padding-bottom: 50px;
	}



	.tabbk ul{
		margin: 0 auto !important;
		display: inline;
	}

	.tabbk .nav-tabs{
		border-bottom: none !important;
	}

	.tabbk .nav-tabs li{
		float: none !important;
		display: inline-block !important;
		margin-right: 10px;
	}

	.tabbk .nav-tabs li a{
		background: none !important;
		text-decoration: none;		
		border: 4px solid #92278f;
		border-radius: 50%;	
    	padding: 38px 0;
	}

	.tabbk .nav-tabs li a:hover, .tabbk .nav-tabs li a:focus, .tabbk .nav-tabs li.active a{
		background: #fff !important;
		border: 4px solid #92278f;
	}
	
	

</style>

<div class="main-content container homepage-main">

	<div class="NFpad20"></div>
	
	

	<div class="tabbk">
		<div class="row">
	            <div class="col-sm-12">
	                <a href="https://beautyinsider.sg/terms-conditions/" target="_blank"><center><img src="https://beautyinsider.sg/wp-content/uploads/2018/04/headernew2.png"></center></a>
	            </div>                    
   
	    </div>
	   	<center><ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#spa"><img class="imgmenu" src="https://beautyinsider.sg/wp-content/uploads/2018/04/spanew1.png"></a></li>
		    <li><a data-toggle="tab" href="#hair"><img class="imgmenu" src="https://beautyinsider.sg/wp-content/uploads/2018/04/hairsalonnew.png"></a></li>
		    <li><a data-toggle="tab" href="#nail"><img class="imgmenu" src="https://beautyinsider.sg/wp-content/uploads/2018/04/nailnew.png"></a></li>
		 </ul></center>
	</div>

	<div class="tab-content">

	    <div id="spa" class="tab-pane fade in active">
	      	<?php echo do_shortcode( '[contact-form-7 id="38887" title="Spa Salon Awards 2018"]' ); ?>	      	
	    </div>

	    <div id="hair" class="tab-pane fade">
	    	<?php echo do_shortcode( '[contact-form-7 id="38925" title="Hair Salon Awards 2018"]' ); ?>	      	
	    </div>

	    <div id="nail" class="tab-pane fade">
	    	<?php echo do_shortcode( '[contact-form-7 id="38912" title="Nail Salon Awards 2018"]' ); ?>	      	
	      	
	    </div>
	    
	</div>

</div>


<?php get_footer(); ?>
