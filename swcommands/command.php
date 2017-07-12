<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * Says "Hello World" to new users
 *
 * @when before_wp_load
 */
# https://wordpress.stackexchange.com/questions/107346/download-an-image-from-a-webpage-to-the-default-uploads-folder
function uploadRemoteImageAndAttach($image_url){
    $image = $image_url;
    $get = wp_remote_get( $image );
    $type = wp_remote_retrieve_header( $get, 'content-type' );
    if (!$type)
        return false;
    $mirror = wp_upload_bits( basename( $image ), '', wp_remote_retrieve_body( $get ) );
    $attachment = array(
        'post_title'=> basename( $image ),
        'post_mime_type' => $type
    );
    $attach_id = wp_insert_attachment( $attachment, $mirror['file']);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $mirror['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;
}

$update_swoptions = function($args) {
	/* updates the sw_theme_options with the given json */
	include_once('wp-config.php');
	$current_options = get_option('sw_theme_options');
	if (!$current_options) {
		$current_options = array();
	}
	$json = (array)json_decode($args[0]);
	$result = array_merge($current_options, $json);
	update_option('sw_theme_options', $result);
	$current_options = get_option('sw_theme_options');
	WP_CLI::success("sw_theme_options updated");
};
$add_logos = function($args){
	/* sets the main and the footer logo as the image given in the url */
	$url = $args[0];
	$attach_id = uploadRemoteImageAndAttach($url);
	if ($attach_id) {
		set_theme_mod('custom_logo', $attach_id);
		set_theme_mod('custom_footer_logo', $attach_id);
		update_option('site_icon', $attach_id);
	}

};

$update_slider = function($args){
	/* gets an slider and updates its first slide */
	$post_id = $args[0];
	$json = (array)json_decode($args[1]);
	if (get_post_type($post_id) == "slider" && have_rows('slide', $post_id)) {
		update_row( "slide", 1, $json, $post_id );
	}

};

WP_CLI::add_command( 'update-swoptions', $update_swoptions );
WP_CLI::add_command( 'add_logos', $add_logos );
WP_CLI::add_command( 'update-slide', $update_slider );
