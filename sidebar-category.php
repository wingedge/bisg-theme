<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>	
	<div class="recent-articles">
	<?php 
		$defaultArticles = array(		
		'posts_per_page' 	=> 4,
		'post_type'			=> 'post',		
		);
	?>
	<?php bi_display_articles($defaultArticles);?>
	</div>
<?php endif; ?>