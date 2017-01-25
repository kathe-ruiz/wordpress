<?php
// It's limited to 4 elements per row 
$total = count($row_item['grid_elements']);
if($total < 3){
	$grid_size = 4;
	$offset_size = (12 - $total * $grid_size)/2;
}else{
	$grid_size = 12/$total;
}
?>
<div class="container">
	<div class="row">
	<?php foreach ($row_item['grid_elements'] as $grid_element): ?>
		<?php if($row_item['grid_type']=='images'): ?>
			<div class="col-md-<?php echo $grid_size ?> col-md-offset-<?php echo $offset_size ?> text-center">
				<img src="<?php echo $grid_element['image']['url'] ?>">
				<h4 class="icons__title text-uppercase"><?php echo $grid_element['title'] ?></h4>
				<p class="icons__text"><?php echo $grid_element['description'] ?></p>
			</div>
		<?php elseif($row_item['grid_type']=='icons'): ?>
			<div class="col-md-<?php echo $grid_size ?> col-md-offset-<?php echo $offset_size ?> text-center">
				<?php echo $grid_element['font_icon'] ?>
				<h4 class="icons__title text-uppercase"><?php echo $grid_element['title'] ?></h4>
				<p class="icons__text"><?php echo $grid_element['description'] ?></p>
			</div>
		<?php endif ?>
	<?php endforeach ?>
	</div>
</div>