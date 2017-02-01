<header class="header">
  <nav id="autocollapse" class="navbar
  <?php if (function_exists('wpaasp_options') && wpaasp_options('site_options_header_color')): ?>
  <?php echo wpaasp_options('site_options_header_color') ?>
  <?php else: ?>
  navbar--transparent
  <?php endif ?>
  <?php if (function_exists('wpaasp_options') && wpaasp_options('site_options_secondary_navbar_position')): ?>
  <?php echo wpaasp_options('site_options_secondary_navbar_position') ?>
  <?php endif ?>">
    <div class="container-fluid row-lg-centered">
      <?php if (has_nav_menu( 'primary_navigation' )): ?>
        <div class="navbar-header navbar__toggle">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      <?php endif ?>
      <div class="navbar__logo navbar-left">
        <a href="/" rel="nofollow">
        <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          $custom_logo = $image[0];
        ?>
        <img class="custom-logo" src="<?php echo $custom_logo; ?>" />
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-responsive">
        <?php endif ?>
        </a>
      </div>
      <div class="wrapper row-lg-centered flex-align-right">
        <div class="navbar__socialmedia socialmedia">
          <?php include 'includes/socialmedia.php' ?>
        </div>
        <?php if (function_exists('wpaasp_options') && wpaasp_options('phone')): ?>
          <a href="tel:<?php echo wpaasp_options('phone'); ?>" class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo wpaasp_options('phone'); ?></span></a>
        <?php endif ?>
        <?php if ($rows = primary_landing_menu()): ?>
          <ul id="menu-menu-secundario" class="nav navbar-nav pull-right">
            <?php foreach ($rows as $key => $value): ?>
              <li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-59 current_page_item menu-item-88">
                <a title="home-2" href="<?php echo get_permalink() ?>#<?php echo "menu-$key"; ?>">
                <?php echo "menu-$key"; ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        <?php else: ?>
        <?php
          wp_nav_menu( array(
            'menu'              => 'primary_navigation',
            'theme_location'    => 'primary_navigation',
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
        <?php endif ?>
      </div>
    </div>
  </nav>
</header>


