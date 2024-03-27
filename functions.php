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

    if (!is_page('contact')) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_script('contact-form-7');
    }
});

add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    return [];
});
add_filter('big_image_size_threshold', '__return_false');
update_option('medium_large_size_w', 0);

add_action('after_setup_theme', function () {
    register_nav_menus([
        'Menu' => 'Menu'
    ]);
});

add_filter('the_content_more_link', function () {
    $url = esc_url(get_permalink());
    return "<div><a href='$url' class='more-link btn btn-secondary'>続きを読む</a></div>";
});

add_filter('comment_form_fields', function ($fields) {
    return [
        'author'  => $fields['author'],
        'email'   => $fields['email'],
        // 'url'     => $fields['url'],
        // 'rate'    => $fields['rate'],
        'comment' => $fields['comment'],
        'cookies' => $fields['cookies']
    ];
});

add_filter('comment_reply_link', function ($html) {
    return str_replace('comment-reply-link', 'comment-reply-link btn btn-outline-secondary btn-sm mb-2', $html);
});

add_filter('wp_required_field_indicator', function () {
    return '<span class="required">*</span>';
});

add_filter('document_title_separator', function () {
    return '|';
});
