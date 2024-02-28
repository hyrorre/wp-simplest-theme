<?php

remove_action('wp_head', 'wp_generator');

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('wp-simplest-style-css', get_theme_file_uri('/style.css'));
  wp_enqueue_script('wp-simplest-index-js', get_theme_file_uri('/index.js'), array(), false, true);
});
