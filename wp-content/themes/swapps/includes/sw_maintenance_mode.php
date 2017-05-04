<?php 
// Activate WordPress Maintenance Mode
function wp_suspended_mode(){
  if ( defined( 'SUSPENDED' ) && SUSPENDED ){
    if (preg_match("/login|admin|dashboard|account/i",$_SERVER['REQUEST_URI']) > 0 ){
        return false;
    }
    if ( is_user_logged_in() && current_user_can( 'edit_themes' ) ){
        return false;
    }
    $sw_suspended_file = '';

    header('HTTP/1.1 503 Service Temporarily Unavailable');
    header('Status: 503 Service Temporarily Unavailable');
    header('Retry-After: 86400'); // retry in a day
    $sw_suspended_file = get_template_directory()."/suspended.php";
    if( file_exists($sw_suspended_file) ){
      include_once( $sw_suspended_file );
      exit();
    }

    // switch (SUSPENDED) {
    //   case 'MAINTENANCE':
    //     // Set headers
    //     header('HTTP/1.1 503 Service Temporarily Unavailable');
    //     header('Status: 503 Service Temporarily Unavailable');
    //     header('Retry-After: 86400'); // retry in a day
    //     $sw_suspended_file = WP_CONTENT_DIR."/suspended.php";
    //     if( file_exists($sw_suspended_file) ){
    //       include_once( $sw_suspended_file );
    //       exit();
    //     }
    //     break;
    //   case 'DEVELOPMENT':
    //     // Prevetn Plugins from caching
    //     // Disable caching plugins. This should take care of:
    //     //   - W3 Total Cache
    //     //   - WP Super Cache
    //     //   - ZenCache (Previously QuickCache)
    //     if(!defined('DONOTCACHEPAGE')) {
    //       define('DONOTCACHEPAGE', true);
    //     }
    //     if(!defined('DONOTCDN')) {
    //       define('DONOTCDN', true);
    //     }
    //     if(!defined('DONOTCACHEDB')) {
    //       define('DONOTCACHEDB', true);
    //     }
    //     if(!defined('DONOTMINIFY')) {
    //       define('DONOTMINIFY', true);
    //     }
    //     if(!defined('DONOTCACHEOBJECT')) {
    //       define('DONOTCACHEOBJECT', true);
    //     }
    //     header('Cache-Control: max-age=0; private');

    //     $sw_suspended_file = WP_CONTENT_DIR."/coming_soon.php";
    //     if( file_exists($sw_suspended_file) ){
    //       include_once( $sw_suspended_file );
    //       exit();
    //     }
    //     break;
    //   default:
    //     break;
    // }
  }
  else{
    return false;
  }
}
add_action( 'template_redirect', 'wp_suspended_mode');
