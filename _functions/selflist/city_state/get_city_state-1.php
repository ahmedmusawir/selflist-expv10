<?php 
/**
 * GETTING STATE & CITIES IN MENU
 */

function get_cities( $state, $current_cat_id ) {
  // Getting State
  $state_cat_georgia = get_term_by('slug', $state, 'states');
  // $state_cat_georgia_link = get_category_link($state_cat_georgia);
  // Getting the children Category IDs Array with no List/Post attached
  $cities_of_ga = get_term_children($state_cat_georgia->term_id, 'states');
  
  // CITIES FILTER MENU
  echo '<article id="'. $state .'" class="d-none single-state-box">';
  echo '<section class="p-1">';
  
    echo '<div class="mb-2">';
    echo '<h6 class="pl-1 py-1 bg-light"><small class="font-weight-bold">' . $state_cat_georgia->name . '</small></h6>';
    // echo '<a href="'. $state_cat_georgia_link .'">' . $state_cat_georgia->name . ' (' . $state_cat_georgia->count . ')</a>';
    echo '</div>';

    foreach ( $cities_of_ga as $city_id ) {
      $city_obj = get_term($city_id);
      // $city_cat_link = get_category_link($city_obj);
      // MAKING CITY BTN IDs
      $city_btn_id = "$state-$city_obj->slug-btn";

      echo '<button id="'. $city_btn_id .'" class="btn btn-outline-primary btn-sm list-inline-item city-button mb-1">';
      echo 
      '<small data-state="'. $state .'" data-city="'. $city_obj->slug .'" data-catid="'. $current_cat_id .'">' 
      . $city_obj->name .
      '</small>';
      echo '</button>';
    }

  echo '</section>';
  echo '</article>';
} 

function get_state_and_cities( $all_states, $current_cat_id ) {
  // STATE FILTER MENU
  echo '<div id="state-filter-menu" class="mb-3 p-1 border border-primary animate__animated animate__bounceInLeft d-none">';
  foreach ($all_states as $state) {
    echo '<li class="list-inline-item">';
    echo 
    '<button id="'. $state->slug .'-btn" data-state="'. $state->slug .'" class="btn btn-danger btn-sm state-btn">' 
    . $state->name .
    '</button>';
    echo '</li>';
  }
  
  echo '<div class="border">';
  foreach ( $all_states as $state ) {
    get_cities( $state->slug, $current_cat_id );
  }
  echo '</div>';

  echo '</div>';  // End Top Filter Menu

}