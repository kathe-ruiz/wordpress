<div class="swbi">
  <div class="footer__info">
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
    <?php if (function_exists('sw_options') && sw_options('email')): ?>
      <a class="footer__link" href="mailto:<?php echo sw_options('email'); ?>">
        <i class="footer__icon fa footer__icon--2x fa-envelope" aria-hidden="true"></i>
        <span class="footer__text text-secondary" href="#"><?php echo sw_options('email'); ?></span>
      </a>
    <?php endif ?>
    <?php $phone = sw_get_phone(); ?>
    <?php $secondary_phone = sw_get_phone('secondary'); ?>
    <br>
    <?php if ($phone): ?>
      <a class="footer__link" href="tel:<?php echo $phone; ?>">
        <i class="footer__icon fa footer__icon--2x fa-phone" aria-hidden="true"></i>
        <span class="footer__text text-secondary" href="#"><?php echo $phone; ?></span>
      </a>
    <?php endif ?>
    <br>
    <?php if ($secondary_phone): ?>
      <a class="footer__link" href="tel:<?php echo $secondary_phone; ?>">
        <i class="footer__icon fa footer__icon--2x fa-phone" aria-hidden="true"></i>
        <span class="footer__text text-secondary" href="#"><?php echo $secondary_phone; ?></span>
      </a>
    <?php endif ?>
  </div>
  <div class="socialmedia footer__socialmedia">
    <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
    <?php //echo get_template_directory().'/templates/includes/socialmedia.php' ?>
  </div>
</div>
