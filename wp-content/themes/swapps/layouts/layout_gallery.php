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
        <?php if ($row_item['title']): ?>
          <div class="heading">
            <h2 class="heading__title"><?php echo($row_item['title']) ?></h2>
          </div>
        <?php endif ?>
          <?php foreach ($row_item['gallery'] as $item): ?>
            <?php
              $image = $item['url'];
              $name = $item['name'];
              $size = $item['sizes']['shop_catalog'];
              $size = get_if_exists($item['sizes']['shop_catalog'], $default=$item['sizes']['medium']);
              $width = $item['sizes']['shop_catalog-width'];
              $height = $item['sizes']['shop_catalog-height'];
            ?>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo $image; ?>">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__image img-responsive" src="<?php echo $size; ?>"  width="<?php echo $width ?>" height="<?php echo $width ?>" alt="<?php echo $name; ?>">
              </a>
            </div>
          <?php endforeach ?>
        </div>
        <?php if ($row_item['title']): ?>
          <div class="row">
            <div class="gallery__description">
              <?php echo($row_item['description']) ?>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
