<h3 class="cat-titles pink-dashed"><span> Filters</span></h3>
<form  method="post">
	<div class="form-row">
		<div class="form-group">
			<button type="button" id="clearFilters" class="btn btn-default btn-sm">Clear All</button>
		</div>
	</div>
	<div class="form-row">
		<h4>Search by Term</h4>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search Product..." id="byterm" name="term"/>					
		</div>
	</div>
	<div class="form-row attributes-filters" >		
		<?php
		global $showCat;		
		$parentCat = get_category_by_slug( $showCat );		 
		$filtersAttributes = array(
			'makeup' => array('skin-type','face','eye','lip','nail','makeup-remover-2'),
			'skincare' => array('skin-care-concerns','skin-type','moisturiser','cleanser-exfoliator','treatment-serums','masks','toner','sun-care'),			
			'hair' => array('styling','shampoo-conditioner-2','treatment'),
			'body' => array('bath-shower','moisturiser','treatment','sun-care','fragrance','grooming'),			
		);
		?>				
		<?php if( array_key_exists($showCat, $filtersAttributes) ): ?>
			<?php $activeAttrs = $filtersAttributes[$showCat]; ?>			
			<?php foreach($activeAttrs as $attribute) :?>
				<?php $parentAttr = get_term_by('slug',$attribute,'attribute_category'); ?>
				<h4 class="filter-title"><?php echo $parentAttr->name;?></h4>
				<?php $childrenAttr = get_term_children($parentAttr->term_id,'attribute_category'); ?>				
				<div class="attribute-child-container col-sm-12">
				<?php if($childrenAttr):?>
					<?php foreach($childrenAttr as $childAttrId):?>
						<?php $childAttr = get_term($childAttrId);?>															
						<?php if( !empty($childAttr) ):?>
						<div class="checkbox"> 						
							<label> <input type="checkbox" class="item-filters attr-filters" name="filterAttr[]" value="<?php echo $childAttr->term_id;?>"> 
								<?php echo $childAttr->name;?> 
							</label> 
						</div>					
						<?php endif;?>
					<?php endforeach;?>
				<?php else:?>					
					<div class="checkbox">					
						<label> <input type="checkbox" class="item-filters attr-filters" name="filterAttr[]" value="<?php echo $parentAttr->term_id;?>"> 
							<?php echo $parentAttr->name;?> 
						</label> 
					</div>	
				<?php endif;?>
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
				<h4 class="filter-title"><?php echo $parentAttr->name;?></h4>
				<?php $childrenAttr = get_term_children($parentAttr->term_id,'category'); print_r($childrenAttr); ?>				
				<div class="attribute-child-container col-sm-12">
				<?php foreach($childrenAttr as $childAttrId):?>
					<?php echo $childAttrId;?>
					<?php $childAttr = get_term($childAttrId,'category');?>															
					<?php #if($childAttr->count):?>
					<div class="checkbox"> 						
						<label> <input type="checkbox" class="item-filters cat-filters" name="filterCat[]" value="<?php echo $childAttr->term_id;?>"> 
							<?php echo $childAttr->name;?> 
						</label> 
					</div>					
					<?php #endif;?>
				<?php endforeach;?>
				</div>
			<?php endforeach;?>
		<?php endif; ?>
	</div>	
</form> 

<h4 class="filter-title">Couldn't find what your looking for? Request to add the product here. </h4>
<?php echo do_shortcode('[contact-form-7 id="25660" title="Request Products"]');?>