<?php
/*
Plugin Name: wpaasp Customizer
Plugin URI: http://www.wpaasp.com/
Description: wpaasp Customizer
Version: 0.1
Author: inQbation Labs
Author URI: http://www.wpaasp.com/
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
*/

require plugin_dir_path(__FILE__) . '/customizer-controls/layout/layout-picker-custom-control.php';
require plugin_dir_path(__FILE__) . '/customizer-controls/select/google-font-dropdown-custom-control.php';

//include 'custom-fields-icons.php';

/**
 * Customizer class
 */
class WPaaSP_Customizer
{

    public function __construct()
    {
        add_action('admin_bar_menu', array($this, 'admin_bar_menu'), 1000);

        add_action('customize_register', array($this, 'customize_register_core'));
        add_action('customize_register', array($this, 'customize_register_custom'));

        add_action('customize_preview_init', array($this, 'customize_preview'));
        add_action('customize_controls_init', array($this, 'customize_controls'));

        //$this->icons = $custom_fields_icons;
    }


    /**
     * Adds a 'customize' menu item to the admin bar
     * * This function is attached to the 'admin_bar_menu' action hook.
     */
    public function admin_bar_menu($wp_admin_bar)
    {
        if (current_user_can('edit_theme_options') && is_admin_bar_showing()) {
            $wp_admin_bar->add_node(array('parent' => 'wpaasp_toolbar', 'id' => 'customize_theme', 'title' => __('Theme Options', 'wpaasp'), 'href' => admin_url('customize.php')));
        }
    }

    /**
     * Set up the default theme options
     */
    public function wpaasp_theme_options()
    {
        $default_theme_options = array(
            'width' => '1200',
            'layout' => '2',
            'primary' => 'col-md-8',
            'display_author' => 'on',
            'display_date' => 'on',
            'display_comment_count' => 'on',
            'display_categories' => '',
            'excerpt_content' => 'excerpt',
            'jumbo_headline_title' => 'Jumbo Headline!',
            'jumbo_headline_text' => 'Got something important to say? Then make it stand out by using the jumbo headline option and get your visitor\'s attention right away.',
        );

        return get_option('wpaasp_theme_options', $default_theme_options);
    }

    /**
     * Adds postMessage support for some WP core settings of the Theme Customizer
     * in order to handle preview changes with Javascript
     * * This function is attached to the 'customize_register' action hook.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function customize_register_core($wp_customize)
    {

        //$wp_customize->get_setting( 'blogname' )->transport				= 'refresh';
        //$wp_customize->get_setting( 'blogdescription' )->transport		= 'refresh';
        //$wp_customize->get_setting( 'header_textcolor' )->transport		= 'refresh';
        //$wp_customize->get_setting( 'background_image' )->transport		= 'refresh';
        //$wp_customize->get_setting( 'background_color' )->transport		= 'refresh';
    }


    /**
     * Adds theme options to the Customizer screen
     * * This function is attached to the 'customize_register' action hook.
     *
     * @param    class $wp_customize
     */
    public function customize_register_custom($wp_customize)
    {
        $wpaasp_theme_options = $this->wpaasp_theme_options();

        //Remove some defaults
        
        // $wp_customize->remove_section('colors');
        

        /**************************
         * Business Details Panel *
         **************************/
        $wp_customize->add_panel('business_panel', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Business Details'),
            'description' => '',
        ));

        /* Title & Tagline */
 




        /* Favicon section */
        $wp_customize->add_section('wpaasp_favicon', array(
            'title' => __('Favicon', 'wpaasp'),
            'priority' => 20,
            'panel' => 'business_panel',
        ));

