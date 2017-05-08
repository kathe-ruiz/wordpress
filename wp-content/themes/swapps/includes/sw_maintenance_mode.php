<?php 
// Activate WordPress Maintenance Mode
function wp_suspended_mode(){
  if ( defined( 'SITE_STATUS' ) && SITE_STATUS ){
    if (preg_match("/login|admin|dashboard|account/i",$_SERVER['REQUEST_URI']) > 0 ){
        return false;
    }
    if ( is_user_logged_in() && current_user_can( 'edit_themes' ) ){
        return false;
    }
    $sw_site_status_file = '';

    $variables = array(
      'maintenance' => array(
        '{{title}}' => 'Maintenance Mode',
        '{{description}}' => 'We are currently performing some quick updates. This site will be back soon.',
        '{{logo}}' => 'wp-content/themes/swapps/assets/images/swapps/logo-swapps-vertical.png',
        '{{background}}' => '/wp-content/themes/swapps/assets/images/maintenance.jpeg',
      ),
      'development' => array(
        '{{title}}' => 'Coming Soon Page',
        '{{description}}' => 'Get ready! Something really cool is coming!',
        '{{logo}}' => 'wp-content/themes/swapps/assets/images/swapps/logo-swapps-vertical.png',
        '{{background}}' => 'wp-content/themes/swapps/assets/images/swapps/Business-card-Swapps.jpg',
      ),
      'suspended' => array(
        '{{title}}' => 'Suspended Mode',
        '{{description}}' => 'We are currently performing some quick updates. This site will be back soon.',
        '{{logo}}' => 'wp-content/themes/swapps/assets/images/swapps/logo-swapps-vertical.png',
        '{{background}}' => '/wp-content/themes/swapps/assets/images/maintenance.jpeg',
      )
    );

    $sw_site_status_file = file_get_contents(get_template_directory()."/site-status.php");

    switch (SITE_STATUS) {
      case 'MAINTENANCE':
        // Set headers
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header('Retry-After: 86400'); // retry in a day

        echo strtr($sw_site_status_file, $variables['maintenance']);
        exit();
        break;

      case 'DEVELOPMENT':
        // Prevetn Plugins from caching
        // Disable caching plugins. This should take care of:
        //   - W3 Total Cache
        //   - WP Super Cache
        //   - ZenCache (Previously QuickCache)
        if(!defined('DONOTCACHEPAGE')) {
          define('DONOTCACHEPAGE', true);
        }
        if(!defined('DONOTCDN')) {
          define('DONOTCDN', true);
        }
        if(!defined('DONOTCACHEDB')) {
          define('DONOTCACHEDB', true);
        }
        if(!defined('DONOTMINIFY')) {
          define('DONOTMINIFY', true);
        }
        if(!defined('DONOTCACHEOBJECT')) {
          define('DONOTCACHEOBJECT', true);
        }
        header('Cache-Control: max-age=0; private');

        echo strtr($sw_site_status_file, $variables['development']);
        exit();
        break;

      case 'SUSPENDED':
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header('Retry-After: 86400'); // retry in a day
        
        echo strtr($sw_site_status_file, $variables['suspended']);
        exit();
        break;

      default:
        break;
    }

  }
  else{
    return false;
  }
}
add_action( 'template_redirect', 'wp_suspended_mode');
