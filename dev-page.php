<?php 
/* Template name: Dev Page */
get_header(); ?>
<style>
<<<<<<< HEAD
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
=======
#HomeSliderCarousel .slider-background {
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	min-height:480px;
}
#HomeSliderCarousel .slider-caption {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.8+0,0.8+100 */
background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc000000', endColorstr='#cc000000', GradientType=0 ); /* IE6-9 */
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	display: inline-block;
	left: 0;
	min-height: 220px;
	position: absolute;
	top: 25%;
	vertical-align: middle;
<<<<<<< HEAD
	width: 40%;
	padding:25px;
}
.slider-caption .post-categories {
=======
	width: 100%;
	max-width:600px;
	padding:25px;
}
#HomeSliderCarousel .slider-caption .post-categories {
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	list-style: outside none none;
	margin: 0;
	padding: 0;
	color:#fff;
}
<<<<<<< HEAD
.slider-caption .post-categories li {
=======
#HomeSliderCarousel .slider-caption .post-categories li {
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	list-style: outside none none;
	margin: 0;
	padding: 0;
	display:inline-block;
}
<<<<<<< HEAD
.slider-caption .post-categories li a {
=======
#HomeSliderCarousel .slider-caption .post-categories li a {
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	color: #fff;
	font-family: "Saira Extra Condensed", sans-serif;
	font-size: 16px;
	margin-right: 5px;
}
<<<<<<< HEAD
.hslide_the_title {
=======
#HomeSliderCarousel .hslide_the_title {
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	color: #fff;
	display: block;
	font-family: "Playfair Display", serif;
	font-size: 28px;
	font-weight: normal;
	line-height: 1.1;
	margin: 10px 0;
}
<<<<<<< HEAD
.hslide_the_excerpt {
=======
#HomeSliderCarousel .hslide_the_excerpt {
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
	color: #fff;
	display: block;
	line-height: 1.2;
}
.carousel-indicators-1 {
<<<<<<< HEAD
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
=======
	bottom: 0;
	list-style: outside none none;
	margin: 0;
	padding: 0;
	left:30px;
	right:0;
	position: absolute;
	z-index: 9999;
}
#HomeSliderCarousel .carousel-indicators-1 li {
	background-color: #000;
	background-size: cover !important;
	cursor: pointer;
	display: inline-block;
	float: left;
	height: 50px;
	list-style: outside none none;
	margin: 0;
	overflow: hidden;
	padding: 0;
	width: 14%;
}
#HomeSliderCarousel .carousel-indicators-1 li > span {
	color: #fff;
	display: block;
	font-family: "Saira Extra Condensed", sans-serif;
	font-size: 17px;
	line-height: 1;
	padding: 5px 10px;
	letter-spacing:-0.2px;
	min-height:150px;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.45+0,0.45+100 */
background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#73000000', endColorstr='#73000000', GradientType=0 ); /* IE6-9 */
}
#HomeSliderCarousel {
	overflow: hidden;
}
#HomeSliderCarousel .mobile-title {
	display:none !important;
}
@media all and (max-width:1460px) {
#HomeSliderCarousel .carousel-indicators-1 li:nth-child(7) {
display:none;
}
#HomeSliderCarousel .carousel-indicators-1 li {
 width: 16.3%;
}
}
@media all and (max-width:1280px) {
#HomeSliderCarousel .carousel-indicators-1 li:nth-child(6) {
display:none;
}
#HomeSliderCarousel .carousel-indicators-1 li {
 width: 19.5%;
}
}
@media all and (max-width:1040px) {
 #HomeSliderCarousel .carousel-indicators-1 li {
 height: 67px;
}
.carousel-indicators-1 {
 left:20px !important;
}
}
@media all and (max-width:740px) {
 #HomeSliderCarousel .carousel-indicators-1 li {
 height: 80px;
}
.carousel-indicators-1 {
 left:15px !important;
}
}
@media all and (max-width:670px) {
 #HomeSliderCarousel .carousel-indicators-1 li {
 height: 90px;
}
#HomeSliderCarousel .desktop-title {
 display:none !important;
}
#HomeSliderCarousel .mobile-title {
 display:block !important;
}
}
@media all and (max-width:510px) {
#HomeSliderCarousel .carousel-indicators-1 li > span {
 font-size: 15px;
}
}
@media all and (max-width:425px) {
 #HomeSliderCarousel .carousel-indicators-1 li {
 height: 100px;
}
#HomeSliderCarousel .slider-caption {
  top: 8% !important;
}
#HomeSliderCarousel .slider-caption {
  min-height: 310px;
}
}
@media all and (max-width:310px) {
#HomeSliderCarousel .carousel-indicators-1 li {
  height: 105px;
}
.carousel-indicators-1 {
 left:10px !important;
}
#HomeSliderCarousel .carousel-indicators-1 li:nth-child(5) {
display:none;
}
#HomeSliderCarousel .carousel-indicators-1 li {
  width: 23.6%;
}
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
}
</style>
<?php get_template_part('section/breadcrumbs'); ?>
<?php 

	$argsSlider = array(
<<<<<<< HEAD
		'posts_per_page'=>5,
=======
		'posts_per_page'=>7,
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
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
<<<<<<< HEAD
  
=======
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
  <ol class="carousel-indicators-1">
    <?php $bulletCount = 0;?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <li data-target="#HomeSliderCarousel" data-slide-to="<?php echo $bulletCount;?>" class="<?php echo $ctr<=1?'active':'';?>" style="background: url(<?php 
<<<<<<< HEAD
echo get_the_post_thumbnail_url( $post_id, 'medium' ); ?>) !important;">
      <span><?php the_title();?></span>
    </li>
=======
echo get_the_post_thumbnail_url( $post_id, 'medium' ); ?>) !important;"> <span class="desktop-title">
      <?php  $title= get_the_title(); echo substr($title, 0, 100); ?>
      </span> <span class="mobile-title">
      <?php  $title= get_the_title(); echo substr($title, 0, 38).'...'; ?>
      </span> </li>
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
    <?php $bulletCount++;?>
    <?php endwhile;?>
    <?php wp_reset_postdata();?>
  </ol>
<<<<<<< HEAD
  
=======
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
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
<<<<<<< HEAD
          <?php the_excerpt();?>
=======
          <?php 
		  $excerpt= get_the_excerpt();
		  echo substr($excerpt, 0, 150).'...'; 
		  ?>
>>>>>>> 165e3a5d909d13b0244263b9b84adff0fa35458e
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
