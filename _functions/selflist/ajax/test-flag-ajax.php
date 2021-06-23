<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_test_flag_ajax', 'test_flag_ajax');
add_action('wp_ajax_test_flag_ajax', 'test_flag_ajax');

 function test_flag_ajax() {

  $the_data = $_POST['newPostData'];

  // echo "New List ID: $post_id"; 

  // $the_post = get_post($post_id);

  // echo '<pre>';
  // echo print_r($the_data);
  // echo '</pre>';

  $args = [
    'post_title' => $the_data['title'],
    'post_content' => $the_data['content'],
    'post_type' => 'flag',
    'post_status' => 'publish',
  ];

  $post_result = wp_insert_post($args, true);
  
  return $post_result;

  die();
 }