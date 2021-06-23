<?php
/**
 * AUTO UPDATE THE CATEGORIES TO JSON
 */
// add_action('create_category', 'auto_update_json_file', 10, 2);

function auto_update_json_file($term_id, $taxonomy_term_id)
{
    // Run the function to re-write Category JSON file
    // every time a new Category is created
    get_selflist_main_cats_to_json();
}