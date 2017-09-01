<div class="header__swbi header__centered">
  <?php $phone = sw_get_phone(); ?>
  <?php if ($phone): ?>
  <div class="phone">
    <?php echo get_logo(); ?>
    <?php echo get_phones(); ?>
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
  <div class="flex-md">
    <?php echo get_phones_responsive(); ?>
    <div class="socialmedia visible-lg">
      <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
    </div>
    <!-- Trigger the modal with a button -->
    <?php $accounts = get_social_accounts(); ?>
    <?php if (isset($accounts) && ( $accounts != '' )): ?>
      <?php if (isset($accounts['twitter']) or isset($accounts['facebook']) or isset($accounts['linkedin']) or isset($accounts['instagram']) or isset($accounts['vimeo']) or isset($accounts['youtube'])): ?>
        <button type="button" class="hidden-lg button-social" data-toggle="modal" data-target="#modal-social">
          <i class="fa fa-share-alt" aria-hidden="true"></i>
        </button>
      <?php endif ?>
    <?php endif; ?>
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