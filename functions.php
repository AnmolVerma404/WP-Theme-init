<?php

/**
 * @function load_stylesheets => Load bootstrap and other CSS into our theme
 */
function load_stylesheets()
{
    wp_register_style('stylesheet', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('stylesheet');
}
/**
 * This tells the php script written in header to load stylesheets instead of doing it manually
 */
add_action('wp_enqueue_scripts', 'load_stylesheets');