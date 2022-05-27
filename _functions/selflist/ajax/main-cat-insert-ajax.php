<?php
/**
 * INSERT MULTI LEVEL ALL CATEGORIES WITH AJAX
 */

// FOR NON LOGGED IN USERS
// add_action('wp_ajax_nopriv_main_cat_insert_ajax', 'main_cat_insert_ajax');
// FOR LOGGED IN USERS
add_action('wp_ajax_main_cat_insert_ajax', 'main_cat_insert_ajax');

function main_cat_insert_ajax()
{

    $main_cat = $_POST['mainCat'];
    $primo_cat = $_POST['primoCat'];
    $secondo_cat = $_POST['secondoCat'];
    $terzo_cat = $_POST['terzoCat'];

    // FOLLOWING FUNCTIONS WILL INSERT MAIN CAT TO TERZO CAT WITH PARENT
    // CHILD RELATIONSHIP

    $category_name = sanitize_text_field($main_cat);
    $sub_cat_1 = sanitize_text_field($primo_cat);
    $sub_cat_2 = sanitize_text_field($secondo_cat);
    $sub_cat_3 = sanitize_text_field($terzo_cat);

    /**
     * CHECKING IF CATEGORY EXISTS
     */
    if (term_exists($category_name, 'category')) {

        // echo 'Checking For Main Cats...';
       
        // COLLECTING ALL CATS THAT ARE PARENTS ONLY 
        $cat_objs = get_categories([
            'taxonomy' => 'category',
            'parent' => 0,
            'hide_empty' => false
        ]);

            foreach ($cat_objs as $cat) {

            $compare = strcasecmp($cat->name, $category_name);
            
            // MAKING SURE IF THE MAIN CATEGORY HAS NO PARENT
            if ($compare === 0) {
            
                    echo "
                <div class='alert alert-danger rounded-0' role='alert'>
                The Main Category <strong>$category_name</strong> already exists ...
                The Main Category must be unique ...
                </div>";
                
                wp_die();
            } 
        }

    }

    /**
     * INSERT MAIN CATEGORY
     */
    $main_cat_info = wp_insert_term(
        // The Main Category
        $category_name,
        // The Taxonomy Name
        'category'
    );
    // COLLECTING MAIN CATEGORY ID
    $main_cat_id = $main_cat_info['term_id'];

    /**
     * INSERT SUB CATEGORY 1 - PRIMO
     */
    if ($sub_cat_1) {

        $sub_cat_1_info = wp_insert_term(
            // The Primo Category
            $sub_cat_1,
            // The Taxonomy Name
            'category',
            // Main Cat is the Parent here
            array(
                'parent' => $main_cat_id,
            )
        );

        // COLLECTING PRIMO CATEGORY ID
        $sub_cat_1_id = $sub_cat_1_info['term_id'];

    }

    /**
     * INSERT SUB CATEGORY 2 - SECONDO
     */
    if ($sub_cat_2) {

        $sub_cat_2_info = wp_insert_term(
            // The Secondo Category
            $sub_cat_2,
            // The Taxonomy Name
            'category',
            // Primo Cat is the Parent here
            array(
                'parent' => $sub_cat_1_id,
            )
        );
        // COLLECTING SECONDO CATEGORY 2 ID
        $sub_cat_2_id = $sub_cat_2_info['term_id'];

    }

    /**
     * INSERT SUB CATEGORY 3 - TERZO
     */
    if ($sub_cat_3) {

        $sub_cat_3_info = wp_insert_term(
            // The Terzo Category
            $sub_cat_3,
            // The Taxonomy Name
            'category',
            // Secondo Cat is the Parent here
            array(
                'parent' => $sub_cat_2_id,
            )
        );

        // COLLECTING TERZO CATEGORY 2 ID
        $sub_cat_3_id = $sub_cat_3_info['term_id'];

    }

    // NEW CAT SET ARRAY
    $cat_set_array = array(
        'main_cat' => $category_name,
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
    wp_die();
}