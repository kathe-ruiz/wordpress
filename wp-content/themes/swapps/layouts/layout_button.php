<?php if (is_array($row_item)): ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="<?php echo $row_item['link'] ?>" class="btn btn-primary">
          <?php echo $row_item['label'] ?>
        </a>
      </div>
    </div>
  </div>
<?php endif ?>
