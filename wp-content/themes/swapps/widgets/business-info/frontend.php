<div class="footer__info">
<?php if (function_exists('sw_options') && sw_options('email')): ?>
  <a class="footer__link" href="mailto:<?php echo sw_options('email'); ?>">
    <i class="footer__icon fa footer__icon--2x fa-envelope" aria-hidden="true"></i>
    <span class="footer__text text-secondary" href="#"><?php echo sw_options('email'); ?></span>
  </a>
<?php endif ?>
<?php if (function_exists('sw_options') && (sw_options('address') || sw_options('city') || sw_options('country'))): ?>
  <span class="footer__address">
    <i class="footer__icon fa footer__icon--3x fa-map-marker" aria-hidden="true"></i>
    <span class="footer__text footer__text--light text-secondary"><?php echo sw_options('address'); ?><br>
    <?php if (sw_options('city')): ?>
      <?php echo sw_options('city'); ?>,&nbsp;
    <?php endif ?>
    <?php if (sw_options('country')): ?>
      <?php echo sw_options('country'); ?>
    <?php else: ?>
      Colombia
    <?php endif ?>
    </span>
  </span>
<?php endif ?>
<?php $phone = sw_get_phone(); ?>
<?php if ($phone): ?>
  <div class="footer__phone">
    <a href="tel:<?php echo $phone; ?>" class="footer__btn navbar__btn btn btn-primary-outline btn-sm"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo $phone; ?></span></a>
    <?php $secondary_phone = sw_get_phone('secondary'); ?>
    <?php if ($secondary_phone): ?>
      <a href="tel:<?php echo $secondary_phone; ?>" class="footer__btn navbar__btn btn btn-primary-outline btn-sm"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo $secondary_phone; ?></span></a>
    <?php endif ?>
  </div>
<?php endif ?>
</div>