        // Favicon File setting
        $wp_customize->add_setting('wpaasp_theme_options[favicon]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'wpaasp_favicon',
                array(
                    'label' => __('Upload a Favorite Icon', 'wpaasp'),
                    'section' => 'wpaasp_favicon',
                    'settings' => 'wpaasp_theme_options[favicon]',
                    'description' => __('Icons in <strong>PNG or ICO format</strong> with dimensions of <strong>32x32 pixels</strong> are highly recommended.', 'wpaasp')
                    // 'context'    => 'your_setting_context'
                )
            )
        );

        // Opening Hours
        $wp_customize->add_section('wpaasp_opening_hours', array(
            'title' => __('Opening Hours', 'wpaasp'),
            'priority' => 20,
            'panel' => 'business_panel',
        ));

        // Opening hours
        // Schedule block 1
        $wp_customize->add_setting('wpaasp_theme_options[opening_hours_block_1]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[opening_hours_block_1]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_opening_hours',
            'label' => __('Opening hours Block 1', 'wpaasp'),
            'description' => '',
        ));

        // monday to friday
        $wp_customize->add_setting('wpaasp_theme_options[opening_hours_block_2]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[opening_hours_block_2]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_opening_hours',
            'label' => __('Opening hours Block 2', 'wpaasp'),
            'description' => '',
        ));

        // monday to friday
        $wp_customize->add_setting('wpaasp_theme_options[opening_hours_block_3]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[opening_hours_block_3]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_opening_hours',
            'label' => __('Opening hours Block 3', 'wpaasp'),
            'description' => '',
        ));
        /* Social Networks */
        $wp_customize->add_section('wpaasp_social_networks', array(
            'title' => __('Social Networks', 'wpaasp'),
            'priority' => 20,
            'panel' => 'business_panel',
        ));

        // twitter
        $wp_customize->add_setting('wpaasp_theme_options[social_twitter]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[social_twitter]', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'wpaasp_social_networks',
            'label' => __('Twitter', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'http://www.twitter.com/my-twitter'
            ),
        ));

        // facebook
        $wp_customize->add_setting('wpaasp_theme_options[social_facebook]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[social_facebook]', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'wpaasp_social_networks',
            'label' => __('Facebook', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'http://www.facebook.com/my-facebook'
            ),
        ));

        // youtube
        $wp_customize->add_setting('wpaasp_theme_options[social_youtube]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[social_youtube]', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'wpaasp_social_networks',
            'label' => __('Youtube', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'http://www.youtube.com/my-channel'
            ),
        ));

        // linkedin
        $wp_customize->add_setting('wpaasp_theme_options[social_linkedin]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[social_linkedin]', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'wpaasp_social_networks',
            'label' => __('Linkedin', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'http://www.linkedin.com/my-profile'
            ),
        ));

	    // Google+
	    $wp_customize->add_setting('wpaasp_theme_options[social_google_plus]', array(
		    // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
		    'type' => 'option',
		    'capability' => 'edit_theme_options',
	    ));
	    $wp_customize->add_control('wpaasp_theme_options[social_google_plus]', array(
		    'type' => 'url',
		    'priority' => 10,
		    'section' => 'wpaasp_social_networks',
		    'label' => __('Google+', 'wpaasp'),
		    'description' => '',
		    'input_attrs' => array(
			    'placeholder' => 'http://plus.google.com/+my-profile'
		    ),
	    ));


        // Business Information
        $wp_customize->add_section('wpaasp_business_information', array(
            'title' => __('Business Information', 'wpaasp'),
            'priority' => 20,
            'panel' => 'business_panel',
        ));


        // Business name
        $wp_customize->add_setting('wpaasp_theme_options[business_name]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[business_name]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Business name and slogan', 'wpaasp'),
            'description' => '',
        ));

        // Business address
        $wp_customize->add_setting('wpaasp_theme_options[address]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[address]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Address', 'wpaasp'),
            'description' => '',
        ));


        $wp_customize->add_setting('wpaasp_theme_options[alternative_address]', array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[alternative_address]', array(
            'type' => 'textarea',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Alternative Address', 'wpaasp'),
            'description' => '',
        ));

        // phone
        $wp_customize->add_setting('wpaasp_theme_options[phone]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[phone]', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Phone', 'wpaasp'),
            'description' => '',
        ));

        // email
        $wp_customize->add_setting('wpaasp_theme_options[email]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[email]', array(
            'type' => 'email',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Email', 'wpaasp'),
            'description' => '',
        ));


        // Footer Banner File setting
        $wp_customize->add_setting('wpaasp_theme_options[map_pin]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'wpaasp_business_information',
                array(
                    'label' => __('Upload a marker for the map', 'wpaasp'),
                    'section' => 'wpaasp_business_information',
                    'settings' => 'wpaasp_theme_options[map_pin]',
                    'description' => __('Images in <strong>PNG format</strong> with dimensions of <strong>60x60 pixels</strong> are highly recommended.', 'wpaasp')
                    // 'context'    => 'your_setting_context'
                )
            )
        );

        // latitude
        $wp_customize->add_setting('wpaasp_theme_options[latitude]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[latitude]', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Marker latitud', 'wpaasp'),
            'description' => '',
        ));

        // longitude
        $wp_customize->add_setting('wpaasp_theme_options[longitude]', array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[longitude]', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Marker longitude', 'wpaasp'),
            'description' => '',
        ));

        // Map Zoom
        $wp_customize->add_setting('wpaasp_theme_options[map_zoom]', array(
            'type' => 'option',
			'default' => 17,
            'capability' => 'edit_theme_options',
        ));
		$zoom_opts = array();
		for ($i=1; $i<=20; $i++) {
			$zoom_opts[$i] = $i;
		}
        $wp_customize->add_control('wpaasp_theme_options[map_zoom]', array(
            'type' => 'select',
            'priority' => 10,
            'section' => 'wpaasp_business_information',
            'label' => __('Map Zoom Level', 'wpaasp'),
            'description' => '',
			'choices' => $zoom_opts,
        ));



        /* Favicon section */
        $wp_customize->add_section('wpaasp_footer', array(
            'title' => __('Footer', 'wpaasp'),
            'priority' => 20,
            'panel' => 'business_panel',
        ));


        /****************
         * Widgets Panel *
         ****************/

        // ini_set('error_reporting', E_ERROR  ); // TODO: remove, temporary hack to avoid php warning
