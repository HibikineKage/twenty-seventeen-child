<?php
require 'theme-update-checker.php';
$update_checker = new ThemeUpdateChecker(
    'twenty-seventeen-child',
    'https://raw.githubusercontent.com/HibikineKage/twenty-seventeen-child/master/update-info.json'
);

/**
 * Styleの継承関係を解決します。
 */
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}


/**
 * <meta name="generator" content="Wordpress 4.0">のようなタグを削除します。
 */
remove_action('wp_head', 'wp_generator');
