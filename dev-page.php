<?php /* Template name: Dev Page */
get_header(); 
?>
<?php get_template_part('section/breadcrumbs'); ?>

<?php 
	$BIReview->update_names();
?>

<?php get_footer(); ?>
