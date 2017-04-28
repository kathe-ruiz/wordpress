<?php
// It's limited to 4 elements per row
$total = count($row_item['grid_elements']);
if($total < 3){
  $grid_size = 4;
  $offset_size = (12 - $total * $grid_size)/2;
}else{
  $grid_size = 12/$total;
  $offset_size = 0;
}
// Cache first element in array to apply offset only to it
reset($row_item['grid_elements']);
$first = key($row_item['grid_elements']);
?>
<div class="container">
  <div class="row highlights">
  <?php foreach ($row_item['grid_elements'] as $key => $grid_element): ?>
    <?php if($row_item['grid_type']=='images'): ?>
        <?php /*print_r($grid_element['image']['sizes']);*/
      ?>
      <div class="col-md-<?php echo $grid_size ?> <?php if ($key === $first): ?> col-md-offset-<?php echo $offset_size ?><?php endif; ?> text-center highlight-item">
        <?php if ($grid_element['link']['url']):?>
          <a href="<?php echo $grid_element['link']['url']?>" target="<?php echo $grid_element['link']['target']?>" title="<?php echo $grid_element['link']['title']?>">
            <img src="<?php echo $grid_element['image']['sizes']['shop_catalog'] ?>" class="highlight-item__image img-responsive center-block">
          </a>
        <?php else: ?>
          <img src="<?php echo $grid_element['image']['sizes']['shop_catalog'] ?>" class="highlight-item__image img-responsive center-block">
        <?php endif ?> 
        <h4 class="icons__title text-uppercase"><?php echo $grid_element['title'] ?></h4>
        <p class="icons__text"><?php echo $grid_element['description'] ?></p>
      </div>
    <?php elseif($row_item['grid_type']=='icons'): ?>
      <div class="col-md-<?php echo $grid_size ?> <?php if ($key === $first): ?>col-md-offset-<?php echo $offset_size ?><?php endif; ?> text-center">
        <?php if ($grid_element['link']['url']):?>
          <a href="<?php echo $grid_element['link']['url']?>" target="<?php echo $grid_element['link']['target']?>" title="<?php echo $grid_element['link']['title']?>">
            <div class="icons__icon text-primary">
              <?php echo $grid_element['font_icon'] ?>
            </div>
          </a>
        <?php else: ?>
          <div class="icons__icon text-primary">
            <?php echo $grid_element['font_icon'] ?>
          </div>
        <?php endif ?>
        <h4 class="icons__title text-uppercase"><?php echo $grid_element['title'] ?></h4>
        <p class="icons__text"><?php echo $grid_element['description'] ?></p>
      </div>
    <?php endif ?>
  <?php endforeach ?>
  </div>
</div>
