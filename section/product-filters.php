<h3 class="cat-titles pink-dashed"><span> Filters</span></h3>
<form  method="post">
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
			'skincare' => array('skin-care-concerns','skin-type','face','eye','lip','nail','makeup-remover'),			
			'hair' => array('styling','shampoo-conditioner','treatment','moisturiser','scalp-treatment','sun-care','fragrance'),
			'body' => array('bath-shower','moisturiser','treatment','sun-care','fragrance','grooming'),
		);
		?>				
		<?php if( array_key_exists($showCat, $filtersAttributes) ): ?>
			<?php $activeAttrs = $filtersAttributes[$showCat]; ?>			
			<?php foreach($activeAttrs as $attribute) :?>
				<?php $parentAttr = get_term_by('slug',$attribute,'attribute_category'); ?>
				<h4 class="filter-title">Filter by <?php echo $parentAttr->name;?></h4>
				<?php $childrenAttr = get_term_children($parentAttr->term_id,'attribute_category'); ?>
				<div class="attribute-child-container col-sm-12">
				<?php foreach($childrenAttr as $childAttrId):?>
					<?php $childAttr = get_term($childAttrId);?>															
					<?php if($childAttr->count):?>
					<div class="checkbox"> 						
						<label> <input type="checkbox" class="item-filters attr-filters" name="filterAttr[]" value="<?php echo $childAttr->term_id;?>"> 
							<?php echo $childAttr->name;?> 
						</label> 
					</div>					
					<?php endif;?>
				<?php endforeach;?>
				</div>
			<?php endforeach;?>
		<?php endif; ?>
	</div>

	<div class="form-row category-filters filter-list">
	<h4>Filter by Sub Categories</h4>
	<?php $childCat = get_term_children( $parentCat->cat_ID, 'category' ); ?>														
	<div class="attribute-child-container col-sm-12">
	<?php foreach($childCat as $childId): ?>	
	<?php $curChild = get_category($childId); ?>										
		<div class="form-row">
			<div class="checkbox"> 
				<label> 
					<input type="checkbox" class="cat-filters item-filters" name="filterCat[]" value="<?php echo $curChild->cat_ID;?>"> 
					<?php echo $curChild->cat_name;?>
				</label> 
			</div>
		</div>								
	<?php endforeach; ?>		
	</div>
	</div>	
	<div class="form-row">
		<div class="form-group">
			<button type="submit" class="btn btn-default item-filters">Filter</button>
		</div>
	</div>
</form> 