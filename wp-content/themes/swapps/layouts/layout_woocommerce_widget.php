<?php if ( function_exists( dynamic_sidebar( 'Woocommerce Banner ' ) ) ) : ?>
  <div class="widget-area woocommerce-banner">
    <?php dynamic_sidebar( 'Woocommerce Banner' ); ?>
  </div>
<!-- Woocommerce Banner -->
<?php endif; ?>
<div class="container">
  <div class="row two-lines__block">
    <div class="col-md-<?php echo $grid_size ?> text-left two-lines__text">
      <?php echo $row_item['woocommerce-widget'] ?>
    </div>
  </div>
</div>
