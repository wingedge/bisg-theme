<?php if ( is_active_sidebar( 'sidebar-category' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-category' ); ?>
<?php else:?>
	<div class="recent-articles">
	<?php bi_display_articles();?>
	</div>
<?php endif; ?>