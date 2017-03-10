<?php
// Source: https://clicknathan.com/web-design/automatically-create-pages-wordpress/
// programmatically create some basic pages, and then set Home and Blog

// Create a page with given title, slug, content, and template and return its ID, 
// or the ID of the page with the given title if it exists.
// function create_page_if_null($title, $slug='', $content='', $template=''){
//   $id = -1;
//   $page_check = get_page_by_title($title);
//   $page = array(
//     'post_type' => 'page',
//     'post_title' => $title,
//     'post_content' => $content,
//     'post_status' => 'publish',
//     'post_author' => 1,
//     'post_slug' => $slug
//   );
//   if(!isset($page_check->ID)){
//     $new_page_id = wp_insert_post($page);
//     if(!empty($template)){
//       update_post_meta($new_page_id, '_wp_page_template', $template);
//     }
//     $id = $new_page_id;
//   }
//   else{
//     $id = $page_check->ID;
//   }
//   return $id;
// }

// $blog_page = create_page_if_null("Blog");
// $front_page = create_page_if_null("Home");
// // Use a static front page
// update_option( 'page_on_front', $front_page );
// update_option( 'show_on_front', 'page' );
// // // Set the blog page
// update_option( 'page_for_posts', $blog_page );
function the_slug_exists($post_name) {
  global $wpdb;
  if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
    return true;
  } else {
    return false;
  }
}
// create the blog page
if (isset($_GET['activated']) && is_admin()){
  $page_title = 'Politica de uso de cookies';
  $page_content = '';
  $page_check = get_page_by_title($page_title);
  $page = array(
    'post_type' => 'page',
    'post_title' => $page_title,
    'post_content' => $page_content,
    'post_status' => 'publish',
    'post_author' => 1,
    'post_slug' => 'politica_cookies'
  );
  if(!isset($page_check->ID) && !the_slug_exists('politica_cookies')){
    $page_id = wp_insert_post($page);
  }
}
?>