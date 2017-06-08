<?php
class CustomMenuHeaderWidget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array(
      'classname' => 'header_widget',
      'description' => __('Muestra un menu personalizado con el logo en el centro del menu'),
    );
    parent::__construct( 'custom_menu_header_widget', 'Menu centrado', $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    // outputs the content of the widget
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }
    if ( ! empty( $instance['description'] ) ) {
        echo '<p>'. apply_filters( 'widget_description', $instance['description'] ) .'</p>';
    }
    ob_start();
    get_template_part('widgets/centered-menu/frontend');
    $html = ob_get_contents();
    ob_end_clean();
    echo $html;
    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    // outputs the options form on admin
    $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'swapps' );
    $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'swapps' );
    ?>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label>
    <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
    </p>
    <?php
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

    return $instance;
  }
}

function register_menu_header_widget() {
  register_widget( 'CustomMenuHeaderWidget' );
}
add_action( 'widgets_init', 'register_menu_header_widget' );