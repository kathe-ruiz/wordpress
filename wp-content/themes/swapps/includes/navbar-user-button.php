<?php function get_navbar_login() {
  $html = '';
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
  if (is_plugin_active('ultimate-member/index.php') && function_exists('um_get_option')):
    ob_start(); ?>
    <li class="menu-item menu-item-users">
    <?php if (!is_user_logged_in()): ?>
      <a data-toggle="modal" data-target="#modal-login" title="<?php _e('Sign in'); ?>">
        <?php _e('Sign in'); ?>
      </a>
    <?php else: ?>
      <a href="<?php echo get_permalink( um_get_option('core_logout') ); ?>" title="<?php _e('Log out'); ?>">
        <?php _e('Log out'); ?>
      </a>
    <?php endif; ?>
    </li>
    <?php
    $html = ob_get_contents();
    ob_end_clean();
  endif;
  return $html;
} ?>