<?php 
/**
 * MAKING CITY STATE CUSTOM REST ROUTE
 */


 function set_cities() {
   register_rest_route('selflist/v1', 'cities', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'get_city_state_to_rest',
   ] );
 }
 add_action( 'rest_api_init', 'set_cities' );

 function get_city_state_to_rest() {

    /**
      * GET CITY & STATE
      */
    $args = [ 'parent' => 0, 'hide_empty' => false ];
    $state_list = get_terms( 'states', $args ); // array is returned if taxonomy is given

    // EMPTY ARRAY
    $states_and_cities = [];
    $cities = [];

    foreach ( $state_list as $state ) {
      $cities_ids = get_term_children($state->term_id, 'states'); // tax_id and taxonomy slug


      foreach ( $cities_ids as $city_id ) {
        $city_obj = get_term($city_id);

        array_push( $cities, [
          'city_name' => $city_obj->name,
          'city_slug' => $city_obj->slug,
          'city_id' => $city_obj->term_id,
        ] );
      }

      array_push( $states_and_cities, [
        'state_name' => $state->name,
        'state_slug' => $state->slug,
        'state_id' => $state->term_id,
        'cities' => $cities,
      ] );
      // RESETTING CITIES 
      $cities = [];

  }

 
  return $states_and_cities;

}