<?php 
/**
 * MAKING CITY STATE CUSTOM REST ROUTE
 */


 function set_categories() {
   register_rest_route('selflist/v1', 'catInfo', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'get_categories_to_rest',
    'permission_callback' => '__return_true'
   ] );
 }
 add_action( 'rest_api_init', 'set_categories' );

 function get_categories_to_rest() {

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

        // COLLECTING ALL THE SUB CATEGORIES
        // Following function coming form:
        // _functions/selflist/selflist-get-subcats-json.php 
        $new_results = get_selflist_sub_cats_to_json($main_cat->term_id);

        array_push($results, array(
            'mainCatName' => $main_cat->name,
            'mainCatSlug' => $main_cat->slug,
            'mainCatId' => $main_cat->term_id,
            'mainCount' => $main_cat->count,
            'mainLink' => get_category_link($main_cat->term_id),
            $new_results,
        ));
    }
    
    // SENDING CAT ARRAY TO REST
    return $results;
}