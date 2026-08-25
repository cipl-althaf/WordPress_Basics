<?php
// require_once get_template_directory() . '/newfunctionality.php';

require_once get_template_directory() . '/contact_form_7_functionality.php';

function new_theme1_enqueue_styles() {

    wp_enqueue_style(
        'new-theme1-style',
        
        get_stylesheet_uri()
    );

}
add_action('wp_enqueue_scripts', 'new_theme1_enqueue_styles');


/*
|--------------------------------------------------------------------------
| Enqueue Font Awesome
|--------------------------------------------------------------------------
*/

function new_theme1_enqueue_fontawesome()
{
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'
    );
}

add_action('wp_enqueue_scripts', 'new_theme1_enqueue_fontawesome');