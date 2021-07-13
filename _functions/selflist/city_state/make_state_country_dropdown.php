<?php 
/**
 * GETTING STATE & CITIES IN MENU
 */

 function make_state_country_dropdown() {

    $args = [
        'taxonomy' => 'states',
        'parent' => 0,
        'hide_empty' => false,
    ];

    $state_countries = get_terms( $args );

    // echo '<pre>';
    // print_r($state_countries);
    // echo '</pre>';

    foreach ($state_countries as $state_country) {
        # code...
        echo '<option value="' . $state_country->term_id . '">' . $state_country->name .'</option>';
    }
        
    // return '<option value="0">A Country From Code...</option>';



}