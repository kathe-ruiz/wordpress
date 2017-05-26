<div class="swbi">
  <div class="info">
    <?php if (function_exists('sw_options') && (sw_options('address') || sw_options('city') || sw_options('country'))): ?>
      <div class="textitem">
        <i class="textitem__icon fa fa-3x fa-map-marker" aria-hidden="true"></i>
        <?php if (sw_options('address')): ?>
        <span class="textitem__text textitem__text--light text-secondary text-capitalize"><?php echo sw_options('address'); ?>
        <?php endif ?>
        <?php $location = array(sw_options('city'), sw_options('country')); ?>
        <?php if (sw_options('address') && array_filter($location)): ?><br><?php endif ?>
        <?php if (array_filter($location)): ?><?php echo implode(',&nbsp', array_filter($location)) ?><?php endif ?>
        </span>
      </div>
    <?php endif ?>
    <?php if (function_exists('sw_options') && sw_options('email')): ?>
      <div class="textitem">
        <a class="textitem__link" href="mailto:<?php echo sw_options('email'); ?>">
          <i class="textitem__icon fa fa-2x fa-envelope" aria-hidden="true"></i>
          <span class="textitem__text text-secondary" href="#"><?php echo sw_options('email'); ?></span>
        </a>
      </div>
    <?php endif ?>
    <?php $phone = sw_get_phone(); ?>
    <?php $secondary_phone = sw_get_phone('secondary'); ?>
    <?php if ($phone): ?>
      <div class="textitem">
        <a class="textitem__link" href="tel:<?php echo $phone; ?>">
          <i class="textitem__icon fa fa-3x fa-phone" aria-hidden="true"></i>
          <span class="textitem__text text-secondary" href="#"><?php echo $phone; ?></span>
        </a>
      </div>
    <?php endif ?>
    <?php if ($secondary_phone): ?>
      <div class="textitem">
        <a class="textitem__link" href="tel:<?php echo $secondary_phone; ?>">
          <i class="textitem__icon fa fa-3x fa-phone" aria-hidden="true"></i>
          <span class="textitem__text text-secondary" href="#"><?php echo $secondary_phone; ?></span>
        </a>
      </div>
    <?php endif ?>
  </div>
  <div class="socialmedia footer__socialmedia">
    <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
    <?php //echo get_template_directory().'/templates/includes/socialmedia.php' ?>
  </div>
</div>
