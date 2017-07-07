<header id="#top" class="amp-wp-header <?php echo get_css_classes(); ?>">
  <div>
    <a href="/" rel="nofollow">
    <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      $custom_logo = $image[0];
    ?>
    <amp-img class="custom-logo" src="<?php echo $custom_logo; ?>" alt="Logo" width="185" height="35"/>
    <?php else: ?>
      <div class="logo-name"><strong><?php echo get_bloginfo( 'name' ) ?></strong></div>
    <?php endif ?>
    </a>
    <button type="button" id="button-menu" on="tap:sidebar.toggle"
    class="ampstart-btn caps m2 navbar-toggle">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <?php if (function_exists('sw_options')): ?>
      <?php $phone = sw_get_phone(); ?>
      <?php if ($phone): ?>
        <a href="tel:<?php echo $phone; ?>" class="link_phone">
          <button class="phone"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 348.077 348.077" xml:space="preserve">
          <g>
            <path d="M340.273,275.083l-53.755-53.761c-10.707-10.664-28.438-10.34-39.518,0.744l-27.082,27.076     c-1.711-0.943-3.482-1.928-5.344-2.973c-17.102-9.476-40.509-22.464-65.14-47.113c-24.704-24.701-37.704-48.144-47.209-65.257     c-1.003-1.813-1.964-3.561-2.913-5.221l18.176-18.149l8.936-8.947c11.097-11.1,11.403-28.826,0.721-39.521L73.39,8.194     C62.708-2.486,44.969-2.162,33.872,8.938l-15.15,15.237l0.414,0.411c-5.08,6.482-9.325,13.958-12.484,22.02     C3.74,54.28,1.927,61.603,1.098,68.941C-6,127.785,20.89,181.564,93.866,254.541c100.875,100.868,182.167,93.248,185.674,92.876     c7.638-0.913,14.958-2.738,22.397-5.627c7.992-3.122,15.463-7.361,21.941-12.43l0.331,0.294l15.348-15.029     C350.631,303.527,350.95,285.795,340.273,275.083z" fill="#002d71"/>
          </g>
          </svg>
          </button>
        </a>
      <?php endif ?>
    <?php endif ?>
  </div>
</header>
<amp-sidebar id="sidebar"
  layout="nodisplay"
  side="right">
  <amp-img class="amp-close-image"
    src="<?php echo get_template_directory_uri(); ?>/dist/images/ic_close_black_18dp_2x.png"
    width="20"
    height="20"
    alt="close sidebar"
    on="tap:sidebar.close"
    role="button"
    tabindex="0"></amp-img>
    <amp-accordion id="accordion">
      <section expanded>
        <h4>
          <button type="button" on="tap:sidebar.toggle"
                class="ampstart-btn caps m2 navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </h4>
        <?php
          wp_nav_menu( array(
            'menu'              => 'primary_navigation',
            'theme_location'    => 'primary_navigation',
            'depth'             => 0,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbar-amp',
            'menu_class'        => 'nav navbar-nav',
            'walker'            => new wp_amp_navwalker())
          );
        ?>
      </section>
    </amp-accordion>
</amp-sidebar>