<?php

function make_blog_cpt()
{

    // TEST FLAG POST TYPE
    register_post_type('blog', [
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
        'labels' => [
            'name' => 'Blog',
            'add_new_item' => 'Add New Blog',
            'edit_item' => 'Edit Blog',
            'all_items' => 'All Blogs',
            'singular_name' => 'Blog',
        ],
        'menu_icon' => 'dashicons-excerpt-view',
    ]);
}

add_action('init', 'make_blog_cpt');