
<div class="mbc">
	<button class="btn-filters">Apply Filters</button>
</div>

<div class="filters-box-overlay"></div>
<div id="filters-box" class="filters-box">
<h3 class="cat-titles pink-dashed"><span> Filters</span></h3>
<form  method="post">
	<div class="form-row">
		<div class="form-group">
			<button type="button" id="applyfilters" class="applyfilters btn btn-default btn-sm">Search</button>
			<button type="button" id="clearFilters" class="clearFilters btn btn-default btn-sm">Clear All</button>
		</div>
	</div>
	<div class="form-row">
		<h4>Search Establishment</h4>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search Establishments..." id="byterm" name="term"/>
		</div>
		<?php /*
		<h4>Sort</h4>
		<div class="form-group">
			<div class="checkbox">
			<label> <input type="checkbox" class="item-sort" value="" disabled> No of Reviews</label>
			</div>
			<div class="checkbox">
			<label> <input type="checkbox" class="item-sort" value="" disabled> Customer Review Rating</label>
			</div>			
		</div>
		*/ ?>
	</div>
	<div class="form-row attributes-filters" >		
		<?php
		global $showCat;		
		$parentCat = get_category_by_slug( $showCat );		 
		$filtersAttributes = array(
			'spas' => array('location','types'),
			'hair-salons' => array('location','hair-and-makeup', 'nail', 'hair-removal'),
			'beauty-salons' => array('location','facials-peels', 'nail','body'),
			'aesthetics' => array('location','face','skin','body-treatment','hair'),
			'wellness' => array('location','services'),
		);
		?>				
		<?php if( array_key_exists($showCat, $filtersAttributes) ): ?>
			<?php $activeAttrs = $filtersAttributes[$showCat]; ?>			
			<?php foreach($activeAttrs as $attribute) :?>
				<?php $parentAttr = get_term_by('slug',$attribute,'establishment_category'); ?>
				<div class="filter-attribute-container">
				<h4 class="filter-title"><?php echo $parentAttr->name;?></h4>
				<?php $childrenAttr = get_term_children($parentAttr->term_id,'establishment_category'); ?>				
				<div class="attribute-child-container col-sm-12">
				<?php if($childrenAttr):?>
					<?php foreach($childrenAttr as $childAttrId):?>
						<?php $childAttr = get_term($childAttrId);?>															
						<?php if( $childAttr->count ):?>
						<div class="checkbox"> 						
							<label> <input type="checkbox" class="item-filters eattr-filters" name="filterAttr[]" value="<?php echo $childAttr->term_id;?>"> 
								<?php echo $childAttr->name; ?> 
							</label> 
						</div>					
						<?php endif;?>
					<?php endforeach;?>
				<?php else:?>					
					<div class="checkbox">					
						<label> <input type="checkbox" class="item-filters eattr-filters" name="filterAttr[]" value="<?php echo $parentAttr->term_id;?>"> 
							<?php echo $parentAttr->name;?> 
						</label> 
					</div>	
				<?php endif;?>
				</div>
				</div>
			<?php endforeach;?>
		<?php endif; ?>
	</div>

	<div class="form-row attributes-filters" >				
		<?php		
		$filtersCategories = array(
			//'makeup' => array('face','eye','lips','nail','makeup-remover'),
			//'skincare' => array('masks','toners'),			
			//'hair' => array('styling','shampoo-conditioner','treatment','moisturiser','scalp-treatment','sun-care','fragrance'),
			//'body' => array('bath-shower','moisturiser','treatment','sun-care','fragrance','grooming'),
		);
		?>				
		<?php if( array_key_exists($showCat, $filtersCategories) ): ?>
			<?php $activeAttrs = $filtersCategories[$showCat]; ?>			
			<?php foreach($activeAttrs as $attribute) :?>
				<?php $parentAttr = get_term_by('slug',$attribute,'category'); ?>
				<div class="filter-attribute-container">
				<h4 class="filter-title"><?php echo $parentAttr->name;?></h4>
				<?php $childrenAttr = get_term_children($parentAttr->term_id,'category'); print_r($childrenAttr); ?>				
				<div class="attribute-child-container col-sm-12">
				<?php foreach($childrenAttr as $childAttrId):?>
					<?php echo $childAttrId;?>
					<?php $childAttr = get_term($childAttrId,'category');?>															
					<?php #if($childAttr->count):?>
					<div class="checkbox"> 						
						<label> <input type="checkbox" class="item-filters ecat-filters" name="filterCat[]" value="<?php echo $childAttr->term_id;?>"> 
							<?php echo $childAttr->name;?> 
						</label> 
					</div>					
					<?php #endif;?>
				<?php endforeach;?>
				</div>
				</div>
			<?php endforeach;?>
		<?php endif; ?>
	</div>	

	<div class="form-row">
		<div class="form-group">
			<button type="button" id="applyfilters" class="applyfilters btn btn-default btn-sm">Search</button>
			<button type="button" id="clearFilters" class="clearFilters btn btn-default btn-sm">Clear All</button>
		</div>
	</div>
	
</form> 
<h4 class="filter-title">Couldn't find what your looking for? Request to add the establishment here. </h4>
<?php echo do_shortcode('[contact-form-7 id="30550" title="Request Establishment"]');?>
</div>