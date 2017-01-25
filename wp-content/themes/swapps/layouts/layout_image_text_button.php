<div class="container">
  <div class="row image-text__content">
    <div class="col-sm-6">
    <?php if ($row_item['image']): ?>
      <img class="image-text__image center-block img-responsive" src="<?php echo $row_item['image']['url']; ?>" alt="">
    <?php endif ?>
    </div>
    <div class="col-sm-6">
      <?php if (isset($row_item['title']) ): ?>
        <h2 class="heading__title">
          <?php echo $row_item['title'] ?>
        </h2>
      <?php endif ?>
      <?php if (isset($row_item['description']) ): ?>
        <p class="heading__text text-secondary">
          <?php echo $row_item['description'] ?>
        </p>
      <?php endif ?>
      <?php if (isset($row_item['include_button']) ): ?>
        <a class="image-text__btn btn btn-primary" href="<?php echo $row_item['button_link']; ?>"><?php echo $row_item['button_label']; ?></a>
      <?php endif ?>
    </div>
  </div>
</div>