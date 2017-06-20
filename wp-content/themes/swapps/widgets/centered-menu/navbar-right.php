<div class="header__right">
  <div class="logo">
    <?php $header_link = (function_exists('sw_options') && sw_options('logo_link')) ? sw_options('logo_link') : '/' ?>
    <a href="<?php echo $header_link; ?>" rel="nofollow" class="logo__link">
    <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      $custom_logo = $image[0];
    ?>
    <img class="logo__img" src="<?php echo $custom_logo; ?>" alt="Logo"/>
    <?php else: ?>
    <div class="logo__name"><strong><?php echo get_bloginfo( 'name' ) ?></strong></div>
    <?php endif ?>
    </a>
    <div class="navbar-header navbar__toggle">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
  </div>
  <div class="menu side-right">
    <div class="menu__information">
      <div class="menu__phones phone">
        <?php echo get_phones(); ?>
      </div>
      <div class="menu__socialmedia socialmedia">
        <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
      </div>
    </div>
    <div class="menu__navbar">
      <?php
        wp_nav_menu( array(
          'menu'              => 'primary_navigation',
          'theme_location'    => 'primary_navigation',
          'depth'             => 0,
          'container'         => 'div',
          'container_class'   => 'menu__nav collapse navbar-collapse text-uppercase',
          'container_id'      => 'myNav',
          'menu_class'        => 'nav navbar-nav',
          // 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'fallback_cb'       => 'swapps_default_menu',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>
  </div>
</div>