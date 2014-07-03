<?php

/* * ******************************************************************************************** */
/* 	Define Constants */
/* * ******************************************************************************************** */
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/img');


/* * ******************************************************************************************** */
/* Menus */
/* * ******************************************************************************************** */

function register_my_menus() {
    register_nav_menus(
            array(
                'top-menu' => __('Top Menu', 'Avenir'),
            // 'main-menu' => __('Main Menu', 'Avenir')
            )
    );
}

add_action('init', 'register_my_menus');

/* Add static Last Li to the Menu */
//add_filter('wp_nav_menu_items', 'custom_menu_item', 10, 2);

function custom_menu_item($items, $args) {
    if ($args->theme_location == 'top-menu') {
        $items .= '<li><a class="menu">Menu</a></li>';
    }
    return $items;
}

/* * ******************************************************************************************** */
/* Load JS Files */
/* * ******************************************************************************************** */

function load_custom_scripts() {
    wp_enqueue_script('my_script', THEMEROOT . '/js/js.js', array('jquery'), false, true);
    //handle,  Path, list of Dependencies(jquery), Version(false: WP auto-increment d version of d script), true(add 2 footer) vid 20 3:15
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');


/* * ******************************************************************************************** */
/* Add Sidebar Support */
/* * ******************************************************************************************** */
// Register widgetized locations
if (function_exists('register_sidebar')) {

    //These are the Widgets for the Footer Area
    register_sidebar(array(
        'name' => __('Footer Widget 1', 'Avenir'),
        'id' => 'footer-widget1',
        'before_widget' => '<div class="blog">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'Avenir'),
        'id' => 'footer-widget2',
        'before_widget' => '<div class="blog">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3', 'Avenir'),
        'id' => 'footer-widget3',
        'before_widget' => '<div class="blog">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));

    //Social and Subscribe Widget
    register_sidebar(array(
        'name' => __('Social Widget', 'Avenir'),
        'id' => 'social-widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));

    //Newsletter Widget
    register_sidebar(array(
        'name' => __('Newsletter Widget', 'Avenir'),
        'id' => 'newsletter-widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));
}

/* * ******************************************************************************************** */
/* Add Theme Support for Post Thumbnails and Automatic Feed Links */
/* * ******************************************************************************************** */
/* Adds Support for Featured Images* */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(500, 350);
    add_image_size('small-thumb', 50, 50, true); //used for the image in the footer latest post
    //add_image_size('storefront', 620, 270, true);
}


//Comment Form Functionality
function avenir_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
}


/* * ******************************************************************************************** */
/* Load Theme Options Page, Custom Post Types, Custom Widgets */
/* * ******************************************************************************************** */
require_once('includes/testimonials.php');
require_once('includes/people.php');
require_once('includes/social-widget.php');
require_once('includes/latestpost-widget.php');
require_once('includes/shortcodes.php');



/* * ******************************************************************************************** */
/* Used for Pro Panel */
/* * ******************************************************************************************** */
require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
?>


