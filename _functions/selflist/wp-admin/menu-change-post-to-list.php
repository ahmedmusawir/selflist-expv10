<?php 
/**
 * THIS CHANGES POSTS TO LISTS IN THE LEFT 
 * WP-ADMIN MENU
 */

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Lists';
    $submenu['edit.php'][5][0] = 'Lists';
    $submenu['edit.php'][10][0] = 'Add Lists';
    $submenu['edit.php'][15][0] = 'List Categories'; // Change name for categories
    $submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Lists';
    $labels->singular_name = 'List';
    $labels->add_new = 'Add List';
    $labels->add_new_item = 'Add List';
    $labels->edit_item = 'Edit Lists';
    $labels->new_item = 'List';
    $labels->view_item = 'View List';
    $labels->search_items = 'Search Lists';
    $labels->not_found = 'No Lists found';
    $labels->not_found_in_trash = 'No Lists found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );