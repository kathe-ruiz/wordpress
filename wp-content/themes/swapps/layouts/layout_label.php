<?php if ($row_item['text']):
  $label_classes = ['label','label-primary'];
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <span class="<?php echo implode(" ", $label_classes) ?>"><?php echo $row_item['text']; ?></span>
    </div>
  </div>
</div>
<?php endif; ?>
