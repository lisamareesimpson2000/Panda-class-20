<?php

/*


	==========================
	ADMIN PAGE

	==========================


*/
function panda_add_admin_page(){

	// page title, menu title, capability, slug, function name, custom icon with absolute path,location of menu
	add_menu_page('Panda Options', 'Panda', 'manage_options','panda_page', 'panda_create_page', 
'dashicons-admin-customizer',110);
 
 //add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
 	add_submenu_page('panda_page','Panda Theme Options', 'General','manage_options','panda_page', 'panda_create_page') ;

 	add_submenu_page('panda_page','Panda CSS Options', 'Custom CSS','manage_options','panda_page_css', 'panda_theme_settings_page') ;

 	add_action('admin_init', 'panda_custom_settings');
}

add_action('admin_menu', 'panda_add_admin_page');

function panda_custom_settings(){
	//register_setting( string $option_group, string $option_name, array $args = array() )
	register_setting('panda-settings-group', 'first_name');

	//add_settings_section( $id, $title, $callback, $page )
	add_settings_section('panda-sidebar-options', 'Sidebar Options', 'panda_sidebar_options', 'panda_page');

 	//add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
	add_settings_field('sidebar-name', 'First Name', 'panda_sidebar_name', 'panda_page','panda-sidebar-options'); // last parameter here should matcmatch the id on the previous line
	

}
function panda_sidebar_options(){
echo 'Customize your Sidebar Information';
}

 function panda_sidebar_name(){
 	echo '<input type="text" name="first-name" value="" placeholder="First Name"/>';
 }

function  panda_create_page(){
 require_once(get_template_directory() . '/inc/templates/panda-admin.php' );
}


function panda_theme_settings_page(){
echo '<h1>Panda Custom CSS Options </h1>';

}
