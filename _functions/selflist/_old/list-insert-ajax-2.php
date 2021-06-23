<?php
/**
 * INSERT A NEW LIST W/ MULTI LEVEL CATEGORIES WITH AJAX
 */
// SETTING UP WP CRON
// This is to delete the private posts generated due to show the brand new categories
// in the List Preview screen. New categories will not normally show up if a published post
// is not attatched to them. So we are taking this Private Post approach which we will
// delete via wp_cron and via CSS
add_action('POST_DELETE_event', 'delete_private_post', 10, 1);

function delete_private_post($post_private_id)
{
    wp_delete_post($post_private_id, false);
}

// add_action('wp_ajax_nopriv_list_insert_ajax', 'list_insert_ajax');
add_action('wp_ajax_list_insert_ajax', 'list_insert_ajax');

function list_insert_ajax()
{

    $post_args = $_POST['newPostData'];

    // SETTING CATEGORY IDS ARRAY
    $cat_ids = [
        $post_args['mainCatId'],
        $post_args['primoCatId'],
        $post_args['secondoCatId'],
        $post_args['terzoCatId'],
    ];

    // SETTING TAXONOMY IDS ARRAY
    $tax_ids = [
        intval($post_args['stateId']),
        intval($post_args['cityId']),
    ];
    // $state_id = intval($post_args['stateId']);
    // $city_id = intval($post_args['cityId']);

    // PREPARING POST ARGS
    $args = [
        'post_title' => $post_args['title'],
        'post_content' => $post_args['content'],
        'post_status' => $post_args['status'],
        'post_category' => $cat_ids,
        'meta_input' => [
            'your_name' => $post_args['name'],
            'your_phone' => $post_args['phone'],
            'your_email' => $post_args['email'],
            'your_site' => $post_args['site'],
            'your_facebook' => $post_args['facebook'],
            'your_yelp' => $post_args['yelp'],
            'your_instagram' => $post_args['instagram'],
            'your_linkedin' => $post_args['linkedin'],
            'your_google_plus' => $post_args['googlePlus'],
            'your_twitter' => $post_args['twitter'],
        ],
    ];

    // INSERTING LIST
    $post_id = wp_insert_post($args);

    // INSERTING PRIVATE POST AS A TEST
    $args_private = [
        'post_title' => 'Private Post',
        'post_category' => $cat_ids,
        'post_status' => 'private',
    ];

    $post_private_id = wp_insert_post($args_private);

    // SETTING LISTING EXPIRITION TIME WITH WP CRON
    wp_schedule_single_event(time() + 120, 'POST_DELETE_event', [$post_private_id]);
    // wp_schedule_single_event( $timestamp:integer, $hook:string, $args:array )

    // SETTING STATE & CITY TAXONOMY
    $state_city_return = wp_set_object_terms($post_id, $tax_ids, 'states');

    if (!is_wp_error($post_id)) {
        wp_send_json_success(array('post_id' => $post_id, 'tax_return' => $state_city_return), 200);
    } else {
        wp_send_json_error($post_id->get_error_message());
    }

    // FOLLOWING IS A MUST FOR AJAX
    wp_die();

}
