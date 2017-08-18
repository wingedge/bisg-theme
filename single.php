<?php get_header(); ?>

<div class="main-content container">
	<div class="row breadcrumbs-row">
		<?php bi_breadcrumbs();?>
	</div>
	<div class="row">
		<div id="main" class="main-column col-md-9">		
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="content-image-banner col-md-12">
							<?php the_post_thumbnail();?>
						</div>
					</div>
					<div class="row">
						<div class="content-title col-md-12">
							<h2><?php the_title();?></h2>
						</div>
					</div>
					<div class="row">
						<div class="content-categories col-md-12">
							<?php the_category(); ?>
						</div>
					</div>
					<div class="row">					
						<div class="entry-content col-md-12">						
							<?php the_content(); ?>
						</div>
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