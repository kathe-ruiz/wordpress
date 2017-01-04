<header class="header">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header navbar_toggle">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar__logo navbar-left">                    
        <a href="/" rel="nofollow">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="img-responsive">
        </a>
      </div>
      <div class="navbar_metalsocial nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Vimeo</a></li>
      </div>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
      <?php
        wp_nav_menu( array(
          'menu'              => 'primary',
          'theme_location'    => 'primary',
          'depth'             => 4,
          'container'         => 'div',
          'container_class'   => 'navbar_menu collapse navbar-collapse navbar-right',
          'container_id'      => 'myNavbar',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>
  </nav>
</header>