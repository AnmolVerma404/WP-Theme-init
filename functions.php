<?php

/**
 * @function load_stylesheets => Load bootstrap and other CSS into our theme
 * #IMPORTANT Position does matter, CSS could be overwrited
 */
function load_stylesheets()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('style', get_template_directory_uri() . './style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
/**
 * This tells the php script written in header to load stylesheets instead of doing it manually
 */
add_action('wp_enqueue_scripts', 'load_stylesheets');


/**
 * We are adding Jquery and custom JS but in different way!
 * This is because Jquery is most of the time already loaded with wordpress, therefore we need not to register it.
 * So we are first deregistering it then enqueueing.
 * wp_enqueue_script automatically registeres the script if not registered
 * ---
 * But in loadjs function we just need to register and enqueue the new script as it's not present in wordpress by default. Therefore we need to manually register it to be on saffer side.
 * Otherwise we can just do wp_enqueue_script only and it will work fine
 * I have not noticed any error yet if we do that so please correct me if I am wrong here.
 */

function include_jquery()
{
    /**
     * Here we are first deregistering the default WordPress jQuery library using wp_deregister_script('jquery'). This step removes the default jQuery library that comes bundled with WordPress.
     */
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', '', 1, true);
    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs()
{
    /**
     * @package wp_register_script( string $handle, string|false $src, string[] $deps = array(), string|bool|null $ver = false, array|bool $args = array() ): bool 
     * Name of the script. Should be uniqu
     * Full URL of the script, or path of the script relative to the WordPress root directory.
     * An array of registered script handles this script depends on.
     * String specifying script version number
     * An array of additional script loading strategies, in this case true as we want to load our script in footer
     * Whether the script has been registered. True on success, false on failure.
     */
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'loadjs');

/**
 * Add menu option in your Theme
 * After register where you can place that menu
 * At last you can tell wordpress where to assign that menu and connect the top-menu or fotter-menu hook
 * As we want top-menu in our head of every file, therefore for logical reasons we will be coding it in header.php
 */
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
    )
);

add_theme_support('post-thumbnails');
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);