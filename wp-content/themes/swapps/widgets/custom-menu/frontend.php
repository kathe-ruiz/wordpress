<div class="header__swbi">
  <?php $phone = sw_get_phone(); ?>
  <?php if ($phone): ?>
  <div class="phone">
    <a class="phone__link btn btn-sm btn-primary-outline-withoutborder" href="tel:<?php echo $phone; ?>">
      <i class="phone__icon fa fa-phone" aria-hidden="true"></i>
      <span class="phone__text text-secondary" href="#"><?php echo $phone; ?></span>
    </a>
  </div>
  <?php endif ?>
  <?php
    wp_nav_menu( array(
      'menu'              => 'primary_navigation',
      'theme_location'    => 'primary_navigation',
      'depth'             => 0,
      'container'         => 'div',
      'container_class'   => 'navbar__menu collapse navbar-collapse text-uppercase',
      'container_id'      => 'myNav',
      'menu_class'        => 'nav navbar-nav',
      // 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'fallback_cb'       => 'swapps_default_menu',
      'walker'            => new wp_bootstrap_navwalker())
    );
  ?>
  <div>
    <div class="socialmedia visible-lg">
      <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
    </div>
    <div class="navbar-header navbar__toggle">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
  </div>
</div>
<div class="header__sec visible-xs visible-sm">
  <?php
    wp_nav_menu( array(
      'menu'              => 'primary_navigation',
      'theme_location'    => 'primary_navigation',
      'depth'             => 0,
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