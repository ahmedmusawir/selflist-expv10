<?php 
/**
 * UPDATE PROFILE PASSWORD
 */

// add_action('wp_ajax_noprev_profile_pass_update_ajax', 'profile_pass_update_ajax');
add_action('wp_ajax_profile_pass_update_ajax', 'profile_pass_update_ajax');

 function profile_pass_update_ajax() {

  $user_pass_ajax = $_POST['newPassword'];
  $user_pass = sanitize_text_field($user_pass_ajax);
  $current_user_id = get_current_user_id();

  // UPDATE PASSWORD
  wp_set_password( $user_pass, $current_user_id );

  $passInfo = [
    'User ID' => $user_pass,
    'User Pass' => $current_user_id,
  ];

  wp_send_json( $passInfo, $status_code );

  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }