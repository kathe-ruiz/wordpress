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
use Cocur\Slugify\Slugify;



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

add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
    load_theme_textdomain( 'swapps', get_template_directory() . '/languages' );
}


//Start Register Custom Navigation
require_once('wp_bootstrap_navwalker.php');
require_once('swapps_default_menu.php');
require_once('breadcrumb.php');
require_once('includes/custom-pagination.php');
require_once('includes/navbar-user-button.php');

require_once('wp_theme_pages_setup.php');
require_once('includes/custom-fields.php');
require_once('includes/sw_maintenance_mode.php');
// require_once('includes/admin-mods.php');
require 'widgets/subscribe/widget.php';
require 'widgets/business-info/widget.php';



function get_social_accounts()
{
  $accounts = array();
  if (function_exists('sw_options')) {
    $accounts['facebook'] = (sw_options('social_facebook')) ?: null;
    $accounts['twitter'] = (sw_options('social_twitter')) ?: null;
    $accounts['instagram'] = (sw_options('social_instagram')) ?: null;
    $accounts['youtube'] = (sw_options('social_youtube')) ?: null;
    $accounts['vimeo'] = (sw_options('social_vimeo')) ?: null;
    $accounts['linkedin'] = (sw_options('social_linkedin')) ?: null;
  }
  return $accounts;
}

// Header image. Should be moved to plugin, check later. (Phase 3)
// require get_template_directory() . '/includes/custom-header.php';

