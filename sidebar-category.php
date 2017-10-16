<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>	
	<div class="recent-articles">
	<?php 
		$defaultArticles = array(		
		'posts_per_page' 	=> 4,
		'post_type'			=> 'post',		
		);
		$defaultArticles = array(
                'category_name' => single_cat_title(null,false),                
                'posts_per_page' => 5,
                'orderby' => 'rand',                
                //'offset' => 4, // skips first 3 since its displayed earlier
              );
	?>
	<?php bi_display_articles($defaultArticles);?>
	</div>
<?php endif; ?>