<?php 
  function get_css_classes(){
    $css_classes;
    if (function_exists('sw_options') && sw_options('site_options_secondary_navbar_position')){
      $css_classes = sw_options('site_options_secondary_navbar_position');
    }
    else{
      $css_classes = '';
    }
    if (function_exists('sw_options') && sw_options('site_options_header_color')){
      $css_classes .= ' ' . sw_options('site_options_header_color');
    }
    return $css_classes;
  }
 ?>