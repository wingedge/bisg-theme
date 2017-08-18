<?php if ( is_active_sidebar( 'sidebar-article' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-article' ); ?>
<?php else:?>
	<div class="recent-articles">
	<?php bi_display_articles();?>
	</div>
<?php endif; ?>