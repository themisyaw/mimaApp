<?php

// Register a header menu
function mytheme_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');

function my_theme_scripts() {
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    // Theme CSS (load after Bootstrap)
    wp_enqueue_style(
        'my-custom-style',
        get_template_directory_uri() . '/template-parts/css/howToStyle.css',
        array(),                       // dependencies if needed
        filemtime(get_template_directory() . '/template-parts/css/howToStyle.css') // auto cache-bust
    );
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array('bootstrap-css'),
        filemtime(get_template_directory() . '/style.css')
    );

    // Bootstrap JS Bundle (includes Popper)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(), // no dependencies needed
        '5.3.3',
        true // load in footer
    );

    // Your custom JS (load after Bootstrap JS)
    wp_enqueue_script(
        'theme-app',
        get_template_directory_uri() . '/js/app.js',
        array('bootstrap-js'),
        filemtime(get_template_directory() . '/js/app.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'my_theme_scripts');
add_filter('show_admin_bar', '__return_false');