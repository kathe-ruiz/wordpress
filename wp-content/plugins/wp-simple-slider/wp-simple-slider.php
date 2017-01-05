<?php
/**
 * Plugin Name: Wp Simple Slider
 * Plugin URI: http://nswebworld.in
 * Description: This plugin for Second launch.
 * Version: 1.0.0
 * Author: Nswebworld
 * Author URI: http://nswebworld.in
 * License: GPL2
 */
 
 
 add_action('admin_menu', 'nswebworld_slider');
 
 // action function for above hook
function nswebworld_slider() {
	add_menu_page(__('Nswebworld Hello','wp_simple_slider'), __('Nswebworld Hello','add-nswebworld'), 'Administrator', 'nswebworld_simple_slider', 'nswebworld_simple_slider');
}
function nswebworld_simple_slider(){
	
		
		
		
		
?>
	
<h1>Hello Plugin From Nswebworld Simple Slider</h1>	
<?php		
		
}