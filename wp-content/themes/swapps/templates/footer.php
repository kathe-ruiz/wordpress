<footer class="footer <?php if (function_exists('sw_options') && sw_options('site_options_footer_color')): ?><?php echo sw_options('site_options_footer_color') ?><?php else: ?>navbar--light<?php endif?>">
  <div class="container-fluid">
    <div class="row row-md-centered">
          <div class="footer__logo">
            <?php if (function_exists('get_custom_footer_logo') && get_theme_mod( 'custom_footer_logo' )): ?>
              <?php echo get_custom_footer_logo(); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" class="img-responsive center-block footer__logo__img">
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
            <a class="" href="mailto:<?php echo sw_options('email'); ?>">
              <i class="footer__icon fa footer__icon--2x fa-envelope" aria-hidden="true"></i>
              <span class="footer__text text-secondary" href="#">
                <?php echo sw_options('email'); ?>
              </span>
            </a>
          <?php endif ?>
          </div>
          <?php if (function_exists('sw_options') && sw_options('phone')): ?>
          <div class="footer__phone">
              <a href="tel:<?php echo sw_options('phone'); ?>" class="footer__btn navbar__btn btn btn-primary-outline btn-sm"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo sw_options('phone'); ?></span></a>
          </div>
          <?php endif ?>
          <div class="footer__right">
            <div class="socialmedia footer__socialmedia">
              <?php include 'includes/socialmedia.php' ?>
            </div>
            <div class="footer__copyright text-right">
              <span class="text-secondary">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ) ?>.</span>
              <span class="text-secondary">Todos los derechos reservados</span>
            </div>
          </div>
          
    </div>
    <div class="row text-center">
      <a class="brand-link text-secondary" href="//www.swapps.io" title="Powered by Swapps - Django Developers - Web/Mobile Developers" target="_blank">Powered by Swapps</a>
    </div>
  </div>
</footer>
