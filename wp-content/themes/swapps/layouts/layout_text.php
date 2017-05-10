<?php
$grid_size = 12 / count($row_item['texts']);
$classes = array('col-md-'. $grid_size, 'text-left', 'two-lines__text');
?>
<div class="container">
  <div class="row two-lines__block">
  <?php foreach ($row_item['texts'] as $key => $text ): ?>
    <?php if ($text['font'] === 'secondary'): array_push($classes, 'text-secondary'); endif; ?>
    <div class="<?php echo implode(' ', $classes) ?>"><?php echo $text['text'] ?></div>
    <?php $classes = array_diff( $classes, ['text-secondary'] ); ?>
  <?php endforeach ?>
  </div>
</div>
