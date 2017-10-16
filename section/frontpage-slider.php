<?php 

$argsSlider = array(
'posts_per_page'=>7,
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
    <li data-target="#HomeSliderCarousel" data-slide-to="<?php echo $bulletCount;?>" class="<?php echo $bulletCount<=0?'active':'';?>" style="background: url(<?php 
echo get_the_post_thumbnail_url( $post_id, 'medium' ); ?>) !important;"> <span class="desktop-title">
      <?php  $title= get_the_title(); echo substr($title, 0, 100); ?>
      </span> <span class="mobile-title">
      <?php  $title= get_the_title(); echo substr($title, 0, 38).'...'; ?>
      </span> </li>
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
          
          <a href="<?php the_permalink();?>"><span class="hslide_the_title">
          <?php the_title();?>
          </span></a> <span class="hslide_the_excerpt">
          <?php 
  $excerpt= get_the_excerpt();
  echo substr($excerpt, 0, 150).'...'; 
  ?>
          </span> </div>
      </div>
    </div>
    <?php $ctr++;?>
    <?php endwhile;?>
  </div>
</div>
<?php wp_reset_postdata();?>
<?php endif;?>    