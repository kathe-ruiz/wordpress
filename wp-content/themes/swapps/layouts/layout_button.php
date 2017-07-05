<?php if (is_array($row_item)): ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="<?php echo $row_item['link']['url'] ?>" class="btn btn-primary text-uppercase"
          <?php if ($row_item['link']['title']): ?>
            title="<?php echo $row_item['link']['title'] ?>"
          <?php endif; ?>
          <?php if ($row_item['link']['target']): ?>
            target="<?php echo $row_item['link']['target'] ?>"
          <?php endif; ?>
        >
          <?php echo $row_item['link']['title'] ?>
        </a>
      </div>
    </div>
  </div>
<?php endif ?>
