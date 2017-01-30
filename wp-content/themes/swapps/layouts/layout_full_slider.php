<?php
  /**
   * Component slider with OWL Carousel javascript plugin
   * @var slider no required, if the sliders
   * is empty default slider is rendered
   *
   */
?>
<?php $slides = get_slides_array($row_item['slider']); ?>
<div class="owl-carousel owl-theme">
  <?php foreach ($slides as $key => $slide): ?>
    <?php
      $image = $slide['image'];
      $title = $slide['title'];
      $subtitle = $slide['title_2'];
      $description = $slide['description'];
      $link = $slide['link'];
      $cta = $slide['call_to_action_text'];
    ?>
    <div class="item">
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="img-fluid">
        <?php if ($title || $description): ?>
        <div class="caption">
          <?php if ($title): ?><h2><?php echo $title ?></h2><?php endif ?>
          <?php if ($subtitle): ?><h4><?php echo $subtitle ?></h4><?php endif ?>
          <?php if ($description): ?><p class="text-secondary"><?php echo $description ?></p><?php endif ?>
          <?php if ($link): ?>
          <a href="<?php echo $link ?>" class="btn btn-primary">
            <?php if ($cta): echo $cta; endif; ?>
          </a>
          <?php endif ?>
        </div>
        <?php endif ?>
      </div>
  <?php endforeach ?>
</div>
