<?php
require_once get_template_directory() . '/functionality.php';

function new_theme1_enqueue_styles() {

    wp_enqueue_style(
        'new-theme1-style',
        get_stylesheet_uri()
    );

}
add_action('wp_enqueue_scripts', 'new_theme1_enqueue_styles');
