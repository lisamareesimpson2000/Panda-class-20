<?php

//wp function for local path
require get_template_directory() . '/inc/function-admin.php';

function add_custom_files(){
    wp_enqueue_style('my_bootstrap_file', get_template_directory_uri() . '/assets/css/bootstrap.css' , array(), '4.3.1');

    wp_enqueue_style('my_custom_stylesheet', get_template_directory_uri() . '/assets/css/custom_theme_style.css' , array(), '0.1');

    wp_enqueue_script('jquery');

    wp_enqueue_script('my_bootstrap_script', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '4.3.1', true);
};
add_action('wp_enqueue_scripts', 'add_custom_files');
//not closing php

//this is to style the admin (changing background of posts colour etc)
function add_admin_styles(){
    wp_enqueue_style('my_admin_styles', get_template_directory_uri() . '/assets/css/admin.css' , array(), '0.1');
}
add_action('admin_enqueue_scripts', 'add_admin_styles');


function register_my_menu() {
    register_nav_menu('header_menu','The menu which appears at the top of the page');
    register_nav_menu('footer_menu','The menu which appears at the bottom of the page');
}
add_action( 'init', 'register_my_menu' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';


//Add all of the defauly block styles needed for gutenbergs editor
add_theme_support( 'wp-block-styles' );

add_theme_support('post-thumbnails');

add_image_size('icon', 50, 50, true);

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_theme_support( 'post-formats', array( 'image', 'video', 'audio' ) );


add_action( 'widgets_init', 'add_sidebar' );

function add_sidebar() {

    register_sidebar( array(
        'name' => __( 'Main Sidebar', '18wdwu07Panda' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', '18wdwu07Panda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widgettitle">',
    	'after_title'   => '</h2>',
        )
    );

}

// unregister all widgets
function unregister_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    // unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
    unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Gallery');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Media_Video');

}
add_action('widgets_init', 'unregister_default_widgets', 11);




require get_template_directory() . '/inc/custom_post_types.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/custom_fields.php';