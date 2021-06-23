<?php 

function make_flag_cpt() {

    // TEST FLAG POST TYPE
    register_post_type('flag', [
      'public' => false,
      'show_ui' => true,
      'labels' => [
        'name' => 'Flag',
        'add_new_item' => 'Add New Flag',
        'edit_item' => 'Edit Flag',
        'all_items' => 'All Flags',
        'singular_name' => 'Flag',
      ],
      'menu_icon' => 'dashicons-flag',
    ]);
}

add_action( 'init', 'make_flag_cpt' );