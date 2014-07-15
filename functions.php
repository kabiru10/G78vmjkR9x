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
if( !defined('ADMIN_PATH') )
    define( 'ADMIN_PATH', get_template_directory() . '/zwork/admin/' );


/***************************************************************/
// TGM Plugin Activation
require_once dirname( __FILE__ ) . '/zwork/zplugin_activation.php';
add_action( 'tgmpa_register', 'avada_register_required_plugins' );
function avada_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/zwork/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '4.5.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'LayerSlider WP', // The plugin name
            'slug'                  => 'LayerSlider', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/zwork/plugins/LayerSlider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '5.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'tgmpa';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
        'parent_url_slug'   => 'themes.php',                // Default parent URL slug
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'is_automatic'      => true,                        // Automatically activate plugins after installation or not
        'message'           => '',                          // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin installed or update: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
            'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );
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
require_once('includes/contactinfo.php');
require_once('includes/ad125.php');



/* * ******************************************************************************************** */
/* Used for Pro Panel */
/* * ******************************************************************************************** */
// require_once(TEMPLATEPATH . '/admin/admin-functions.php');
// require_once(TEMPLATEPATH . '/admin/admin-interface.php');
// require_once(TEMPLATEPATH . '/admin/theme-settings.php');
?>


