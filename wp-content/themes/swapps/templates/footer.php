<footer class="footer navbar-inverse">
  <div class="container-fluid">
    <div class="row row-centered">
      <div class="col-md-9 col-sm-8">
        <div class="row row-centered">
          <div class="col-sm-2">
            <div class="footer__logo">
              <?php if (function_exists('get_custom_footer_logo') && get_theme_mod( 'custom_footer_logo' )): ?>
                <?php echo get_custom_footer_logo(); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-responsive center-block footer__logo__img">
              <?php endif ?>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="footer__info">
              <span>
                <i class="footer__icon fa footer__icon--3x fa-map-marker" aria-hidden="true"></i> 
                <span class="footer__text footer__text--light text-secondary">Carrera 100 # 5 - 169,<br>Cali, Colombia</span>
              </span>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="footer__info">
              <a class="footer__link" href="">
                <i class="footer__icon fa footer__icon--2x fa-envelope" aria-hidden="true"></i>
                <span class="footer__text text-secondary" href="#">info@misitioweb.com</span>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-sm-1">
            <button class="footer__btn navbar__btn btn btn-primary-outline btn-sm"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone">+57 (350) 316-8388</span></button>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
        <div class="row">
          <!-- <div class="socialmedia footer__socialmedia col-sm-8 col-sm-push-4 col-md-6 col-md-push-6"> -->
          <div class="socialmedia footer__socialmedia col-xs-12">
            <div class="socialmedia_block nav navbar-nav navbar-right">
              <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </div>
          </div>
          <div class="footer__copyright col-sm-12 text-right">
            <span class="text-secondary">&copy; 2017 misitioweb.</span>
            <span class="text-secondary">Todos los derechos reservados</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <a class="brand-link text-secondary" href="//www.swapps.io" title="Powered by Swapps - Django Developers - Web/Mobile Developers" target="_blank">Powered by Swapps</a>
    </div>
  </div>
</footer>