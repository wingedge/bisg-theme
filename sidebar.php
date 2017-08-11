<?php // primary widget area ?>
<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>	
		<?php dynamic_sidebar( 'sidebar-main' ); ?>	
<?php else:?>
	<div class="row">
		<div class="col-md-12 bi-widget">			
				<a href="/travel-insider/" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img width="300" height="300" src="/wp-content/uploads/2014/09/Travel-Insider-Banner.png" class="vc_single_image-img attachment-full" alt="Travel-Insider-Banner" srcset="/wp-content/uploads/2014/09/Travel-Insider-Banner.png 300w, /wp-content/uploads/2014/09/Travel-Insider-Banner-150x150.png 150w" sizes="(max-width: 300px) 100vw, 300px"></a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 bi-widget">
			<a href="/award-winners/" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img width="300" height="300" src="/wp-content/uploads/2014/09/Award-winners-1.jpeg" class="vc_single_image-img attachment-full" alt="Award-winners" srcset="/wp-content/uploads/2014/09/Award-winners-1.jpeg 300w, /wp-content/uploads/2014/09/Award-winners-1-150x150.jpeg 150w" sizes="(max-width: 300px) 100vw, 300px"></a>
		</div>
	</div>



<?php endif; // end primary widget area ?>