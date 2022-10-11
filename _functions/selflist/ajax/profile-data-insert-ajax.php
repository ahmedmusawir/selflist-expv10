<?php 
/**
 * INSERT MEMBER PROFILE ADDITIONAL DATA WITH AJAX
 */

// add_action('wp_ajax_nopriv_profile_data_insert_ajax', 'profile_data_insert_ajax');
add_action('wp_ajax_profile_data_insert_ajax', 'profile_data_insert_ajax');

 function profile_data_insert_ajax() {
  
  // COLLECT CURRENT USER
  $current_user = wp_get_current_user();
  $user_id = $current_user->id;
  $user_name = $current_user->display_name;
  $user_email = $current_user->user_email;
  $user_new_data = [
    'name' => $user_name,
    'email' => $user_email,
  ];
  // COLLECT AJAX DATA FROM PROFILE FORM
  $profile_data = $_POST['newPostData'];
  // ADDING TO INFO ARRAY FOR INDEXED DB
  $user_total_profile_data = array_merge($user_new_data, $profile_data);

  // echo '<pre>';
  // echo print_r($user_total_data);
  // echo '</pre>';
  // die();
  
  $your_phone = sanitize_text_field($profile_data['phone']);
  $your_site = sanitize_text_field($profile_data['site']);
  $your_facebook = sanitize_text_field($profile_data['facebook']);
  $your_yelp = sanitize_text_field($profile_data['yelp']);
  $your_instagram = sanitize_text_field($profile_data['instagram']);
  $your_linkedin = sanitize_text_field($profile_data['linkedin']);
  $your_youtube = sanitize_text_field($profile_data['youtube']);
  $your_twitter = sanitize_text_field($profile_data['twitter']);

  // UPDATE THE USER'S INFO FIELDS
  update_user_meta($user_id, 'your_profile_phone', $your_phone);
  update_user_meta($user_id, 'your_profile_site', $your_site);
  update_user_meta($user_id, 'your_profile_facebook', $your_facebook);
  update_user_meta($user_id, 'your_profile_yelp', $your_yelp);
  update_user_meta($user_id, 'your_profile_instagram', $your_instagram);
  update_user_meta($user_id, 'your_profile_linkedin', $your_linkedin);
  update_user_meta($user_id, 'your_profile_youtube', $your_youtube);
  update_user_meta($user_id, 'your_profile_twitter', $your_twitter);

  // SENDING TOTAL PROFILE DATA AS JSON
  wp_send_json($user_total_profile_data);

  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }