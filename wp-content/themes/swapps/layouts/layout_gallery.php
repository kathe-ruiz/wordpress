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
    <div class="col-sm-6 col-sm-offset-3">
      <div class="heading">
        <h2 class="heading__title text-center">Nuestros Productos</h2>
        <h4 class="heading__subtitle text-center">
          Vestibulum interdum ante sit amet felis aliquet commodo. Sed semper ornare tristique.
        </h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="gallery text-center">
        <div class="row">
          <?php foreach ($row_item['gallery'] as $item): ?>
            <?php
              $image = $item['url'];
              $size = $item['sizes']['shop_catalog'];
            ?>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo $image; ?>">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo $size; ?>" alt="">
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
