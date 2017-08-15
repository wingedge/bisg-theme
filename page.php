<?php get_header(); ?>

<div class="main-content container">
	<div class="row">
		<?php bi_breadcrumbs();?>
	</div>
	<div class="row">
		<div id="main" class="main-column col-md-12">		
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">					
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>