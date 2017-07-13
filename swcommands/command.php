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

# https://stackoverflow.com/questions/2934563/how-to-decode-unicode-escape-sequences-like-u00ed-to-proper-utf-8-encoded-cha
function fix_ascii($str){
	$str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) { return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE'); }, $str);
	return $str;
}

$update_swoptions = function($args) {
	/* updates the sw_theme_options with the given json */
	$current_options = get_option('sw_theme_options');
	if (!$current_options) {
		$current_options = array();
	}
	$json = (array)json_decode(fix_ascii($args[0]));
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
	$json = (array)json_decode(fix_ascii($args[1]));
	if (get_post_type($post_id) == "slider" && have_rows('slide', $post_id)) {
		update_row( "slide", 1, $json, $post_id );
	}

};

WP_CLI::add_command( 'update-swoptions', $update_swoptions );
WP_CLI::add_command( 'add_logos', $add_logos );
WP_CLI::add_command( 'update-slide', $update_slider );
