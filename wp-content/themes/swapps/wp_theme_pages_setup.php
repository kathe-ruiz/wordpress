<?php
// Source: https://clicknathan.com/web-design/automatically-create-pages-wordpress/
// programmatically create some basic pages, and then set Home and Blog
// setup a function to check if these pages exist
// function the_slug_exists($post_name) {
//   global $wpdb;
//   if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A' AND post_type != 'nav_menu_item')) {
//     return true;
//   } else {
//     return false;
//   }
// }
// // create the blog page
// if (isset($_GET['activated']) && is_admin()){
//     $blog_page_title = 'Blog';
//     $blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
//     $blog_page_check = get_page_by_title($blog_page_title);
//     $blog_page = array(
//       'post_type' => 'page',
//       'post_title' => $blog_page_title,
//       'post_content' => $blog_page_content,
//       'post_status' => 'publish',
//       'post_author' => 1,
//       'post_slug' => 'blog'
//     );
//     if(!isset($blog_page_check->ID) && !the_slug_exists('blog')){
//         $blog_page_id = wp_insert_post($blog_page);
//     }
// }

// // create the site map page
// if (isset($_GET['activated']) && is_admin()){
//     $sitemap_page_title = 'Site Map';
//     $sitemap_page_check = get_page_by_title($sitemap_page_title);
//     $sitemap_page = array(
//       'post_type' => 'page',
//       'post_title' => $sitemap_page_title,
//       'post_status' => 'publish',
//       'post_author' => 1,
//       'post_slug' => 'site-map'
//     );
//     if(!isset($sitemap_page_check->ID) && !the_slug_exists('site-map')){
//         $sitemap_page_id = wp_insert_post($sitemap_page);
//     }
// }
// // change the Sample page to the home page
// if (isset($_GET['activated']) && is_admin()){
//     $home_page_title = 'Home';
//     $home_page_content = '';
//     $home_page_check = get_page_by_title($home_page_title);
//     $home_page = array(
//       'post_type' => 'page',
//       'post_title' => $home_page_title,
//       'post_content' => $home_page_content,
//       'post_status' => 'publish',
//       'post_author' => 1,
//       'ID' => 2,
//       'post_slug' => 'home'
//     );
//     if(!isset($home_page_check->ID) && !the_slug_exists('home')){
//         $home_page_id = wp_insert_post($home_page);
//     }
// }
// if (isset($_GET['activated']) && is_admin()){
//   // Set the blog page
//   $blog = get_page_by_title( 'Blog' );
//   update_option( 'page_for_posts', $blog->ID );

//   // Use a static front page
//   $front_page = 2; // this is the default page created by WordPress
//   update_option( 'page_on_front', $front_page );
//   update_option( 'show_on_front', 'page' );
// }

function create_page($title, $slug, $content='', $template=''){
  $page_check = get_page_by_title($title);
  $page = array(
    'post_type' => 'page',
    'post_title' => $title,
    'post_content' => $content,
    'post_status' => 'publish',
    'post_author' => 1,
    'post_slug' => $slug
  );

  if(!isset($page_check->ID)){
    $new_page_id = wp_insert_post($page);
    if(!empty($template)){
      update_post_meta($new_page_id, '_wp_page_template', $template);
    }
  }
}

// Use a static front page
// $about = get_page_by_title( 'About' );
// update_option( 'page_on_front', $about->ID );
// update_option( 'show_on_front', 'page' );

// // Set the blog page
// $blog   = get_page_by_title( 'Blog' );
// update_option( 'page_for_posts', $blog->ID );

?>