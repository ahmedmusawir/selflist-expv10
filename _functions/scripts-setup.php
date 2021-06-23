<?php

/**
 * Enqueue scripts and styles.
 */
function cyberize_scripts()
{
    //CYBERIZE FRAMEWORK 1.0 STYLES UNIFIED & MINIFIED
    // wp_enqueue_style('cyberize-framework-1-main-style', get_template_directory_uri() . '/assets/dist/css/main.min.css', '', time());
    wp_enqueue_style( 'cyberize-framework-1-main-style', get_template_directory_uri() . '/assets/dist/css/main.min.css', '', 15.1 );

    //CYBERIZE FRAMEWORK 1.0 STYLE.CSS - USED FOR POST PRODUCTION UPDATES ONLY
    wp_enqueue_style('cyberize-framework-1-style', get_stylesheet_uri(), '', 3.0);

    //CYBERIZE FRAMEWORK 1.0 JAVASCRIPTS UNIFIED AND MINIFIED
    wp_enqueue_script('selflist-main-js', get_template_directory_uri() . '/assets/dist/js/script.min.js', array('jquery'), time(), true);

    wp_localize_script('selflist-main-js', 'selflistData', array(
        'root_url' => get_site_url(),
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wp_rest'),
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

}
add_action('wp_enqueue_scripts', 'cyberize_scripts');