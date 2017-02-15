<?php
  /**
   * Component slider with OWL Carousel javascript plugin
   * @var slider no required, if the sliders
   * is empty default slider is rendered
   *
   */
?>
<section id="five" class="container home-section">
  <div class="row">
    <div class="col-md-12">
      <div class="gallery text-center">
        <div class="row">
          <?php foreach ($row_item['gallery'] as $item): ?>
            <?php
              $image = $item['url'];
              $size = $item['sizes']['shop_catalog'];
              $size = get_if_exists($item['sizes']['shop_catalog'], $default=$item['sizes']['medium']);
              $width = $item['sizes']['shop_catalog-width'];
              $height = $item['sizes']['shop_catalog-height'];
            ?>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo $image; ?>">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo $size; ?>" alt="" width="<?php echo $width ?>" height="<?php echo $width ?>">
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
