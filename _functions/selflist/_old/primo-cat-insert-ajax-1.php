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
        // the name of the sub-category
        $sub_cat_1,

        // the taxonomy 'category' (don't change)
        'category',

        array(
            // what to use in the url for term archive
            // 'slug' => $sub_cat_1_slug,

            // link with main category. In the case, become a child of the "Category A" parent
            'parent' => $main_cat_id,
            // 'parent'=> term_exists( $category_name, 'category' )['term_id']

        )
    );

    // COLLECTING SUB CATEGORY 1 ID
    $sub_cat_1_id = $sub_cat_1_info['term_id'];

    /**
     * INSERT SUB CATEGORY 2 - SECONDO
     */
    $sub_cat_2_info = wp_insert_term(

        // the name of the sub-category
        $sub_cat_2,

        // the taxonomy 'category' (don't change)
        'category',

        array(
            // what to use in the url for term archive
            // 'slug' => $sub_cat_2_slug,

            // link with main category. In the case, become a child of the "Category A" parent
            'parent' => $sub_cat_1_id,

        )
    );
    // COLLECTING SUB CATEGORY 2 ID
    $sub_cat_2_id = $sub_cat_2_info['term_id'];

    /**
     * INSERT SUB CATEGORY 3 - TERZO
     */
    $sub_cat_3_info = wp_insert_term(

        // the name of the sub-category
        $sub_cat_3,

        // the taxonomy 'category' (don't change)
        'category',

        array(
            // what to use in the url for term archive
            // 'slug' => $sub_cat_3_slug,

            // link with main category. In the case, become a child of the "Category A" parent
            'parent' => $sub_cat_2_id,

        )
    );

    // COLLECTING SUB CATEGORY 2 ID
    $sub_cat_3_id = $sub_cat_3_info['term_id'];

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

    // FOLLOWING WAS TRIED BUT NOT NECESSARY SINCE wp_send_json IS PRESENT
    // $cat_set_array_json = json_encode($cat_set_array);

    // SENDING JSON OBJECT
    wp_send_json($cat_set_array);

    // THE FOLLOWING IS A MUST FOR AJAX PHP FUNCTIONS
    die();
}
