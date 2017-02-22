<div class="container text-center">
  <div class="row heading">
    <div class="col-md-12">
      <?php if (isset($row_item['title']) ): ?>
        <h2 class="heading__title">
          <?php echo $row_item['title'] ?>
        </h2>
      <?php endif ?>
      <?php if (isset($row_item['subtitle']) ): ?>
        <h4 class="heading__subtitle">
          <?php echo $row_item['subtitle'] ?>
        </h4>
      <?php endif ?>
    </div>
  </div>
</div>
