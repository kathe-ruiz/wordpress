<?php
/**
 * Woocommerce compatibility
 *
 * @package Swapps
 */

//Check if Woocommerce is active  
function swapps_woocommerce_active() {
  if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

if ( !swapps_woocommerce_active() )
  return;

/**
 * Declare support
 */
add_action( 'after_setup_theme', 'swapps_woocommerce_support' );
function swapps_woocommerce_support() {
}

/**
 * Remove default WooCommerce CSS
 */
function swapps_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] ); 
  return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'swapps_dequeue_styles' );

/**
 * Add custom CSS for Woocommerce
*/
?>