<?php

/*


	==========================
	ADMIN PAGE

	==========================


*/
	
function panda_add_admin_page(){

	// page title, menu title, capability, slug, function name, custom icon with absolute path,location of menu
	add_menu_page('Panda Options', 'Panda', 'manage_options','panda-page', 'panda_create_page', get_template_directory_uri() . '/img/panda.png',110);




}

add_action('admin_menu', 'panda_add_admin_page');

function  panda_create_page(){
// generation of our admin page
}