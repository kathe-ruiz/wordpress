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
    add_theme_support( 'woocommerce' );
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
/*function swapps_woocommerce_css() {
    wp_enqueue_style( 'swapps-wc-css', get_template_directory_uri() . '/woocommerce/css/wc.min.css' );
}*/
add_action( 'wp_enqueue_scripts', 'swapps_woocommerce_css', 9 );

function swapps_woo_actions() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_action('woocommerce_before_main_content', 'theshop_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'theshop_wrapper_end', 10);
}
add_action('wp','swapps_woo_actions');
