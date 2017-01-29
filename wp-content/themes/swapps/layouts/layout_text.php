<?php
$grid_size = 12 / count($row_item['texts']);
?>
<div class="container">
  <div class="row two-lines__block">
  <?php foreach ($row_item['texts'] as $key => $text ): ?>
    <div class="col-md-<?php echo $grid_size ?> text-left two-lines__text">
      <?php echo $text['text'] ?>
    </div>
  <?php endforeach ?>
  </div>
</div>
