<?php
/**
 * Provides a default menu featuring some hardcoded links, if not other menu has been provided.
 *
 * @package     Swapps
 * @subpackage  inc
 * @version     1.0.0
 * @since       1.0.0
 */
function swapps_default_menu($args) {
  extract( $args );
  $html = null;
  if ( $container ) {
    $html = '<' . $container;
    if ( $container_id )
      $html .= ' id="' . $container_id . '"';
    if ( $container_class )
      $html .= ' class="' . $container_class . '"';
    $html .= '>';
  }
  $html .= '<ul';
  if ( $menu_id )
    $html .= ' id="' . $menu_id . '"';
  if ( $menu_class )
    $html .= ' class="' . $menu_class . '"';
  $html .= '>';
  
  $html .= '</ul>';
  if ( $container )
    $html .= '</' . $container . '>';
  echo $html;
} // end swapps_default_menu