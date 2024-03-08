<?php
function load_stylesheets()
{
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function loadjs()
{
	wp_register_script('customjs', get_template_directory_uri() . '/script.js', '', 1, true);
	wp_enqueue_script('customjs');
}

add_action('wp_enqueue_scripts', 'loadjs');

//Theme Support
add_theme_support('custom-logo');
add_theme_support('menus');
add_theme_support('widgets');

function my_menus() {
	register_nav_menus(array(
		'headerNav' => __('Header Navigation'),
		'footerNav' => __('Footer Navigation')
	));
}

add_action('init', 'my_menus');

// Active widget
function nd_dosth_register_sidebars() {
    register_sidebar( array(
        'name' => esc_html__( 'Footer left', 'nd_dosth' ),
        'id' => 'footer-left',
        'description'   => esc_html__( 'This is a widget for footer left.', 'nd_dosth' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer right', 'nd_dosth' ),
        'id' => 'footer-right',
        'description'   => esc_html__( 'This is a widget for footer right.', 'nd_dosth' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'nd_dosth_register_sidebars' );

function remove_block_w(){
    remove_theme_support('widgets-block-editor');
}
 
add_action('after_setup_theme', 'remove_block_w');


// Custom Post Type
function finalproject_post_type() {
	register_post_type('donut', array(
		'supports' => array('title', 'editor'),
		'rewrite'=> array('slug','donuts'),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-marker',
		'labels' => array(
			'name' => 'Donuts',
			'add_new_item' => 'Add New donut',
			'edit_item' => 'Edit donut',
			'all_items' => 'All donuts',
			'singular_name' => 'donut'
		)
	) );
}

add_action('init','finalproject_post_type');
?>