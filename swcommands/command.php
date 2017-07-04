<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * Says "Hello World" to new users
 *
 * @when before_wp_load
 */
$update_swoptions = function($args) {
	include_once('wp-config.php');
	$current_options = get_option('sw_theme_options');
	$json = (array)json_decode($args[0]);
	$result = array_merge($current_options, $json);
	update_option('sw_theme_options', $result);
	$current_options = get_option('sw_theme_options');
	WP_CLI::success("sw_theme_options updated");
};
WP_CLI::add_command( 'update-swoptions', $update_swoptions );
