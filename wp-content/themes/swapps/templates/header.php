<header class="header<?php if(!sw_options('site_options_secondary_navbar_position')): ?><?php echo " not-fixed"; ?><?php endif ?>">
  <nav id="autocollapse" class="navbar
  <?php if (function_exists('sw_options') && sw_options('site_options_header_color')): ?>
  <?php echo sw_options('site_options_header_color') ?>
  <?php else: ?>
  navbar--transparent
  <?php endif ?>
  <?php if (function_exists('sw_options') && sw_options('site_options_secondary_navbar_position')): ?>
  <?php echo sw_options('site_options_secondary_navbar_position') ?><?php endif ?>">
    <div class="container-fluid row-lg-centered">
      <div class="navbar-header navbar__toggle">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar__logo navbar-left">
        <a href="/" rel="nofollow">
        <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          $custom_logo = $image[0];
        ?>
        <img class="custom-logo" src="<?php echo $custom_logo; ?>" />
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" class="img-responsive">
        <?php endif ?>
        </a>
      </div>
      <div class="wrapper row-lg-centered flex-align-right">
        <div class="navbar__socialmedia socialmedia">
          <?php include 'includes/socialmedia.php' ?>
        </div>
        <?php if (function_exists('sw_options') && sw_options('phone')): ?>
          <a href="tel:<?php echo sw_options('phone'); ?>" class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo sw_options('phone'); ?></span></a>
        <?php endif ?>
        <?php //if ($rows = primary_landing_menu()):?>
        <?php if (function_exists('get_field')): ?>
        <?php $landing_option = get_field('field_landing_option'); ?>
        <?php $rows = get_field('field_rows');?>
        <?php else: ?>
        <?php $landing_option = False ?>
        <?php endif ?>
        <?php if ($landing_option == 'Main Navbar'): ?>
          <div class="navbar__menu collapse navbar-collapse" id="myNavbar">
            <ul id="menu-menu-secundario" class="nav navbar-nav pull-right">
              <?php foreach ($rows as $key => $value): ?>
                <?php if ($value['section_name']) : ?>
                  <?php $string_menu = slugify($value['section_name']); ?>
                  <li id="menu-item-<?php echo "$key"; ?>" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-<?php echo "$key"; ?> current_page_item menu-item-<?php echo "$key"; ?>">
                    <a title="<?php echo ($value['section_name']); ?>" href="<?php echo get_permalink() ?>#<?php if (($value['section_name'])): echo ($string_menu); else: echo "menu-$key"; endif ?>"><?php echo ($value['section_name']); ?></a>
                  </li>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
          </div>
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
