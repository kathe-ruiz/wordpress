<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <?php $body_header_class = (!is_front_page()) ? 'has-header' : '' ; ?>
  <body <?php body_class($body_header_class); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="document">
    <?php if (!is_front_page()): get_template_part('templates/page', 'header'); endif; ?>
    <div class="wrap container<?php if (!Setup\display_sidebar() ) :  echo '-fluid'; endif; ?><?php if(!sw_options('site_options_secondary_navbar_position')): ?><?php echo " not-fixed"; ?><?php endif ?>" role="document">
      <div class="content row">
        <main class="main <?php if (Setup\display_sidebar()): echo 'col-sm-8'; endif; ?>">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar <?php if (!is_front_page()): echo 'col-sm-4'; endif; ?>">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    </div>
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    <script type="text/javascript" id="cookieinfo"
      src="//cookieinfoscript.com/js/cookieinfo.min.js" data-message="<?php _e('We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.') ?>"
      <?php if (get_locale() == "es_ES"): ?>
        data-moreinfo="https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)"
      <?php endif ?>
      >
    </script>
  </body>
</html>
