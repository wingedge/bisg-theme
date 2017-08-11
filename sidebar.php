<?php // primary widget area
	if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
	<ul>
		<?php dynamic_sidebar( 'sidebar-main' ); ?>
	</ul>
<?php endif; // end primary widget area ?>