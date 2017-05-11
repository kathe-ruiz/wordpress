<?php if ( function_exists( 'mc4wp_show_form' ) && isset($row_item['sign_up']) ): ?>
<div class="container subscribe">
  <div class="row text-center">
    <?php mc4wp_show_form(); ?>
  </div>
</div>
<?php endif; ?>