<?php
add_action('wp_ajax_nopriv_get_home_data_ajax', 'get_home_data_ajax');
add_action('wp_ajax_get_home_data_ajax', 'get_home_data_ajax');

function get_home_data_ajax()
{

    // HOME PAGE ROW 1 BUTTON DATA
    $button_1_title = get_option('options_button_1_title');
    $button_2_title = get_option('options_button_2_title');
    $button_3_title = get_option('options_button_3_title');
    $button_1_link = get_option('options_button_1_url');
    $button_2_link = get_option('options_button_2_url');
    $button_3_link = get_option('options_button_3_url');

    // HOME PAGE ROW 2 SLIDER DATA
    $slider_block_title = get_option('options_slider_block_title');
    $slider_image_1 = get_field('slider_image_1', 'options');
    $slider_image_2 = get_field('slider_image_2', 'options');
    $slider_image_3 = get_field('slider_image_3', 'options');
    $listing_1_link = get_option('options_listing_1_link');
    $listing_2_link = get_option('options_listing_2_link');
    $listing_3_link = get_option('options_listing_3_link');

    // HOME PAGE ROW 3 VIDEO DATA
    $youtube_video_id_1 = get_option('options_youtube_video_id_1');
    $youtube_video_id_2 = get_option('options_youtube_video_id_2');
    $youtube_video_id_3 = get_option('options_youtube_video_id_3');
    $video_title_1 = get_option('options_video_title_1');
    $video_title_2 = get_option('options_video_title_2');
    $video_title_3 = get_option('options_video_title_3');

    // HOME PAGE ROW 4 TESTIMONIAL DATA
    $customer_1 = get_option('options_customer_1');
    $customer_2 = get_option('options_customer_2');
    $customer_3 = get_option('options_customer_3');
    $customer_4 = get_option('options_customer_4');
    $comment_1 = get_option('options_comment_1');
    $comment_2 = get_option('options_comment_2');
    $comment_3 = get_option('options_comment_3');
    $comment_4 = get_option('options_comment_4');

    $response = [
        'button_1_title' => $button_1_title,
        'button_2_title' => $button_2_title,
        'button_3_title' => $button_3_title,
        'button_1_link' => $button_1_link,
        'button_2_link' => $button_2_link,
        'button_3_link' => $button_3_link,
        'slider_block_title' => $slider_block_title,
        'slider_image_1' => $slider_image_1,
        'slider_image_2' => $slider_image_2,
        'slider_image_3' => $slider_image_3,
        'listing_1_link' => $listing_1_link,
        'listing_2_link' => $listing_2_link,
        'listing_3_link' => $listing_3_link,
        'video_title_1' => $video_title_1,
        'video_title_2' => $video_title_2,
        'video_title_3' => $video_title_3,
        'youtube_video_id_1' => $youtube_video_id_1,
        'youtube_video_id_2' => $youtube_video_id_2,
        'youtube_video_id_3' => $youtube_video_id_3,
        'customer_1' => $customer_1,
        'customer_2' => $customer_2,
        'customer_3' => $customer_3,
        'customer_4' => $customer_4,
        'comment_1' => $comment_1,
        'comment_2' => $comment_2,
        'comment_3' => $comment_3,
        'comment_4' => $comment_4,

    ];

    wp_send_json_success($response);

    wp_die();
}