// For set sliders in the homepage
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_5851bd3e01760',
  'title' => __('Sliders'),
  'fields' => array (
    array (
      'key' => 'field_5851bd5593b57',
      'label' => __('Main Slider'),
      'name' => 'slider_1',
      'type' => 'post_object',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => array (
        0 => 'slider',
      ),
      'taxonomy' => array (
      ),
      'allow_null' => 1,
      'multiple' => 0,
      'return_format' => 'object',
      'ui' => 1,
    ),
    array (
      'key' => 'field_5852a09dd26e4',
      'label' => __('Secondary slider'),
      'name' => 'slider_2',
      'type' => 'post_object',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => array (
        0 => 'slider',
      ),
      'taxonomy' => array (
      ),
      'allow_null' => 1,
      'multiple' => 0,
      'return_format' => 'object',
      'ui' => 1,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'template-home.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif;

/**
 * Woocommerce
 */
require get_template_directory() . '/woocommerce/woocommerce.php';
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}
// Display 9 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


if (!function_exists('primary_landing_menu')) {
  function primary_landing_menu()
  {
    if (!has_nav_menu('primary_navigation') and have_rows('field_rows')) {
      return get_field('field_rows') ;
    } else {
      return False;
    }
  }
}
if (!function_exists('get_var_if_exists')) {
  function get_if_exists($var, $default=NULL)
  {
    if (isset($var) and !empty($var) and $var) {
      return $var;
    } else {
      if (is_null($default)) {
        return False;
      } else {
        return $default;
      }
    }
  }
}

if (!function_exists('slugify')) {
  function slugify($var)
  {
    $slugify = new Slugify();
    return $slugify->slugify($var);
  }
}

if (!function_exists('sw_get_phone')) {
  function sw_get_phone($priority='main')
  {
    $front_page_id = (int)get_option('page_on_front');
    if (function_exists('get_field') && get_field( 'field_phone', $front_page_id )):
      $phone = get_field( 'field_phone', $front_page_id );
    elseif (function_exists('sw_options')):
      $phone = ($priority == 'main' && sw_options('phone')) ? sw_options('phone') : (($priority == 'secondary' && sw_options('secondary_phone')) ? sw_options('secondary_phone') : '') ;
    endif;
    if (!isset($phone)){
      $phone = False;
    }
    return $phone;
  }
}

add_action( 'widgets_init', 'register_suscribe_widget' );
// Shortcode to generate HTML of subscribe form
function render_subscribe_form()
{
  ob_start();
  get_template_part('templates/subscribe', 'form');
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}

add_shortcode( 'sw-subscribe-form', 'render_subscribe_form' );


if (!function_exists('format_date_array')) {
  function format_date_array($var, $format = "D d F Y"){
    return preg_split('/[\s,]+/', date_format(date_create($var), $format));
  }
}

// Override Yoast SEO meta title formatting on front page
add_filter( 'wpseo_title', 'sw_site_title' );
function sw_site_title($title) {
  global $post;

  // Retrieve front page value for Yoast SEO title
  $page_title = WPSEO_Meta::get_value( 'title', $post->ID );
  // Show site name if title is not set
  if ( is_front_page() && !$page_title ) {
    $title = get_bloginfo( 'name' );
  }

  return $title;
}
/**
 * Adds Image_Widget widget.
 */
class Image_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    // Add Widget scripts
    add_action('admin_enqueue_scripts', array($this, 'scripts'));
    parent::__construct('image_picker', // Base ID
      __( 'Image Picker', 'text_domain' ), // Name
      array( 'description' => __( 'Widget para subir imagenes, con este widget podras publicar aununcion para tu sitio web.', 'text_domain' ), ) // Args
     );
  }
  public function scripts(){
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_media();
    wp_enqueue_script('our_admin', get_template_directory_uri() . '/assets/scripts/our_admin.js', array('jquery'));
  }
  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    // Our variables from the widget settings
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '', 'text_domain' ) : $instance['title'] );
    $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
    $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';
    $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';
    $image4 = ! empty( $instance['image4'] ) ? $instance['image4'] : '';
    $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
    $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : '';
    $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : '';
    $link4 = ! empty( $instance['link4'] ) ? $instance['link4'] : '';
    ob_start();
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    ?>
    <div class="container-fluid">
      <div class="grid">
      <?php if($image): ?>
        <div class="grid-item">
          <a href="<?php echo esc_url($link1); ?>" target="_blank">
            <img src="<?php echo esc_url($image); ?>" alt="woocommerce-advertisement" class="img-responsive center-block">
          </a>
        </div>
      <?php endif; ?>
      <?php if($image2): ?>
        <div class="grid-item">
          <a href="<?php echo esc_url($link2); ?>" target="_blank">
            <img src="<?php echo esc_url($image2); ?>" alt="woocommerce-advertisement" class="img-responsive center-block">
          </a>
        </div>
      <?php endif; ?>
        <div class="grid-item">
          <?php if($image3 and $image4): ?>
            <div class="item">
              <a href="<?php echo esc_url($link3); ?>" target="_blank">
                <img src="<?php echo esc_url($image3); ?>" alt="woocommerce-advertisement" class="img-responsive center-block">
              </a>
            </div>
            <div class="item">
              <a href="<?php echo esc_url($link4); ?>" target="_blank">
                <img src="<?php echo esc_url($image4); ?>" alt="woocommerce-advertisement" class="img-responsive center-block">
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php
    echo $args['after_widget'];
    ob_end_flush();
  }
  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'text_domain' );
    $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
    $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';
    $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';
    $image4 = ! empty( $instance['image4'] ) ? $instance['image4'] : '';
    $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
    $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : '';
    $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : '';
    $link4 = ! empty( $instance['link4'] ) ? $instance['link4'] : '';
     ?>
    <br>
    <div>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </div>
    <br>
    <div>
      <label><?php _e( 'First Image:' ); ?></label>
      <br>
      <label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="url" value="<?php echo esc_url( $link1 ); ?>" />
      <br><br>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat" readonly id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>"/>
      <br><br>
      <button class="upload_image_button button button-primary">Choose Image</button>
    </div>
    <br>
    <div>
      <label><?php _e( 'Second Image:' ); ?></label>
      <br>
      <label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="url" value="<?php echo esc_url( $link2 ); ?>" />
      <br><br>
      <label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat" readonly id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo esc_url( $image2 ); ?>"/>
      <br><br>
      <button class="upload_image_button button button-primary">Choose Image</button>
    </div>
    <br>
    <div>
      <label><?php _e( 'Third Image:' ); ?></label>
      <br>
      <label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="url" value="<?php echo esc_url( $link3 ); ?>" />
      <br><br>
      <label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat" readonly id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" type="text" value="<?php echo esc_url( $image3 ); ?>"/>
      <br><br>
      <button class="upload_image_button button button-primary">Choose Image</button>
    </div>
    <br>
    <div>
      <label><?php _e( 'Fourth Image:' ); ?></label>
      <br>
      <label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e( 'Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" type="url" value="<?php echo esc_url( $link4 ); ?>" />
      <br><br>
      <label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat" readonly id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" type="text" value="<?php echo esc_url( $image4 ); ?>"/>
      <br><br>
      <button class="upload_image_button button button-primary">Choose Image</button>
    </div>
    <br><br>
     <?php
  }
  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
    $instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? $new_instance['image2'] : '';
    $instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? $new_instance['image3'] : '';
    $instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? $new_instance['image4'] : '';
    $instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link1'] ) : '';
    $instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? strip_tags( $new_instance['link2'] ) : '';
    $instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? strip_tags( $new_instance['link3'] ) : '';
    $instance['link4'] = ( ! empty( $new_instance['link4'] ) ) ? strip_tags( $new_instance['link4'] ) : '';
  return $instance;
}

} // class Image_Widget
// register Image_Widget widget
function register_image_widget() {
  register_widget( 'Image_Widget' );
}
add_action( 'widgets_init', 'register_image_widget' );

function add_signin_nav_item($items) {
  $item = get_navbar_login();
  return $items .= $item;
}
add_filter('wp_nav_menu_items','add_signin_nav_item');

function is_acadp() {
  global $post;
  if ( isset($post->ID) && in_array( $post->ID, get_option('acadp_page_settings') ) )
    return true;
  return false;
}

function display_internal_sidebar() {
  if ( is_active_sidebar( 'internal_pages_sidebar' ) ) {
    if ( (function_exists('is_ultimatemember') && is_ultimatemember()) || 
         (function_exists('is_acadp') && is_acadp()) 
    ) {
      return false;
    }
    return true;
  }
  return false;
} 
