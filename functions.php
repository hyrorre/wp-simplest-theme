<?php

remove_action('wp_head', 'wp_generator');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'bootstrap-icons',
        get_theme_file_uri('/node_modules/bootstrap-icons/font/bootstrap-icons.min.css')
    );
    wp_enqueue_style(
        'wp-simplest-style-css',
        get_theme_file_uri('/style.css'),
        [],
        date('ymdHis', filemtime(get_theme_file_path('/style.css')))
    );
    wp_enqueue_script('wp-simplest-index-js', get_theme_file_uri('/index.js'), [], false, true);
});

add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    return [];
});
add_filter('big_image_size_threshold', '__return_false');
update_option('medium_large_size_w', 0);
