<?php 
/* Template name: Products Page */
get_header(); ?>

<div class="category-page general-category-layout">
	<?php include('section/breadcrumbs.php'); ?>
	
	<div class="category-content container">
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<h3 class="cat-titles pink-dashed"><span>Products</span></h3>
				<div class="category-product-container product-container">
					<?php						
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						//$query = new WP_Query( array( 'paged' => $paged ) );

						$productArgs = array(
				    		'posts_per_page' 	=> -1,
							'post_type'			=> 'brand',			    
				    		'category_name' 	=> NULL, //reset			    		
				    		'paged'				=> $paged,							
				    		'orderby'			=> title,
				    		'order'				=> asc,
				    		'post_status'		=> 'publish',
				    		'post_parent'	=> 0,
						);					    
                	
						$query = new WP_Query( $productArgs );	
						$postCtr=1;
					?>

					<div id="thisproduct-list">
						<div class="row">
							<div class="form-group col-md-12 col-sm-12 col-xs-12">											
								<input class="search form-control" id="searchTerm" placeholder="Find product..." />								
							</div>	

							<div class="form-group col-md-12 range-selector">
								<a class="range-select letter-0" data-range="#letter-0"># </a>
								<?php foreach (range('A', 'Z') as $range):?>
									<a class="range-select letter-<?php echo $range;?>" data-range="#letter-<?php echo $range;?>"><?php echo $range;?> </a>				
      							<?php endforeach;?>
      							<a class="range-select letter-all" data-range="#letter-all">ALL </a>
							</div>						
  						</div>

  						<!--<span class="sort" data-sort="city">Sort by city</span>-->											
					
					<?php if ($query->have_posts()) : $postCtr=1;?>    					

    					<div class="scroller-box">
	    					<?php 
	    						$currentLetter = '#';	    						
	    						while($query->have_posts()){
	    							$query->the_post();
	    							$currentLetter = substr(get_the_title(), 0, 1);	  
	    							if (!preg_match("/^[a-z]$/i", $currentLetter)) {
	        							$currentLetter = '0';
	        						}
	        						$resultList[$currentLetter][] = '<a href="'.get_permalink().'" class="link name" title="'.get_the_title().'">'.get_the_title().'</a>';	        						
	    						}	    						
	    					?>
	    					<div id="brand-list" class="brand-list">
	    					<?php foreach($resultList as $listKey=>$listValues): // loop complete, display it now ?>
	    						<div class="parent-list filter-list-item range-<?php echo $listKey;?>" id="letter-<?php echo $listKey; ?>">	    							
	    							<ul class="child-list">
	    							<li class="list-label"><h4 name="letter-<?php echo $listKey;?>"><?php echo ($listKey === 0)?'#':$listKey; ?></h4></li>
	    							<?php foreach($listValues as $list):?>
	    								<li class="filter-list-item child-filter"><?php echo $list;?></li>
	    							<?php endforeach;?>	
	    							</ul>
	    						</div>
	    					<?php endforeach; ?>
	    					</div>
    					</div>
    					<?php wp_reset_postdata();?>
					<?php endif;?>

					</div><!-- end of list-->

					<script>
						$j = jQuery.noConflict();					
						
						(function ($) {
						  // custom css expression for a case-insensitive contains()
						  jQuery.expr[':'].Contains = function(a,i,m){
						      return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
						  };


						  function listFilter(header, list) { // header is any element, list is an unordered list
						    // create and add the filter form to the header
						    var input = $("#searchTerm");
						   // $(form).append(input).appendTo(header);

						   $(list).find("div").removeClass('off').show();
						   $(list).find("li").removeClass('off').show(); //

						    $(input)
						      .keyup( function () {
						        var filter = $(this).val();
						        if(filter) {
						          // this finds all links in a list that contain the input,
						          // and hide the ones not containing the input while showing the ones that do
						          
						          $(list).find("div").removeClass('off').show();
						   		  $(list).find("li").removeClass('off').show(); //
						          
						          $(list).find(".child-filter a:not(:Contains(" + filter + "))").parent().addClass('off').hide();
						          $(list).find(".child-filter a:Contains(" + filter + ")").parent().show();
						          $('.child-list').each(function(){
						          	var off = $(this).find('li.off').length;
						          	var on = $(this).find('li.child-filter').length;
						          	if(off == on){
						          		$(this).parent().hide();						          		
						          	}

						          });
						          // check elements
						        } else {						     
						          $(list).find("div").removeClass('off').show();
						          $(list).find("li").removeClass('off').show();
						        }
						        return false;
						      })
						    .keyup( function () {
						        // fire the above change event after every letter
						        $(this).change();
						    });

						    $('.range-select').click(function(){
						    	var sel = $(this).attr('data-range');						    	
						    	$('.parent-list').hide();
						    	$(sel).show();
						    });

						    $('.letter-all').click(function(){
						    	$(list).find("div").removeClass('off').show();
						        $(list).find("li").removeClass('off').show();
						    });
						  }


						  //ondomready
						  $(function () {
						    listFilter($("#thisproduct-list"), $("#brand-list"));

						  });
						}(jQuery));
						
					</script>
					
                </div>
			</div>
			<div id="all-articles" class="all-articles col-md-3 col-sm-4">
				<h3 class="cat-titles"><span>Latest</span></h3>
          		<?php get_sidebar('category');?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>