<?php $position = $key % 2 ?>

<div class="container image-text">
  <div class="row image-text__content">
    <div class="col-sm-6 <?php echo ($position) ? ' pull-right ' : ' pull-left ' ?>">
    <?php if ($row_item['image']): ?>
      <img class="image-text__image center-block img-responsive" src="<?php echo $row_item['image']['url']; ?>" alt="<?php echo $row_item['image']['name']; ?>">
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
        <?php if (($row_item['button_link']['url']) and (($row_item['button_link']['title']) != "")): ?>
          <a class="image-text__btn btn btn-primary"
             href="<?php echo $row_item['button_link']['url']; ?>"
             <?php if ($row_item['button_link']['title']): ?>
             title="<?php echo $row_item['button_link']['title'] ?>"
             <?php endif; ?>
             <?php if ($row_item['button_link']['target']): ?>
             target="<?php echo $row_item['button_link']['target'] ?>"
             <?php endif; ?>
          >
          <?php echo $row_item['button_link']['title']; ?></a>
        <?php endif; ?>
      <?php endif ?>
    </div>
  </div>
</div>
