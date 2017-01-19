<header class="header">
  <nav class="navbar <?php echo wpaasp_options('site_options_header_color') ?>">
    <div class="container-fluid">
      <div class="navbar-header navbar__toggle">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar__logo navbar-left">
        <a href="/" rel="nofollow">
        <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )): ?>
          <?php echo get_custom_logo(); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-responsive">
        <?php endif ?>
        </a>
      </div>
      <div class="navbar__socialmedia socialmedia">
        <div class="socialmedia__block nav navbar-nav navbar-right">
          <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li class="socialmedia__item"><a href="#" class="socialmedia__link"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
        </div>
      </div>
      <?php if (function_exists('wpaasp_options') && wpaasp_options('phone')): ?>
        <button class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo wpaasp_options('phone'); ?></span></button>
      <?php else: ?>
        <button class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone">+57 (350) 316-8388</span></button>
      <?php endif ?>
      <?php
      // if (has_nav_menu('primary_navigation')) :
      //   wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      // endif;
      ?>
      <?php
        wp_nav_menu( array(
          'menu'              => 'primary',
          'theme_location'    => 'primary',
          'depth'             => 4,
          'container'         => 'div',
          'container_class'   => 'navbar__menu collapse navbar-collapse navbar-right text-uppercase',
          'container_id'      => 'myNavbar',
          'menu_class'        => 'nav navbar-nav',
          // 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'fallback_cb'       => 'swapps_default_menu',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>
  </nav>
</header>
