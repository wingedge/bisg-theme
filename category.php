<?php get_header(); ?>

<div class="main-content container">
	<div class="row">
		<?php bi_breadcrumbs();?>
	</div>
	<div class="row">
		<div id="category-main-slider" class="category-main-slider col-md-5">
			<h2><?php ucwords(single_cat_title());?></h2>
		</div>
		<div id="category-articles" class="category-articles col-md-4">
			<h2>Latest in <?php ucwords(single_cat_title());?></h2>
		</div>
		<div id="category-articles" class="category-articles col-md-3">
			<?php get_sidebar('category');?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 category-videos">
			<h2><?php ucwords(single_cat_title());?> Videos</h2>
			<div class="category-video-containers row">
			<?php /*set arguments */
				$videos = array(
				    'posts_per_page' 	=> 3,
				    'category_name' 	=> NULL, //reset
				    'file_template'	 	=> 'section/category-video.php',
				    'tax_query' 		=> array(
									        array(
									            'taxonomy' => 'category',
									            'field' => 'slug',
									            'terms' => 'makeup-videos',
									            //'operator' => 'AND'
									        )
				    )
				);
			?>
			<?php bi_display_popular_videos($videos);?>
			</div>
			
		</div>
		<div class="col-md-6">
			<?php ucwords(single_cat_title());?> Products
			products here
		</div>
	</div>
</div>

<?php get_footer(); ?>