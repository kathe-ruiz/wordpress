<div class="pre-header__swbi">
  <div class="info">
    <?php $phone = sw_get_phone(); ?>
    <?php if ($phone): ?>
      <div class="textitem">
        <a class="textitem__link" href="tel:<?php echo $phone; ?>">
          <i class="textitem__icon fa fa-phone" aria-hidden="true"></i>
          <span class="textitem__text text-secondary" href="#"><?php echo $phone; ?></span>
        </a>
      </div>
    <?php endif ?>
    <?php if (function_exists('sw_options') && sw_options('email')): ?>
      <div class="textitem">
        <a class="textitem__link" href="mailto:<?php echo sw_options('email'); ?>">
          <i class="textitem__icon fa fa-envelope" aria-hidden="true"></i>
          <span class="textitem__text text-secondary" href="#"><small><?php echo sw_options('email'); ?></small></span>
        </a>
      </div>
    <?php endif ?>
  </div>
  <div class="socialmedia hidden-xs">
    <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
  </div>
</div>
