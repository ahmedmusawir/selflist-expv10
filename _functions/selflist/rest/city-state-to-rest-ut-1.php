<?php 
/**
 * MAKING CITY STATE CUSTOM REST ROUTE
 */


 function set_cities() {
   register_rest_route('selflist/v1', 'cities', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'get_cities_to_rest',
   ] );
 }
 add_action( 'rest_api_init', 'set_cities' );


 function get_cities_to_rest() {
   return 'the Moose is Loose';
 }