<?php
// It's limited to 4 elements per row
$total = count($row_item['grid_elements']);
if($total < 3){
  $grid_size = 4;
  $offset_size = (12 - $total * $grid_size)/2;
}elseif($total <= 4){
  $grid_size = 12/$total;
  $offset_size = 0;
}else{
  $grid_size = 3;
  $offset_size = 0;
}
// Cache first element in array to apply offset only to it
reset($row_item['grid_elements']);
$first = key($row_item['grid_elements']);
?>
<?php if ($row_item['grid_style'] == 'grid'): ?>
<div class="container">
<?php elseif ($row_item['grid_style'] == 'carousel'): ?>
<script>
  jQuery(document).ready(function() {
    jQuery('.highlights').owlCarousel({
      items: 4,
      loop: true,
      margin: 10,
      <?php if ($row_item['grid_autoplay']): ?>
      autoplay: true,
      autoplayHoverPause: true,
      <?php if ($row_item['grid_timeout']): ?>
      autoplayTimeout:<?php echo $row_item['grid_timeout'] ?>,
      <?php endif; ?>
      <?php endif; ?>
      dots: false,
      responsiveClass: true,
      responsive : {
          0 : {
            items: 1,
          },
          768 : {
          }
      },
      nav: true,
      navText: [
        "<i class='fa fa-angle-left fa-lg' aria-hidden='true'></i>",
        "<i class='fa fa-angle-right fa-lg' aria-hidden='true'></i>"
      ],
    });
  });
</script>
<?php endif; ?>
  <div class="highlights <?php echo $grid_style = ($row_item['grid_style'] == 'grid') ? 'row' :
                                ( ($row_item['grid_style'] == 'carousel') ? 'owl-carousel' : '' ); ?>">
  <?php foreach ($row_item['grid_elements'] as $key => $grid_element): ?>

    <div class="<?php if($row_item['grid_style']=='grid'): ?>col-md-<?php echo $grid_size ?><?php if ($key === $first): ?> col-md-offset-<?php echo $offset_size ?><?php endif; ?><?php endif; ?> text-center highlight-item">
      <?php if ($grid_element['link']['url']):?>
        <a href="<?php echo $grid_element['link']['url']?>"
           target="<?php echo $grid_element['link']['target']?>"
           title="<?php echo $grid_element['link']['title']?>">
      <?php endif; ?>
      <?php if($row_item['grid_type']=='images'): ?>
        <img src="<?php echo $grid_element['image']['sizes']['shop_catalog'] ?>"
             class="highlight-item__image img-responsive center-block">
      <?php elseif ($row_item['grid_type']=='icons'): ?>
        <div class="icons__icon text-primary">
          <?php echo $grid_element['font_icon'] ?>
        </div>
      <?php endif; ?>
      <?php if ($grid_element['link']['url']):?></a><?php endif; ?>
      <h4 class="icons__title text-uppercase"><?php echo $grid_element['title'] ?></h4>
      <p class="icons__text"><?php echo $grid_element['description'] ?></p>
    </div>

  <?php endforeach ?>
  </div>
<?php if ($row_item['grid_style'] == 'grid'): ?>
</div>
<?php endif; ?>
