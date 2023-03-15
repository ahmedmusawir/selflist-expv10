<?php
add_action('wp_ajax_nopriv_get_home_data_ajax', 'get_home_data_ajax');
add_action('wp_ajax_get_home_data_ajax', 'get_home_data_ajax');

function get_home_data_ajax()
{

    // HOME PAGE ROW 1 DATA
    $button_1_title = get_option('options_button_1_title');
    $button_2_title = get_option('options_button_2_title');
    $button_3_title = get_option('options_button_3_title');
    $button_1_link = get_option('options_button_1_url');
    $button_2_link = get_option('options_button_2_url');
    $button_3_link = get_option('options_button_3_url');

    // HOME PAGE ROW 2 DATA
    $slider_image_1 = get_option('options_slider_image_1');
    $slider_image_2 = get_option('options_slider_image_2');
    $slider_image_3 = get_option('options_slider_image_3');
    $listing_1_link = get_option('options_listing_1_link');
    $listing_2_link = get_option('options_listing_2_link');
    $listing_3_link = get_option('options_listing_3_link');

    // HOME PAGE ROW 3 DATA
    $youtube_video_id_1 = get_option('options_youtube_video_id_1');
    $youtube_video_id_2 = get_option('options_youtube_video_id_2');
    $youtube_video_id_3 = get_option('options_youtube_video_id_3');
    $video_title_1 = get_option('options_video_title_1');
    $video_title_2 = get_option('options_video_title_2');
    $video_title_3 = get_option('options_video_title_3');

    $response = [
        'button_1_title' => $button_1_title,
        'button_2_title' => $button_2_title,
        'button_3_title' => $button_3_title,
        'button_1_link' => $button_1_link,
        'button_2_link' => $button_2_link,
        'button_3_link' => $button_3_link,
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
    ];

    wp_send_json_success($response);

    wp_die();
}
