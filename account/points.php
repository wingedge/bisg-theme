<div class="yp-title1 mintop20">Points History</div>
<div class="yp-title2 mintop20"></div>
<div class="yp-line"></div>
<div class="clearfx"></div>

<div class="yp-mp">

<?php $points = $BIReview->get_user_points($user->id);?>
<table class="table table-bordered table-condensed">
	
<?php if($points):?>
	<tr>
		<th>Date</th>
		<th>Remarks</th>
		<th>Points</th>
		<th>Validity</th>
	</tr>
	<?php foreach($points as $point):?>
		<tr>
			<td><?php echo date("F d, Y",strtotime($point->created_at));?></td>
			<td><?php echo $point->remark;?></td>
			<td><?php echo $point->points;?></td>
			<td><?php echo date("F d, Y",strtotime($point->deleted_at));?></td>
		</tr>
	<?php endforeach;?>
<?php else:?>
	<tr><td>No Points</td></tr>
<?php endif;?>
</table>

</div>