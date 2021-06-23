<?php
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

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
        'post_content' => sanitize_text_field($post_args['content']),
        'post_status' => $post_args['status'],
        'post_category' => $cat_ids,
        'meta_input' => [
            'your_name' => sanitize_text_field($post_args['name']),
            'your_phone' => sanitize_text_field($post_args['phone']),
            'your_email' => sanitize_text_field($post_args['email']),
            'your_site' => sanitize_text_field($post_args['site']),
            'your_facebook' => sanitize_text_field($post_args['facebook']),
            'your_yelp' => sanitize_text_field($post_args['yelp']),
            'your_instagram' => sanitize_text_field($post_args['instagram']),
            'your_linkedin' => sanitize_text_field($post_args['linkedin']),
            'your_twitter' => sanitize_text_field($post_args['twitter']),
        ],
    ];

    // INSERTING LIST
    $post_id = wp_insert_post($args);

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