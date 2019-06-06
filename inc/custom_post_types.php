<?php

function add_event_post_type(){

    $labels = array(
		'name'               => _x( 'Events', 'post type general name', '18wdwu07Panda' ),
		'singular_name'      => _x( 'Event', 'post type singular name', '18wdwu07Panda' ),
		'menu_name'          => _x( 'Events', 'admin menu', '18wdwu07Panda' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', '18wdwu07Panda' ),
		'add_new'            => _x( 'Add New', 'event', '18wdwu07Panda' ),
		'add_new_item'       => __( 'Add New Event', '18wdwu07Panda' ),
		'new_item'           => __( 'New Event', '18wdwu07Panda' ),
		'edit_item'          => __( 'Edit Event', '18wdwu07Panda' ),
		'view_item'          => __( 'View Event', '18wdwu07Panda' ),
		'all_items'          => __( 'All Events', '18wdwu07Panda' ),
		'search_items'       => __( 'Search Events', '18wdwu07Panda' ),
		'parent_item_colon'  => __( 'Parent Events:', '18wdwu07Panda' ),
		'not_found'          => __( 'No events found.', '18wdwu07Panda' ),
		'not_found_in_trash' => __( 'No events found in Trash.', '18wdwu07Panda' )
	);


    $args = array(
        'labels' => $labels,
        'description' => 'A list of events which will be held',
        'public' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 6,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-tickets',
        'supports' => array('title', 'editor')
    );

    register_post_type('event', $args);
}
add_action('init', 'add_event_post_type');


function add_staff_post_type(){

    $labels = array(
		'name'               => _x( 'Staff', 'post type general name', '18wdwu07Panda' ),
		'singular_name'      => _x( 'Staff', 'post type singular name', '18wdwu07Panda' ),
		'menu_name'          => _x( 'Staff', 'admin menu', '18wdwu07Panda' ),
		'name_admin_bar'     => _x( 'Staff', 'add new on admin bar', '18wdwu07Panda' ),
		'add_new'            => _x( 'Add New', 'event', '18wdwu07Panda' ),
		'add_new_item'       => __( 'Add New Staff', '18wdwu07Panda' ),
		'new_item'           => __( 'New Staff', '18wdwu07Panda' ),
		'edit_item'          => __( 'Edit Staff', '18wdwu07Panda' ),
		'view_item'          => __( 'View Staff', '18wdwu07Panda' ),
		'all_items'          => __( 'All Staff', '18wdwu07Panda' ),
		'search_items'       => __( 'Search Staff', '18wdwu07Panda' ),
		'parent_item_colon'  => __( 'Parent Staff:', '18wdwu07Panda' ),
		'not_found'          => __( 'No events found.', '18wdwu07Panda' ),
		'not_found_in_trash' => __( 'No events found in Trash.', '18wdwu07Panda' )
	);


    $args = array(
        'labels' => $labels,
        'description' => 'A list of Staff Members which will be held in the database',
        'public' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail', 'editor')
    );

    register_post_type('staff', $args);
}
add_action('init', 'add_staff_post_type');

function add_enquiry_post_type(){

	$labels = array(
		'name'	=> _x( 'Contact', 'post type general name', '18wdwu07Panda'),
		'singular name' => _x( 'Contact', 'post type singular name', '18wdwu07Panda'),
		'menu_name'          => _x( 'Contact', 'admin menu', '18wdwu07Panda' ),
		'name_admin_bar'     => _x( 'Contact', 'add new on admin bar', '18wdwu07Panda' ),
		'add_new'            => _x( 'Add New', 'contact', '18wdwu07Panda' ),
		'add_new_item'       => __( 'Add New Contact', '18wdwu07Panda' ),
		'new_item'           => __( 'New Contact', '18wdwu07Panda' ),
		'edit_item'          => __( 'Edit Contact', '18wdwu07Panda' ),
		'view_item'          => __( 'View Contact', '18wdwu07Panda' ),
		'all_items'          => __( 'All Contact', '18wdwu07Panda' ),
		'search_items'       => __( 'Search Contact', '18wdwu07Panda' ),
		'parent_item_colon'  => __( 'Parent Contact:', '18wdwu07Panda' ),
		'not_found'          => __( 'No contacts found.', '18wdwu07Panda' ),
		'not_found_in_trash' => __( 'No contacts found in Trash.', '18wdwu07Panda' )

	);

	$args = array(
		'labels' => $labels,
		'description' => 'A list of enquiry messages which will be held in the database',
		'public' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-email-alt2',
		'supports' => array('title', 'editor', 'author')
	);
	register_post_type('Contact', $args);
}
add_action('init', 'add_enquiry_post_type');