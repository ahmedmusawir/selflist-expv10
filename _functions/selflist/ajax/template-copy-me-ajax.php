<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_test_ajax', 'test_ajax');
add_action('wp_ajax_test_ajax', 'test_ajax');

 function test_ajax() {

  $post_id = $_POST['post_id'];

  echo "<h4>New List ID: $post_id</h4><br>"; 

  // $the_post = get_post($post_id);

  // echo '<pre>';
  // echo print_r($the_post);
  // echo '</pre>';

  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }