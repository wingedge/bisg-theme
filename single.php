<?php get_header(); ?>

<div class="main-content container">
	<div class="row breadcrumbs-row">
		<?php bi_breadcrumbs();?>
	</div>
	<div class="row">
		<div id="main" class="main-column col-md-9">		
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						deeps
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; // End the loop. Whew. ?>
		</div>
		<div id="sidebar" class="sidebar col-md-3">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>