<?php 
// Remove options not required by users
add_action( 'admin_menu', 'my_remove_menus', 999 );
function my_remove_menus() {
	if(WP_DEBUG == false):
        remove_menu_page( 'plugins.php' );
        remove_menu_page( 'update-core.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
        remove_menu_page( 'amazon-web-services', 'amazon-web-services' );

        define('DISALLOW_FILE_MODS',true);
    endif;
}