//      $widgets_panel = $wp_customize->get_panel('widgets');
//      $widgets_panel->priority = 40;
        // ini_set('error_reporting', E_WARNING  ); // TODO: remove, temporary hack to avoid php warning


        /**************************
         * Default information Panel *
         **************************/
        $wp_customize->add_panel('defaults_panel', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('General Settings'),
            'description' => '',
        ));

        // Business Information
        $wp_customize->add_section('wpaasp_default_header', array(
            'title' => __('Default Header', 'wpaasp'),
            'priority' => 20,
            'panel' => 'defaults_panel',
        ));

        //
        $wp_customize->add_setting('wpaasp_theme_options[default_header_button_url]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control('wpaasp_theme_options[default_header_button_url]', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'wpaasp_default_header',
            'label' => __('Default header button URL', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'https://www.wpaasp.com'
            ),
        ));

        // View Map button title
        $wp_customize->add_setting('wpaasp_theme_options[default_header_button_title]', array(
            // 'default' => $wpaasp_theme_options['favicon'], //TODO: Set default
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control('wpaasp_theme_options[default_header_button_title]', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'wpaasp_default_header',
            'label' => __('Default header button tittle', 'wpaasp'),
            'description' => '',
            'input_attrs' => array(
                'placeholder' => 'Schedule an appointment'
            ),
        ));


        /**************************
         * Color Options Panel *
         **************************/

        $wp_customize->add_panel('options_panel', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Design'),
            'description' => '',
        ));

        $wp_customize->add_section('wpaasp_color_options', array(
            'title' => __('Palete / Header', 'wpaasp'),
            'priority' => 20,
            'panel' => 'options_panel',
        ));


        $wp_customize->add_setting('wpaasp_theme_options[site_options_select]', array(
            'default' => 'value2',
            'capability' => 'edit_theme_options',
            'type' => 'option',

        ));
        $wp_customize->add_control('wpaasp_theme_options[site_options_select_box]', array(
            'settings' => 'wpaasp_theme_options[site_options_select]',
            'label' => __('Site Palette Color:', ''),
            'section' => 'wpaasp_color_options',
            'type' => 'select',
            'choices' => array(
                'blue_green' => __('Blue Green', 'blue_green'),
                'blue_red' => __('Blue Red', 'blue_red'),
            ),
        ));

        $wp_customize->add_setting('wpaasp_theme_options[site_options_header_color]', array(
            'default' => 'navbar-default',
            'capability' => 'edit_theme_options',
            'type' => 'option',

        ));
        $wp_customize->add_control('wpaasp_theme_options[site_options_header_color_box]', array(
            'settings' => 'wpaasp_theme_options[site_options_header_color]',
            'label' => __('Header Color:', ''),
            'section' => 'wpaasp_color_options',
            'type' => 'select',
            'choices' => array(
                'navbar-default' => __('Light', 'wpaasp'),
                'navbar-inverse' => __('Dark', 'wpaasp'),
            ),
        ));

        // Option to select the position of the secondary nav bar, Above or below the page heading

        $wp_customize->add_section('wpaasp_secondary_navbar', array(
            'title' => __('Secondary navbar', 'wpaasp'),
            'priority' => 20,
            'panel' => 'options_panel',
        ));

        $wp_customize->add_setting('wpaasp_theme_options[site_options_secondary_navbar_position]', array(
            'default' => 'secondnavbar-below',
            'capability' => 'edit_theme_options',
            'type' => 'option',
        ));

        $wp_customize->add_control('wpaasp_theme_options[site_options_secondary_navbar_position_box]', array(
            'settings' => 'wpaasp_theme_options[site_options_secondary_navbar_position]',
            'label' => __('Secondary navbar position:', ''),
            'section' => 'wpaasp_secondary_navbar',
            'type' => 'radio',
            'choices' => array(
                'secondnavbar-below' => __('Below the Header', 'wpaasp'),
                'secondnavbar-above' => __('Above the Header', 'wpaasp'),
            ),
        ));

    }


    /**
     *
     * * This is executed INSIDE the preview iframe
     */
    function customize_preview()
    {
        // Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
        wp_enqueue_script('wpaasp-customizer-preview-js', get_template_directory_uri() . '/includes/customizer/js/customizer-preview.js', array('customize-preview'), '', true);
        wp_enqueue_style('wpaasp-customizer-preview-css', get_template_directory_uri() . '/includes/customizer/css/customizer-preview.css');

        // wp_enqueue_script( 'fontselect-jquery-plugin', get_template_directory_uri() . '/includes/fontselect-jquery-plugin/jquery.fontselect.js', array( 'jquery' ), '20140709', true );
    }

    /**
     * * This is executed OUTSIDE the preview iframe, in the controls.
     */
    function customize_controls()
    {
        // Bootstrap is also needed in the controls, mainly for the glyphicons
        // wp_enqueue_style( 'wpaasp-bootstrap', get_template_directory_uri() . '/library/css/resources/bootstrap/css/bootstrap.css' );
        // wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/library/css/font-awesome/css/font-awesome.min.css' );
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/includes/customizer/css/flaticon/flaticon.css');

        wp_enqueue_script('chosen-jquery-js', get_template_directory_uri() . '/includes/customizer/js/chosen/chosen.jquery.min.js', array('jquery'), '', true);
        // wp_enqueue_style( 'chosen-jquery-css', get_template_directory_uri() . '/includes/customizer/js/chosen/chosen.min.css' );
        wp_enqueue_style('chosen-jquery-css', get_template_directory_uri() . '/library/css/chosen.css');

        wp_enqueue_script('wpaasp-customizer-controls-js', get_template_directory_uri() . '/includes/customizer/js/customizer-controls.js', array('jquery'), '', true);
        wp_enqueue_style('wpaasp-customizer-controls-css', get_template_directory_uri() . '/includes/customizer/css/customizer-controls.css');

        wp_enqueue_style('wpaasp-font-selector', get_template_directory_uri() . '/library/css/font-selector.css');
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        //TODO: Use get_option? options persist when switching themes, not theme_mods
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo $return;
            }
        }
        return $return;
    }

}

$wpaasp_customizer = new WPaaSP_Customizer();
