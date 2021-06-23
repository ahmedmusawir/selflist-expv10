<?php
/**
 * INSERT NEW CITY TAXONOMY WITH AJAX
 */

add_action('wp_ajax_nopriv_city_insert_ajax', 'city_insert_ajax');
add_action('wp_ajax_city_insert_ajax', 'city_insert_ajax');

function city_insert_ajax()
{

    $state_id = $_POST['stateId'];
    $city_name = $_POST['newCityName'];

    // echo "<h4>State ID: $state_id</h4><br>";
    // echo "<h4>City Name: $city_name</h4><br>";

    /**
     * CHECKING IF CITY EXISTS & IF THE STATE IS THE PARENT
     */
    if (term_exists($city_name, 'states', $state_id)) {
        echo "
    <div class='alert alert-danger rounded-0' role='alert'>
      The City <strong>$city_name</strong> already exists ...
      City Name must be unique ...
    </div>
    ";
        die();
    }

    // INSERTING NEW CITY UNDER THE SELECTED STATE
    $city_insert_result = wp_insert_term(
        $city_name, // the term
        'states', // the taxonomy
        array(
            'description' => 'A City',
            'parent' => $state_id,
        )
    );

    // COLLECTING STATE AND CITY OBJECTS
    $city_id = $city_insert_result['term_id'];
    $city_obj = get_term($city_id);
    $state_obj = get_term($state_id);

    // MAKING A CUSTOM DATA ARRAY
    $state_city_info = [
        'state_name' => $state_obj->name,
        'state_id' => $state_obj->term_id,
        'new_city_name' => $city_obj->name,
        'new_city_id' => $city_obj->term_id,
    ];

    wp_send_json($state_city_info);

    // FOLLOWING IS A MUST FOR AJAX
    wp_die();

}