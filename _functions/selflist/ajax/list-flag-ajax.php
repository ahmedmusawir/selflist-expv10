<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_list_flag_ajax', 'list_flag_ajax');
add_action('wp_ajax_list_flag_ajax', 'list_flag_ajax');

 function list_flag_ajax() {

  $the_data = $_POST['newListData'];
  // LIST INFO
  $list_title = $the_data['title'];
  $list_content = sanitize_text_field($the_data['content']);
  // echo '<pre>';
  // echo print_r($the_data);
  // echo '</pre>';

  $args = [
    'post_title' => $list_title,
    'post_content' => $list_content,
    'post_type' => 'flag',
    'post_status' => 'publish',
  ];
  // CREATING FLAG CUSTOM POST
  $post_result = wp_insert_post($args, true);
  // EMAIL TO ADMIN AND LIST OWNER
  $admin_email = get_bloginfo('admin_email');
  $lister_email = $the_data['email'];
  $list_id = $the_data['listId'];
  // MAKING TO INFO READY
  $to = "$admin_email,$lister_email";
  $subject = "Flagged: List ID $list_id";
  $message = "The visitor reported: [ $list_content ]";
  // SEND FLAG NOTIFICATION EMAIL
  $notification_success = wp_mail($to, $subject, $message);
  echo "Flag Email SUCCESS if 1: $notification_success \n";
  echo "Emails should be sent to: [$to] \n";
  echo "Subject should be: $subject \n";
  echo "The Message: [$message] \n";
  echo "List ID: $list_id \n";
  echo "Lister Email: $lister_email";


  // MUST FOR WP AJAX
  wp_die();
 }