<?php
add_action('wp_ajax_nopriv_get_home_data_ajax', 'get_home_data_ajax');
add_action('wp_ajax_get_home_data_ajax', 'get_home_data_ajax');

function get_home_data_ajax()
{

 // INSERTING KEYS
 $cat_one_name = get_option('options_category_1_name');
 $cat_one_link = get_option('options_category_1_link');

 $response = [
  'catOneName' => $cat_one_name,
  'catOneLink' => $cat_one_link
 ];

 wp_send_json_success($response);

 wp_die();
}