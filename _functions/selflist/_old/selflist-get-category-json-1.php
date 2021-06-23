<?php

function get_selflist_main_cats_to_json()
{

    /**
     * 1ST LEVEL BEGINS - MAIN CATEGORY
     */
    $args = array(
        'parent' => 0,
        'exclude' => 1,
        'hide_empty' => 0,
        'hierarchical' => true,
    );
    $main_cats = get_categories($args);

    $results = array();

    /**
     * 1ST LEVEL CATEGORY LOOP
     */
    foreach ($main_cats as $main_cat) {

        $new_results = get_selflist_sub_cats_to_json($main_cat->term_id);

        array_push($results, array(
            'mainCatName' => $main_cat->name,
            'mainCatSlug' => $main_cat->slug,
            'mainCatId' => $main_cat->term_id,
            $new_results,
        ));
    }

    $json_data = json_encode($results, JSON_PRETTY_PRINT);
    // echo $json_data;

    // WRITING TO A JSON FILE
    $cat_json_dir = wp_upload_dir()['basedir'];
    $json_file = '/categories.json';
    $file_location = $cat_json_dir . $json_file;
    // print_r($file_location);
    file_put_contents($file_location, $json_data);

}
