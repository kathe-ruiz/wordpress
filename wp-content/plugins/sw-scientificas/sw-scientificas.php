<?php
/**
 * Plugin Name:     Sw Scientificas
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          www.swapps.io
 * Text Domain:     sw-scientificas
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sw_Scientificas
 */
// Our custom post type function
function historial_post_types_register() {
  register_post_type( 'historial',
    array(
      'labels' => array(
        'name' => __( 'Historial' ),
        'singular_name' => __( 'Historial' ),
        'add_new' => __( 'Agregar Historial' ),
        'add_new_item' => __( 'Agregar Nuevo Historial' ),
        'edit' => __( 'Editar' ),
        'edit_item' => __( 'Editar Historial' ),
        'new_item' => __( 'Nuevo Historial' ),
        'view' => __( 'Ver Historial' ),
        'view_item' => __( 'Ver Historial' ),
        'search_items' => __( 'Buscar Historial' ),
        'not_found' => __( 'No Historial' ),
        'not_found_in_trash' => __( 'No hay Historial en la Papelera' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'historial'),
      'hierarchical' => false,
      'public' => true,
      'menu_position' => 25,
      'menu_icon' => 'dashicons-portfolio',
      'has_archive' => 'historial',
    )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'historial_post_types_register' );

// add new column
function Description_columns_head($defaults) {

  foreach($defaults as $key => $title) {
    $defaults = array();
    if ($key=='date')
      $defaults['cb'] = 'Usuario';
      $defaults['usuario'] = 'Usuario';
      $defaults['description'] = 'Descripción';
      $defaults['fecha'] = 'Fecha';
      $defaults['historial_files'] = 'Archivo';
      //$defaults[$key] = $title;
  }
  return $defaults;
}

// show description
function Description_columns_content($column_name, $post_ID) {
  if ($column_name == 'description') {
    $description = get_post_meta ( $post_ID, 'description', true );
    $trimmed = wp_trim_words( $description, $num_words = 20, $more = null );
    echo $trimmed;
  }
  if ($column_name == 'usuario') {
    $get_user = get_post_meta ( $post_ID, 'usuario', true );
    $get_name = get_user_by('id',$get_user);
    printf('<a href="/wp-admin/post.php?post='.$post_ID.'&amp;action=edit" class="row-title">'. $get_name->user_login.'</a>');
  }
  if ($column_name == 'fecha') {
    $date = get_post_meta ( $post_ID, 'fecha', true );
    echo date('d/m/Y', strtotime($date));
  }
  if ($column_name == 'historial_files') {
    $files = get_field('historial_files', $post_ID);
    $counter = get_post_meta ( $post_ID, 'historial_files', true );
    $out = array();
    $i = 0;
    if ($files) {
      foreach ($files as $url) {
        $i++;
        $id_media = $url['sub_hisotorial_file'];
        $title_file = get_the_title($id_media);
        $link = wp_get_attachment_url($id_media);
        printf('<a href="'. $link .'" target="_blank">'. $title_file .'</a>');
        if ($counter  == $i) {
          echo ".";
        }
        else{
          echo ", ";
        }
      }
    }
  }
}

function fecha_sort_column( $columns ) {
  $columns['fecha'] = 'Fecha';
  $columns['usuario'] = 'Usuario';
  return $columns;
}
/* Only run our customization on the 'edit.php' page in the admin. */
function my_fecha_load() {
  add_filter( 'request', 'my_sort_fecha' );
}
/* Sorts the historial post. */
function my_sort_fecha( $vars ) {
  //check if isset historial post type
  if ( isset( $vars['post_type'] ) && 'historial' == $vars['post_type'] ) {
    //check if isset meta_value fecha
    if ( isset( $vars['orderby'] ) && 'fecha' == $vars['orderby'] ) {
      /* Merge the query vars with our custom variables. */
      $vars = array_merge(
        $vars,
        array(
          'meta_key' => 'fecha',
        )
      );
    }
    if ( isset( $vars['orderby'] ) && 'usuario' == $vars['orderby'] ) {
      /* Merge the query vars with our custom variables. */
      $vars = array_merge(
        $vars,
        array(
          'meta_key' => 'usuario',
        )
      );
    }
  }
  return $vars;
}
add_action( 'load-edit.php', 'my_fecha_load' );
add_filter( 'manage_edit-historial_sortable_columns', 'fecha_sort_column' );
add_filter('manage_historial_posts_columns', 'Description_columns_head', 10, 1);
add_action('manage_historial_posts_custom_column', 'Description_columns_content', 10, 2);

add_action( 'restrict_manage_posts', 'filter_user' );
function filter_user(){
  $type = 'post';
  if (isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
  }
  //only add filter to post type you want
  if ('historial' == $type){
    $all_users = get_users();
    ?>
    <select name="admin_user_filter">
    <option value=""><?php _e('Usuario', 'wose45436'); ?></option>
    <?php
      $current_v = isset($_GET['admin_user_filter'])? $_GET['admin_user_filter']:'';
      foreach ($all_users as $value) {
        printf(
          '<option value="%s"%s>%s</option>',
          $value->ID,
          $value->ID == $current_v? ' selected="selected"':'', $value->user_nicename
        );
      }
    ?>
    </select>
    <?php
  }
}
add_filter( 'parse_query', 'filter_user_query' );

function filter_user_query( $query ){
  global $pagenow;
  $type = 'post';
  if (isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
  }
  if ( 'historial' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['admin_user_filter']) && $_GET['admin_user_filter'] != '') {
      $query->query_vars['meta_key'] = 'usuario';
      $query->query_vars['meta_value'] = $_GET['admin_user_filter'];
  }
}
/* Add fields to account page */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_59a069590e45b',
  'title' => 'Historial',
  'fields' => array (
    array (
      'key' => 'field_59a06965755d4',
      'label' => 'Usuario',
      'name' => 'usuario',
      'type' => 'user',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'role' => '',
      'allow_null' => 0,
      'multiple' => 0,
    ),
    array (
      'key' => 'field_59a069dd755d5',
      'label' => 'Descripción',
      'name' => 'description',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 1,
      'delay' => 0,
    ),
    array (
      'key' => 'field_59a06de69bbcb',
      'label' => 'Fecha',
      'name' => 'fecha',
      'type' => 'date_picker',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'display_format' => 'd/m/Y',
      'return_format' => 'd/m/Y',
      'first_day' => 1,
    ),
    array (
      'key' => 'field_59b026e7245d1',
      'label' => 'Archivos',
      'name' => 'historial_files',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'table',
      'button_label' => '',
      'sub_fields' => array (
        array (
          'key' => 'field_59b02704245d2',
          'label' => 'Archivo',
          'name' => 'sub_hisotorial_file',
          'type' => 'file',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'id',
          'library' => 'all',
          'min_size' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'historial',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'the_content',
  ),
  'active' => 1,
  'description' => '',
));

endif;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59a42759e1595',
	'title' => 'Crystals',
	'fields' => array (
		array (
			'key' => 'field_59a85d9fbf63f',
			'label' => 'Número de serie',
			'name' => 'numero_de_serie',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_59a4280da60bb',
			'label' => 'Código de activación',
			'name' => 'hash',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_59a4275e3ba90',
			'label' => 'Archivo',
			'name' => 'archivo',
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
				0 => 'wpdmpro',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_59a44b8e67ee8',
			'label' => 'Permitir la descarga',
			'name' => 'permitir__descarga',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'edit',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
  wp_register_style( 'scientificas-css', plugins_url( 'sw-scientificas/css/scientificas.css' ) );
  wp_enqueue_style( 'scientificas-css' );
  wp_register_script( 'scientificas-scripts', plugins_url( 'sw-scientificas/js/scripts.js'));
  wp_enqueue_script( 'scientificas-scripts' );
}

// https://stackoverflow.com/questions/41235092/upload-exe-file-in-wordpress-website
function enable_extended_upload ( $mime_types =array() ) {

   // The MIME types listed here will be allowed in the media library.
   // You can add as many MIME types as you want.
   $mime_types['exe']  = 'application/exe';

   return $mime_types;
}
add_filter('upload_mimes', 'enable_extended_upload');
