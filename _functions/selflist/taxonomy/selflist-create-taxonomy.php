<?php
/**
 * THE FOLLOWING ARE TO CREATE CUSTOM TAXONIMIES. CURRENTLY DISABLED FOR LISTINGS
 */

// create two taxonomies, Product Types and writers for the post type "book"
function create_post_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('States', 'taxonomy general name', 'cyberize-framework'),
        'singular_name' => _x('State', 'taxonomy singular name', 'cyberize-framework'),
        'search_items' => __('Search States', 'cyberize-framework'),
        'all_items' => __('All States', 'cyberize-framework'),
        'parent_item' => __('Parent State', 'cyberize-framework'),
        'parent_item_colon' => __('Parent State:', 'cyberize-framework'),
        'edit_item' => __('Edit State', 'cyberize-framework'),
        'update_item' => __('Update State', 'cyberize-framework'),
        'add_new_item' => __('Add New State', 'cyberize-framework'),
        'new_item_name' => __('New State Name', 'cyberize-framework'),
        'menu_name' => __('States', 'cyberize-framework'),
    );
    $capabilities = [
        'manage_terms' => 'manage_states',
        'edit_terms' => 'edit_states',
        'delete_terms' => 'delete_states',
        'assign_terms' => 'assign_states',
    ];
    // $capabilities = [];
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'states'),
        // 'capabilities' => $capabilities,
    );

    register_taxonomy('states', array('post'), $args);

}

// hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_post_taxonomies', 0);