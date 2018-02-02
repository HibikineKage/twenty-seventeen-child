<?php
require 'theme-update-checker.php';
$update_checker = new ThemeUpdateChecker(
    'twenty-seventeen-child',
    'https://raw.githubusercontent.com/HibikineKage/twenty-seventeen-child/master/update-info.json'
);

/**
 * <meta name="generator" content="Wordpress 4.0">のようなタグを削除します。
 */
remove_action('wp_head', 'wp_generator');
