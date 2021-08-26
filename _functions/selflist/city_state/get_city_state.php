<?php
/**
 * GETTING STATE & CITIES IN MENU
 */

function order_cities_alphabetically($cities_of_ga)
{
    $cities_to_sort = [];
    $sorted_city_ids = [];

    // CREATING NEW ARRAY WITH CITY & ID CONCATINATED SO THEY CAN BE ALPHABETICALLY SORTED
    foreach ($cities_of_ga as $city_id) {
        
      $city_obj = get_term($city_id);

        array_push($cities_to_sort, $city_obj->name . '|' . $city_obj->term_id); // ( [0] => Athens|676 )
    }

    // SORTING THE THE CITY ARRAY ALPHABETICALLY
    sort($cities_to_sort);
    
    // NOW COLLCTING THE SORTED IDS AND CREATEING A NEW ID ARRAY (SORTED)
    foreach ($cities_to_sort as $city) {

        $new_city_data = explode('|', $city);
    
        array_push($sorted_city_ids, $new_city_data[1]);
    }
    
    // RETURNING THE NEW ARRAY OF SORTED IDS
    return $sorted_city_ids;
}

function get_cities($state, $current_cat_id)
{
    // Getting State
    $state_cat_georgia = get_term_by('slug', $state, 'states');
    // $state_cat_georgia_link = get_category_link($state_cat_georgia);
    // Getting the children Category IDs Array with no List/Post attached
    $cities_of_ga = get_term_children($state_cat_georgia->term_id, 'states');

    // COLLECTING THE NEW ALPHABETICALLY SORTED IDS ARRAY
    $city_list_alphabetic = order_cities_alphabetically($cities_of_ga);

    // CITIES FILTER MENU
    echo '<article id="' . $state . '" class="d-none single-state-box">';
    echo '<section class="p-1">';

    echo '<div class="mb-2">';
    echo '<h6 class="pl-1 py-1 bg-light"><small class="font-weight-bold">' . $state_cat_georgia->name . '</small></h6>';
    // echo '<a href="'. $state_cat_georgia_link .'">' . $state_cat_georgia->name . ' (' . $state_cat_georgia->count . ')</a>';
    echo '</div>';

    // CREATING AN ALPHABATIC LIST OF CITY BUTTONS DYNAMICALLY
    foreach ($city_list_alphabetic as $city_id) {
        $city_obj = get_term($city_id);

        // $city_cat_link = get_category_link($city_obj);
        // MAKING CITY BTN IDs
        $city_btn_id = "$state-$city_obj->slug-btn";

        echo '<button id="' . $city_btn_id . '" class="btn btn-outline-primary btn-sm list-inline-item city-button mb-1">';
        echo
        '<small data-state="' . $state . '" data-city="' . $city_obj->slug . '" data-catid="' . $current_cat_id . '">'
        . $city_obj->name .
            '</small>';
        echo '</button>';
    }

    echo '</section>';
    echo '</article>';
}

function get_state_and_cities($all_states, $current_cat_id)
{
    // STATE FILTER MENU
    echo '<div id="state-filter-menu" class="mb-3 p-1 border border-primary animate__animated animate__bounceInLeft d-none">';
    // DYNAMICALLY GENERATING STATE/COUNTRY/CONTINENT BUTTONS
    foreach ($all_states as $state) {
        echo '<li class="list-inline-item">';
        echo
        '<button id="' . $state->slug . '-btn" data-state="' . $state->slug . '" class="btn btn-danger btn-sm state-btn">'
        . $state->name .
            '</button>';
        echo '</li>';
    }

    echo '<div class="border">';
    // DYNAMICALLY GENERATING A LIST OF STATE BUTTONS BY USING get_cities() FUNCTION
    foreach ($all_states as $state) {
        get_cities($state->slug, $current_cat_id);
    }
    echo '</div>';

    echo '</div>'; // End Top Filter Menu

}