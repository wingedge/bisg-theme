<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>
	<div class="recent-articles">
	<?php bi_display_articles(array('posts_per_page'=>5));?>
	</div>
<?php endif; ?>