<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

//Start Register Custom Navigation
require_once('wp_bootstrap_navwalker.php');
require_once('swapps_default_menu.php');
require_once('breadcrumb.php');

register_nav_menus( array(
    'primary' => __( 'Theme Menu', 'wordpress' ),
) );
//End Register Custom Navigator

require_once('wp_theme_pages_setup.php');


// Header image. Should be moved to plugin, check later. (Phase 3)
// require get_template_directory() . '/includes/custom-header.php';

// For set sliders in the homepage
// if( function_exists('acf_add_local_field_group') ):

// acf_add_local_field_group(array (
//   'key' => 'group_5851bd3e01760',
//   'title' => __('Sliders'),
//   'fields' => array (
//     array (
//       'key' => 'field_5851bd5593b57',
//       'label' => __('Main Slider'),
//       'name' => 'slider_1',
//       'type' => 'post_object',
//       'instructions' => '',
//       'required' => 0,
//       'conditional_logic' => 0,
//       'wrapper' => array (
//         'width' => '',
//         'class' => '',
//         'id' => '',
//       ),
//       'post_type' => array (
//         0 => 'slider',
//       ),
//       'taxonomy' => array (
//       ),
//       'allow_null' => 1,
//       'multiple' => 0,
//       'return_format' => 'object',
//       'ui' => 1,
//     ),
//     array (
//       'key' => 'field_5852a09dd26e4',
//       'label' => __('Bottom slider'),
//       'name' => 'slider_3',
//       'type' => 'post_object',
//       'instructions' => '',
//       'required' => 0,
//       'conditional_logic' => 0,
//       'wrapper' => array (
//         'width' => '',
//         'class' => '',
//         'id' => '',
//       ),
//       'post_type' => array (
//         0 => 'slider',
//       ),
//       'taxonomy' => array (
//       ),
//       'allow_null' => 1,
//       'multiple' => 0,
//       'return_format' => 'object',
//       'ui' => 1,
//     ),
//   ),
//   'location' => array (
//     array (
//       array (
//         'param' => 'page_template',
//         'operator' => '==',
//         'value' => 'template-home.php',
//       ),
//     ),
//   ),
//   'menu_order' => 0,
//   'position' => 'normal',
//   'style' => 'default',
//   'label_placement' => 'top',
//   'instruction_placement' => 'label',
//   'hide_on_screen' => '',
//   'active' => 1,
//   'description' => '',
// ));

// endif;
