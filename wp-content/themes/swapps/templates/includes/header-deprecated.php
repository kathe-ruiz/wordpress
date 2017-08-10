<?php if (function_exists('sw_options')): ?>
  <?php $navbar_class = (sw_options('site_options_header_color')) ? : 'navbar--transparent' ; ?>
  <?php if ($navbar_class != 'navbar--transparent'): ?>
    <?php $default_opacity = ($navbar_class == 'navbar--light') ? '0.9' : '0.85' ?>
    <?php $opacity = ( sw_options('site_options_header_opacity') &&
                       (int)sw_options('site_options_header_opacity') >= 0 &&
                       (int)sw_options('site_options_header_opacity') <= 100) ? ((int)sw_options('site_options_header_opacity') / 100) : $default_opacity ; ?>
  <?php endif; ?>
<?php endif; ?>
<header class="header">
  <nav id="autocollapse" class="autocollapse-class navbar  <?php echo $navbar_class ?>
  <?php if (function_exists('sw_options') && sw_options('site_options_secondary_navbar_position')): ?>
  <?php echo sw_options('site_options_secondary_navbar_position') ?><?php endif ?>"
  <?php if ( isset($opacity) && $opacity ): ?>
  style="background: rgba(<?php echo $base_color = ($navbar_class == 'navbar--light') ? '255,255,255' : '0,0,0' ?>, <?php echo $opacity ?>);"
  <?php endif ?>>
    <div class="container-fluid row-lg-centered">
      <div class="navbar-header navbar__toggle">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar__logo navbar-left">
        <?php $header_link = (function_exists('sw_options') && sw_options('logo_link')) ? sw_options('logo_link') : '/' ?>
        <a href="<?php echo $header_link; ?>" rel="nofollow">
        <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          $custom_logo = $image[0];
        ?>
        <img class="custom-logo" src="<?php echo $custom_logo; ?>" alt="Logo"/>
        <?php else: ?>
          <div class="logo-name"><strong><?php echo get_bloginfo( 'name' ) ?></strong></div>
        <?php endif ?>
        </a>
      </div>
      <div class="wrapper row-lg-centered flex-align-right">
        <div class="navbar__socialmedia socialmedia">
          <?php include 'socialmedia.php' ?>
        </div>
        <?php $phone = sw_get_phone(); ?>
        <?php if ($phone): ?>
          <a href="tel:<?php echo $phone; ?>" class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo $phone; ?></span></a>
        <?php endif ?>
        <?php $secondary_phone = sw_get_phone('secondary'); ?>
        <?php if (function_exists('sw_options')): ?>
          <?php if ($secondary_phone): ?>
            <a href="tel:<?php echo $secondary_phone; ?>" class="navbar__btn navbar__btn--compact btn btn-primary-outline btn-sm navbar-right"><i class="fa fa-phone" aria-hidden="true"></i> <span class="navbar__phone"><?php echo $secondary_phone; ?></span></a>
          <?php endif ?>
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
            'depth'             => 0,
            'container'         => 'div',
            'container_class'   => 'navbar__menu collapse navbar-collapse navbar-right text-uppercase',
            'container_id'      => 'myNavbar',
            'menu_class'        => 'sw-nav nav navbar-nav',
            // 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'fallback_cb'       => 'swapps_default_menu',
            'walker'            => new wp_bootstrap_navwalker())
          );
        ?>
        <?php endif ?>
      </div>
    </div>
  </nav>
  <?php
    $default_after = 'brand-primary';
    $color_after = (function_exists('sw_options') && sw_options('site_options_after_header_color')) ? sw_options('site_options_after_header_color') : $default_after ;
    $default_background = 'light';
    $background_header = (function_exists('sw_options') && sw_options('site_options_after_header_background_color')) ? sw_options('site_options_after_header_background_color') : $default_background ;
    ?>
  <?php if ( is_active_sidebar( 'sidebar-after-header' ) ) : ?>
    <div id="after-header" class="widget-area after-header after-color-<?php echo $color_after;?> <?php if(sw_options('site_options_secondary_navbar_position')): ?><?php echo "fx"; ?><?php endif ?> background-<?php echo $background_header;?>">
      <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_after_header_image' )):
      $custom_logo_id = get_theme_mod( 'custom_after_header_image' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      $custom_logo = $image[0];?>
        <div style="background:url(<?php echo $custom_logo; ?>);" class="after-header__background">
        </div>
      <?php endif;?>
      <?php dynamic_sidebar( 'sidebar-after-header' );
      ?>
    </div>
  <?php endif ?>
</header>
