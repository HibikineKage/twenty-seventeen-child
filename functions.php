<?php
require 'theme-update-checker.php';
$update_checker = new ThemeUpdateChecker(
    'twenty-seventeen-child-master',
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
 * テーマのカスタマイズ時に出るメニューを追加します。
 * @param $wp_customize
 */
function theme_customizer_extension($wp_customize)
{
    $wp_customize->add_setting('theme-color', [
        'default' => '#000000',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('theme-color', [
        'section' => 'color',
        'settings' => 'theme-color',
        'label' => 'Theme Color',
        'description' => 'Set "theme-color" meta tag. Change tab color. This affects only android chrome.',
        'type' => 'color',
    ]);
}
add_action('customize_register', 'theme_customizer_extension');

function theme_customize_header()
{
    ?>
        <meta name="theme-color" content="<?php echo get_theme_mod('theme-color', '#000000'); ?>" />
    <?php
}

/**
 * <meta name="generator" content="Wordpress 4.0">のようなタグを削除します。
 */
remove_action('wp_head', 'wp_generator');
