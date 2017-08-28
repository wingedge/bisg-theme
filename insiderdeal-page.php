<?php 
/* Template name: Insider Deals */
get_header(); ?>
<?php get_template_part('section/breadcrumbs'); ?>

<div class="main-content container sub-page">
  <div class="row">
    <div id="main" class="main-column col-md-9">
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <h2 class="content-title">
            <?php the_title();?>
          </h2>
          <hr class="divider"/>
          <span class="insider-title">
          <?php the_field('title');?>
          </span> <a href="<?php the_field('promo_link');?>"><img src="<?php the_field('image');?>" alt="" class="insider-img"/></a>
          <div class="insider-promo">
            <h3>GRAB THIS DEAL!</h3>
            <a class="insider-promo_link" href="<?php the_field('promo_link');?>">
            <?php the_field('promo');?>
            </a>
          </div>
          <span class="insider-title">
          <?php the_field('title1');?>
          </span> <a href="<?php the_field('promo_link1');?>"><img src="<?php the_field('image1');?>" alt="" class="insider-img"/></a>
          <div class="insider-promo">
            <h3>GRAB THIS DEAL!</h3>
            <a class="insider-promo_link" href="<?php the_field('promo_link1');?>">
            <?php the_field('promo1');?>
            </a>
          </div>
          <span class="insider-title">
          <?php the_field('title2');?>
          </span> <a href="<?php the_field('promo_link2');?>"><img src="<?php the_field('image2');?>" alt="" class="insider-img"/></a>
          <div class="insider-promo">
            <h3>GRAB THIS DEAL!</h3>
            <a class="insider-promo_link" href="<?php the_field('promo_link2');?>">
            <?php the_field('promo2');?>
            </a>
          </div>
          <span class="insider-title">
          <?php the_field('title3');?>
          </span> <a href="<?php the_field('promo_link3');?>"><img src="<?php the_field('image3');?>" alt="" class="insider-img"/></a>
          <div class="insider-promo">
            <h3>GRAB THIS DEAL!</h3>
            <a class="insider-promo_link" href="<?php the_field('promo_link3');?>">
            <?php the_field('promo3');?>
            </a>
          </div>
          <?php the_content(); ?>
        </div>
      </div>
      <?php endwhile; // End the loop. Whew. ?>
    </div>
    <div class="category-page">
      <div id="all-articles" class="all-articles col-md-3">
        <div>
          <h3 class="cat-titles"><span>Recent Posts</span></h3>
          <?php get_sidebar('category');?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
