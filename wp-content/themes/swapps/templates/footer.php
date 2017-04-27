<footer id="footer">
    <?php if ( is_active_sidebar( 'pre_footer' ) ) : ?>
    <div id="pre-footer" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'pre_footer' ); ?>
    </div><!-- #pre-footer -->
  <?php endif; ?>
  <div class="container-fluid footer <?php if (function_exists('sw_options') && sw_options('site_options_footer_color')): ?><?php echo sw_options('site_options_footer_color') ?><?php else: ?>navbar--light<?php endif?>">
    <div class="row">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
    <div class="row row-md-centered">
      <div class="footer__logo">
        <?php if (function_exists('get_custom_footer_logo') && get_theme_mod( 'custom_footer_logo' )): ?>
          <?php echo get_custom_footer_logo(); ?>
        <?php else: ?>
          <div class="logo-name"><strong><?php echo get_bloginfo( 'name' ) ?></strong></div>
        <?php endif ?>
      </div>
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
      </div>
      <?php $phone = sw_get_phone(); ?>
      <?php if ($phone): ?>
      <div class="footer__phone">
          <a href="tel:<?php echo $phone; ?>" class="footer__btn navbar__btn btn btn-primary-outline btn-sm"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo $phone; ?></span></a>
      </div>
      <?php endif ?>
      <div class="footer__right">
        <div class="socialmedia footer__socialmedia">
          <?php include 'includes/socialmedia.php' ?>
        </div>
        <div class="footer__copyright text-right">
          <span class="text-secondary">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ) ?>.</span>
          <span class="text-secondary"><?php _e('All rights reserved') ?></span>
        </div>
        <div class="footer__powered-by">
          <a class="footer__brand" href="//www.swapps.io" title="Powered by Swapps - Django Developers - Web/Mobile Developers" target="_blank">Powered by <img src="<?php echo get_template_directory_uri(); ?>/dist/images/powered-by-swapps.png" alt="powered by swapps"><span class="footer__sw">sw</span><span class="footer__apps">apps</span></a>
        </div>
      </div>
    </div>
  </div>
</footer>
