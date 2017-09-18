<?php 
/* Template name: Dev Page */
get_header(); ?>
<style>
.slider-background {
	background-position: center center;
	background-repeat: no-repeat;
	background-size: 100% auto;
	min-height:480px;
}
.slider-caption {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.8+0,0.8+100 */
background: -moz-linear-gradient(top,  rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.8) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.8) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.8) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc000000', endColorstr='#cc000000',GradientType=0 ); /* IE6-9 */
	display: inline-block;
	left: 0;
	min-height: 220px;
	position: absolute;
	top: 25%;
	vertical-align: middle;
	width: 40%;
	padding:25px;
}
.slider-caption .post-categories {
	list-style: outside none none;
	margin: 0;
	padding: 0;
	color:#fff;
}
.slider-caption .post-categories li {
	list-style: outside none none;
	margin: 0;
	padding: 0;
	display:inline-block;
}
.slider-caption .post-categories li a {
	color: #fff;
	font-family: "Saira Extra Condensed", sans-serif;
	font-size: 16px;
	margin-right: 5px;
}
.hslide_the_title {
	color: #fff;
	display: block;
	font-family: "Playfair Display", serif;
	font-size: 28px;
	font-weight: normal;
	line-height: 1.1;
	margin: 10px 0;
}
.hslide_the_excerpt {
	color: #fff;
	display: block;
	line-height: 1.2;
}
.carousel-indicators-1 {
  bottom: 3px;
  list-style: outside none none;
  margin: 0;
  padding: 0;
  position: absolute;
  z-index: 9999;
}
.carousel-indicators-1 li {
  display: inline-block;
  height: 50px;
  list-style: outside none none;
  margin: 0;
  max-width: 280px;
  padding: 0;
  width: 100%;
  cursor:pointer;
  background-size:cover!important;
  background-color:#000;
}
.carousel-indicators-1 li span {
  color: #fff;
  display: block;
  font-family: "Saira Extra Condensed",sans-serif;
  font-size: 18px;
  line-height: 1;
  padding: 5px 10px;
  min-height:50px;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.45+0,0.45+100 */
background: -moz-linear-gradient(top,  rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.45) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.45) 0%,rgba(0,0,0,0.45) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(0,0,0,0.45) 0%,rgba(0,0,0,0.45) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#73000000', endColorstr='#73000000',GradientType=0 ); /* IE6-9 */
}
.carousel-indicators-1 li img {
}
</style>
<?php get_template_part('section/breadcrumbs'); ?>
<?php 

	$argsSlider = array(
		'posts_per_page'=>5,
		'post_type'	=> 'post',
		/*'category_name' 	=> NULL, //reset		*/
		'order' 			=> 'DESC',
		'orderby'			=> 'date',
		'tax_query' 		=> array(array(
					              'taxonomy' => 'post_tag',
					              'field' => 'slug',
					              'terms' => 'featured',
					           )),
	);					                    	
	$query = new WP_Query( $argsSlider );	
?>
<?php if ($query->have_posts()) : ?>
<div id="HomeSliderCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators-1">
    <?php $bulletCount = 0;?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <li data-target="#HomeSliderCarousel" data-slide-to="<?php echo $bulletCount;?>" class="<?php echo $ctr<=1?'active':'';?>" style="background: url(<?php 
echo get_the_post_thumbnail_url( $post_id, 'medium' ); ?>) !important;">
      <span><?php the_title();?></span>
    </li>
    <?php $bulletCount++;?>
    <?php endwhile;?>
    <?php wp_reset_postdata();?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php $ctr=1;?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="item <?php echo $ctr<=1?'active':'';?>">
      <div class="slider-background" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_id(),'full');?>');">
        <div class="slider-caption">
          <?php the_category();?>
          <span class="hslide_the_title">
          <?php the_title();?>
          </span> <span class="hslide_the_excerpt">
          <?php the_excerpt();?>
          </span> </div>
      </div>
    </div>
    <?php $ctr++;?>
    <?php endwhile;?>
  </div>
</div>
<?php wp_reset_postdata();?>
<?php endif;?>
<?php get_footer(); ?>
