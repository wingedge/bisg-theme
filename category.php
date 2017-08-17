<?php get_header(); ?>
<style>
.category-page .slick-slide img, .category-page .recent-article-row img, .category-videos img, .featured-category-video img, .category-articles img {
	height: auto !important;
}
.cat-titles.pink-dashed > span {
	font-size: 24px;
}
.category-main-slider {
	color: #666;
	font-weight: 300;
}
.category-main-slider .fp-title {
	color: #e80062 !important;
	display: block;
	font-size: 21px;
	line-height: 1.1;
	padding: 10px 0;
	font-weight: 500;
	text-decoration:none !important;
}
.category-articles-container .recent-article-row > div > div {
	background: #efefef none repeat scroll 0 0;
}
.category-articles-container .recent-article-row {
	margin-bottom: 15px;
}
.category-articles-container .recent-article-row .recent-article-title {
  font-size: 13px;
  padding-left: 0;
  padding-top: 0;
  text-transform: uppercase;
}
.category-articles-container .recent-article-row .recent-article-title a {
	color: #333;
	text-decoration: none;
}
.recent-articles .fp-title {
	color: #333;
	display: block;
	font-size: 13px;
	text-transform: uppercase;
}
.category-articles-container .recent-article-row .recent-article-title a:hover, .recent-articles .fp-title:hover {
	color: #e80062;
	text-decoration: none;
}
.recent-articles .recent-article-row {
	margin-bottom: 15px;
}
.recent-articles .recent-article-thumb {
	margin: 0;
	padding: 0;
}
.all-articles .cat-titles,
.category-recent-articles .cat-titles {
	color: #fff;
	font-family: "Playfair Display", serif;
	line-height: 1;
	margin-bottom: 0;
	padding: 10px 15px;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#c60046+0,e80062+100 */
background: rgb(198,0,70); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(198, 0, 70, 1) 0%, rgba(232, 0, 98, 1) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(198, 0, 70, 1) 0%, rgba(232, 0, 98, 1) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(198, 0, 70, 1) 0%, rgba(232, 0, 98, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c60046', endColorstr='#e80062', GradientType=0 ); /* IE6-9 */
}
.category-recent-articles .recent-article-wrap {
	background: #f7f7f7 none repeat scroll 0 0;
	padding: 0 15px;
}
.category-recent-articles .recent-article-thumb {
	max-height: 147px;
	overflow: hidden;
}
.category-recent-articles .recent-article-title a {
	text-decoration:none !important;
}
.category-recent-articles .recent-article-title .fp-title {
	color: #333;
	display: block;
	font-size: 13px;
	line-height: 1.3;
	text-transform: uppercase;
}
.category-main-slider .cat-titles.pink-dashed {
  text-align: left!important;
  margin-top:25px !important;
}
.category-main-slider .cat-titles.pink-dashed > span {
  font-size: 32px;
  padding-left: 0;
}
.category-recent-articles .category-articles-container {
  background: #f7f7f7 none repeat scroll 0 0;
  padding: 15px;
}
.category-recent-articles .category-articles-container .recent-article-title {
  padding-left: 0;
}
.category-recent-articles .category-articles-container > div {
  border-bottom: 1px solid #dfdfdf;
  margin-bottom: 15px;
  padding-bottom: 15px;
}
.all-articles .recent-articles {
  background: #f7f7f7 none repeat scroll 0 0;
}
.all-articles .recent-articles > div {
  border-bottom: 1px solid #dfdfdf;
  margin: 0 15px;
  padding-bottom: 10px;
  padding-top: 15px;
}
.all-articles .recent-articles > div:nth-last-child(1)
{
	border-bottom: none !important;
}
.category-recent-articles .category-articles-container > div:nth-last-child(1) {
  border: medium none;
  margin-bottom: 0;
  padding-bottom: 0;
}
</style>
<div class="category-page">
 <?php include('section/breadcrumbs.php'); ?>
  <div class="main-content container">
    <div class="row">
      <div id="category-content-left" class="category-content-left col-md-9">
        <div class="row">
          <div id="category-main-slider" class="category-main-slider col-md-7">
            <div>
              <h3 class="cat-titles pink-dashed"><span>
                <?php ucwords(single_cat_title());?>
                </span></h3>
              <?php 
				$catArticleArgsNew = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 3,
					'file_template' => 'section/category-article-slider.php',					
				);
			?>
              <div class="category-articles-container slick-slider-one">
                <?php bi_display_brand($catArticleArgsNew);?>
              </div>
            </div>
          </div>
          <div id="category-recent-articles" class="category-recent-articles col-md-5">
            <div>
              <h3 class="cat-titles">Latest in <?php ucwords(single_cat_title());?></h3>
              <div class="recent-article-wrap">
                <?php 
				$catArticleArgs = array(
					'category_name' => single_cat_title(null,false),
					'post_per_page'	=> 5,
					'file_template' => 'section/catpage-category-articles.php',
					'offset' => 3, // skips first 3 since its displayed earlier
				);
			  ?>
                <div class="category-articles-container">
                  <?php bi_display_brand($catArticleArgs);?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="category-video-containers col-md-12">
            <div>
              <h3 class="cat-titles pink-dashed"><span>
                <?php ucwords(single_cat_title());?>
                Videos</span></h3>
              <div class="category-video-box">
                <?php /*set arguments */
					$videosArgs = array(
					    'posts_per_page' 	=> 3,
					    'category_name' 	=> NULL, //reset
					    'file_template'	 	=> 'section/category-video.php',
					    /* no tax yet, not finished with recategorizing
					    'tax_query' 		=> array( array(
										            'taxonomy' => 'category',
										            'field' => 'slug',
										            'terms' => 'makeup-videos',
										            //'operator' => 'AND' 
						))*/
					);
				?>
                <?php bi_display_popular_videos($videosArgs);?>
              </div>
            </div>
          </div>
          <div class="category-product-containers  col-md-12">
            <div>
              <h3 class="cat-titles pink-dashed"><span>
                <?php ucwords(single_cat_title());?>
                Products</span></h3>
              <?php /*set arguments */
				$productArgs = array(
				    'posts_per_page' 	=> 10,
					'post_type'			=> 'product',			    
				    'category_name' 	=> NULL, //reset
				    'file_template'	 	=> 'section/category-product.php',
				    /*
				    'tax_query' 		=> array( array(
									            'taxonomy' => 'category',
									            'field' => 'slug',
									            'terms' => 'makeup-videos',
									            //'operator' => 'AND'
									           
					)) */
				);
			?>
              <div class="category-product-container slick-slider-four" id="products-carousel">
                <?php bi_display_products($productArgs); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
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
