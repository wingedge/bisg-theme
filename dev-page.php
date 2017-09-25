<?php /* Template name: Dev Page */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>


<div class="login form">
	<form action="review.beautyinsider.sg/api/login">
		<input type="email" name="email"/>
		<input name="password" type="password"/>
	</form>
</div>

<?php get_footer(); ?>
