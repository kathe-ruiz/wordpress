<?php
$grid_size = 12 /count($row_item['texts']);
?>
<div class="row">
<?php foreach ($text => $row_item['texts']): ?>
	<div class="col-md-<?php echo $grid_size ?>">
		<?php echo $text ?>
	</div>
<?php endforeach ?>
</div>