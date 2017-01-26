<?php $position = $key % 2 ?>

<div class="container">
  <div class="row">
    <div class="col-sm-6 <?php echo ($position) ? ' pull-right ' : ' pull-left ' ?>">
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
        <div class="heading__text text-secondary">
          <?php echo $row_item['description'] ?>
        </div>
      <?php endif ?>
      <?php if ($row_item['include_button']): ?>
        <a class="image-text__btn btn btn-primary" href="<?php echo $row_item['button_link']; ?>"><?php echo $row_item['button_label']; ?></a>
      <?php endif ?>
    </div>
  </div>
</div>
