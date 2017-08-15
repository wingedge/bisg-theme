<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>
	recent articles
<?php endif; ?>