<?php
  /**
   * Component slider with OWL Carousel javascript plugin
   * @var slider no required, if the sliders
   * is empty default slider is rendered
   *
   */
?>
<?php $slides = get_slides_array($row_item['slider']); ?>
<?php $type = $row_item['slider_type']; ?>
<?php $height = ($type == 'fixed') ? $row_item['slider_height'] : '' ; ?>
<div class="owl-carousel owl-theme">
  <?php foreach ($slides as $key => $slide): ?>
    <?php
      $image = get_if_exists($slide['image']);
      $title = get_if_exists($slide['title']);
      $subtitle = get_if_exists($slide['title_2']);
      $description = get_if_exists($slide['description']);
      $link = get_if_exists($slide['link']['url']);
      $cta = get_if_exists($slide['link']['title']);

      $style = '';
      switch ( $type ) {
        case 'full':
          $style = "min-height: 600px";
          break;
        case 'fixed':
          $style = "height: {$height}px";
          break;
        default:
          break;
      }
    ?>
    <div class="item"<?php if( $style ): ?> style="<?php echo $style; ?>"<?php endif; ?>> 
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
        <?php if ($title || $description || ($link and $cta)): ?>
        <div class="caption">
        <?php if ($title || $description): ?>
          <?php if ($title): ?><h2><?php echo $title ?></h2><?php endif ?>
          <?php if ($subtitle): ?><h4><?php echo $subtitle ?></h4><?php endif ?>
          <?php if ($description): ?><p class="text-secondary"><?php echo $description ?></p><?php endif ?>
        <?php endif ?>
        <?php if ($link and $cta): ?>
          <a href="<?php echo $link ?>" class="btn btn-primary">
            <?php echo $cta; ?>
          </a>
          <?php endif ?>
        </div>
          <?php endif ?>
      </div>
  <?php endforeach ?>
</div>
