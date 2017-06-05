<?php 
  if (!function_exists('get_css_classes')) {
    function get_css_classes(){
      $css_classes;
      if (function_exists('sw_options') && sw_options('site_options_secondary_navbar_position')){
        $css_classes = 'navbar-fixed';
      }
      else{
        $css_classes = '';
      }
      if (function_exists('sw_options') && sw_options('site_options_header_color')){
        $css_classes .= ' ' . sw_options('site_options_header_color');
      }
      return $css_classes;
    }
  }
  if (!function_exists('get_logo')){
    function get_logo(){
      $header_link = (function_exists('sw_options') && sw_options('logo_link')) ? sw_options('logo_link') : '/'?>
        <div class="navbar__logo navbar-left visible-xs visible-sm">
          <a href="<?php echo $header_link; ?>" rel="nofollow">
          <?php if (function_exists('get_custom_logo') && get_theme_mod( 'custom_logo' )):
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            $custom_logo = $image[0];
          ?>
          <img class="custom-logo" src="<?php echo $custom_logo; ?>" alt="Logo"/>
          <?php else: ?>
            <div class="logo-name"><strong><?php echo get_bloginfo( 'name' ) ?></strong></div>
          <?php endif ?>
          </a>
        </div>
      <?php
    }
  }
  if (!function_exists('get_opacity')) {
    function get_opacity(){
      $default_opacity = '1';
      $opacity = ( sw_options('site_options_header_opacity') && (int)sw_options('site_options_header_opacity') >= 0 && (int)sw_options('site_options_header_opacity') <= 100) ? ((int)sw_options('site_options_header_opacity') / 100) : $default_opacity ;
      $style = 'style="opacity:'. $opacity .'"';
      return $style;
    }
  }
  if (!function_exists('get_phones')) {
    function get_phones(){
      $phone = sw_get_phone();
      if ($phone):?>
        <a class="phone__link btn btn-sm btn-primary-outline-withoutborder hidden-xs hidden-sm" href="tel:<?php echo $phone; ?>">
          <i class="phone__icon fa fa-phone" aria-hidden="true"></i>
          <span class="phone__text text-secondary" href="#"><?php echo $phone; ?></span>
        </a>
      <?php endif;
      $secondary_phone = sw_get_phone('secondary');
      if (function_exists('sw_options') && sw_options('checkbox_phone')): 
        if ($secondary_phone): ?>
          <a class="phone__link btn btn-sm btn-primary-outline-withoutborder hidden-xs hidden-sm" href="tel:<?php echo $secondary_phone; ?>">
            <i class="phone__icon fa fa-phone" aria-hidden="true"></i>
            <span class="phone__text text-secondary" href="#"><?php echo $secondary_phone; ?></span>
          </a>
        <?php endif;
      endif;
    }
  }if (!function_exists('get_phones_responsive')) {
    function get_phones_responsive(){
      $phone = sw_get_phone();
      if ($phone):?>
        <a class="phone__link btn btn-sm btn-primary-outline-withoutborder visible-xs visible-sm" href="tel:<?php echo $phone; ?>">
          <i class="phone__icon fa fa-phone" aria-hidden="true"></i>
        </a>
      <?php endif;
      $secondary_phone = sw_get_phone('secondary');
      if (function_exists('sw_options') && sw_options('checkbox_phone')): 
        if ($secondary_phone): ?>
          <a class="phone__link btn btn-sm btn-primary-outline-withoutborder visible-xs visible-sm" href="tel:<?php echo $secondary_phone; ?>">
      <i class="phone__icon fa fa-phone" aria-hidden="true"></i>
    </a>
        <?php endif;
      endif;
    }
  }
 ?>