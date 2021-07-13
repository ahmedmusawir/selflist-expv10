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

    foreach ($state_countries as $state_country) {
        # code...
        echo '<option value="' . $state_country->term_id . '">' . $state_country->name .'</option>';
    }
        
}