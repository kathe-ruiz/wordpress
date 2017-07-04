<?php function get_navbar_login() {
  $html = '';
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
  if (is_plugin_active('ultimate-member/index.php') && function_exists('um_get_option')):
    $um_user_page = get_option('um_core_pages')['user'];

    $page_id = get_the_ID();
    ob_start(); ?>
    <li class="menu-item menu-item-users">
    <?php if (!is_user_logged_in()): ?>
      <?php if ($page_id != $um_user_page): ?>
        <a data-toggle="modal" data-target="#modal-login" title="<?php _e('Sign in'); ?>">
      <?php else: ?>
        <a href="<?php echo get_permalink( um_get_option('core_login') ); ?>" title="<?php _e('Sign in', 'swapps'); ?>">
      <?php endif; ?>
        <?php _e('Sign in', 'swapps'); ?>
      </a>
    <?php else: ?>
      <a title="<?php _e('Log out'); ?>" href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" aria-expanded="false"><?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?> <span class="caret"></span></a>
      <ul role="menu" class="dropdown-menu">
        <li class="menu-item">
          <a href="<?php echo get_permalink( um_get_option('core_account') ); ?>" title="mi cuenta">
            <?php _e('Mi cuenta'); ?>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo get_permalink( um_get_option('core_user') ); ?>" title="perfil">
            <?php _e('Perfil'); ?>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo get_permalink( um_get_option('core_logout') ); ?>" title="<?php _e('Log out'); ?>">
            <?php _e('Log out'); ?>
          </a>
        </li>
      </ul>
    <?php endif; ?>
    </li>
    <?php
    $html = ob_get_contents();
    ob_end_clean();
  endif;
  return $html;
} ?>