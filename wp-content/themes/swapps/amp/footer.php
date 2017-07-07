<footer class="amp-wp-footer <?php if (function_exists('sw_options') && sw_options('site_options_footer_color')): ?><?php echo sw_options('site_options_footer_color') ?><?php else: ?>navbar--light<?php endif?>">
  <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    <div class="footer__sidebar">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
  <?php endif; ?>
  <div>
    <a href="#top" class="back-to-top">Back to top</a>
  </div>
</footer>
<div class="after-footer dark">
  <div class="after-footer__flex">
    <span class="text-secondary">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ) ?>.</span>
    <span class="text-secondary"><?php _e('All rights reserved') ?></span>
    <a class="footer__brand" href="//www.swapps.io" title="Powered by Swapps - Django Developers - Web/Mobile Developers" target="_blank">
      Powered by 
      <amp-img src="<?php echo get_template_directory_uri(); ?>/assets/images/powered-by-swapps.png" alt="powered by swapps" class="footer__brand-img" width="29" height="28"></amp-img>
      <span class="footer__sw">sw</span><span class="footer__apps">apps</span>
    </a>
  </div>
</div>