<?php if ( function_exists( 'mc4wp_show_form' ) && isset($row_item['sign_up']) ): ?>
<div class="container">
  <div class="row text-center">
    <?php mc4wp_show_form(); ?>
    <!-- <div class="subscribes__content text-center">
      <input type="email" name="EMAIL" class="subscribes__input form-control" placeholder="Correo electrónico" required />
      <input type="submit" class="subscribes__btn text-uppercase btn btn-primary" value="Suscribirse" />
    </div> -->
  </div>
</div>
<?php endif; ?>