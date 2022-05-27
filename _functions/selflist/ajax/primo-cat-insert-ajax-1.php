<?php
/**
 * INSERT PRIMO, SECONDO & TERZO CATEGORY WITH AJAX
 */

// FOR NON LOGGED IN USERS
// add_action('wp_ajax_nopriv_primo_cat_insert_ajax', 'primo_cat_insert_ajax');
// FOR LOGGED IN USERS
add_action('wp_ajax_primo_cat_insert_ajax', 'primo_cat_insert_ajax');

function primo_cat_insert_ajax()
{

    $main_cat = $_POST['mainCat'];
    $primo_cat = $_POST['primoCat'];
    $secondo_cat = $_POST['secondoCat'];
    $terzo_cat = $_POST['terzoCat'];

    // FOLLOWING FUNCTIONS WILL INSERT MAIN CAT TO TERZO CAT WITH PARENT
    // CHILD RELATIONSHIP

    $main_cat_name = sanitize_text_field($main_cat);
    $sub_cat_1 = sanitize_text_field($primo_cat);
    $sub_cat_2 = sanitize_text_field($secondo_cat);
    $sub_cat_3 = sanitize_text_field($terzo_cat);

    /**
     * COLLECT MAIN CATEGORY ID
     */

    $main_cat_id = get_cat_ID($main_cat_name);

    /**
     * CHECKING IF CATEGORY EXISTS & IF THE MAIN CAT IS THE PARENT
     */
    if (term_exists($sub_cat_1, 'category', $main_cat_id)) {
        echo "
    <div class='alert alert-danger rounded-0' role='alert'>
      The Primo Category <strong>$sub_cat_1</strong> already exists ...
      The Primo Category must be unique ...
    </div>
    ";
        die();
    }

    /**
     * INSERT SUB CATEGORY 1 - PRIMO
     */
    $sub_cat_1_info = wp_insert_term(
        // The Primo Cat
        $sub_cat_1,
        // The Taxonomy Name
        'category',
        // Args like slug, parent etc. go here
        array(
            // The Main Cat is the Parent
            'parent' => $main_cat_id,
        )
    );

    // COLLECTING PRIMO CATEGORY ID
    $sub_cat_1_id = $sub_cat_1_info['term_id'];

    /**
     * INSERT SUB CATEGORY 2 - SECONDO
     */
    if ($sub_cat_2) {

        $sub_cat_2_info = wp_insert_term(
            // The Secondo Cat
            $sub_cat_2,
            // The Taxonomy Name
            'category',
            // Args like slug, parent etc. go here
            array(
                // The Primo Cat is the Parent
                'parent' => $sub_cat_1_id,

            )
        );
        // COLLECTING SECONDO CATEGORY ID
        $sub_cat_2_id = $sub_cat_2_info['term_id'];

    }

    /**
     * INSERT SUB CATEGORY 3 - TERZO
     */
    if ($sub_cat_3) {

        $sub_cat_3_info = wp_insert_term(
            // The Terzo Cat
            $sub_cat_3,
            // The Taxonomy Name
            'category',
            // Args like slug, parent etc. go here
            array(
                // The Secondo Cat is the Parent
                'parent' => $sub_cat_2_id,
            )
        );

        // COLLECTING TERZO CATEGORY ID
        $sub_cat_3_id = $sub_cat_3_info['term_id'];

    }

    // NEW CAT SET ARRAY
    $cat_set_array = array(
        'main_cat' => $main_cat_name,
        'main_cat_id' => $main_cat_id,
        'primo_cat' => $sub_cat_1,
        'primo_cat_id' => $sub_cat_1_id,
        'secondo_cat' => $sub_cat_2,
        'secondo_cat_id' => $sub_cat_2_id,
        'terzo_cat' => $sub_cat_3,
        'terzo_cat_id' => $sub_cat_3_id,
    );

    // UPDATE THE CAT DATA JSON FILE
    // This function is from: _functions/selflist/selflist-get-category-json.php
    get_selflist_main_cats_to_json();

    // SENDING JSON OBJECT
    wp_send_json($cat_set_array);

    // THE FOLLOWING IS A MUST FOR AJAX PHP FUNCTIONS
    die();
}