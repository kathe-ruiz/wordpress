<?php if(isset($row_item['slider'])): ?>
<?php $slides = get_slides_array($row_item['slider']); ?>
<?php $slider_id = uniqid(); ?>
<script>
// Initialize slider
  jQuery(document).ready(function() {
    jQuery('#slider-<?php echo $slider_id; ?>').owlCarousel({
      items: 1,
      loop: true,
      margin: 0,
      responsiveClass: true,
      responsive : {
          0 : {
              dots : false,
          },
          768 : {
              dots : true,
          }
      },
      nav: true,
      navText: [
        "<i class='fa fa-angle-left fa-lg' aria-hidden='true'></i>",
        "<i class='fa fa-angle-right fa-lg' aria-hidden='true'></i>"
      ],
      autoplay:true,
      <?php if ($row_item['timeout']): ?>
      autoplayTimeout:<?php echo $row_item['timeout'] ?>
      <?php endif; ?>
    });
  })
</script>
<div id="slider-<?php echo $slider_id; ?>" class="owl-carousel owl-theme">
<?php foreach ($slides as $key => $slide): ?>
  <?php
    $image = $slide['image'];
    $heading = $slide['heading'];
    $title = $slide['title'];
    $title_2 = $slide['title_2'];
    $description = $slide['description'];
    $link = $slide['link'];
  ?>
  <div class="item">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
        <?php if ($heading): ?>
          <h4 class="sliders__title text-center"><?php echo $heading ?></h4>
        <?php endif; ?>
        <?php if ($description): ?>
          <p class="sliders__text text-secondary"><?php echo strip_tags($description) ?></p>
        <?php endif; ?>
        <div class="sliders__divider row">
          <div class="col-md-6 col-md-offset-3">
            <hr>
          </div>
        </div>
        <div class="sliders__footer">
          <?php if ($title): ?><p><?php echo $title ?></p><?php endif; ?>
          <?php if ($title_2): ?>
            <p class="text-secondary"><?php echo $title_2 ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php endif; ?>

