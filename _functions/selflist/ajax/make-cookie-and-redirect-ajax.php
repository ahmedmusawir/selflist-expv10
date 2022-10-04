<?php
/**
 * THIS IS TO MAKE COOKIE FOR THE FAKE LIST PAGE FOR NON MEMBERS SO THAT 
 * THE ORIGIN PAGE CAN BE TRACKED. THIS ALSO, SAVES USER'S PERSONAL DATA
 * INTO COOKIES SO THAT UPON SIGNUP THAT DATA CAN BE INSERTED UNDER THE 
 * MEMBER PROFILE. ALL THE DATA SAVED ALSO INTO A SESSTION VARIABLE SO THAT
 * UPON LOGIN THE LIST FORM CAN BE PRE-POPULATED.
 */

// FOR NON LOGGED IN USERS
add_action('wp_ajax_nopriv_make_cookie_and_redirect_ajax', 'make_cookie_and_redirect_ajax');
// FOR LOGGED IN USERS
add_action('wp_ajax_make_cookie_and_redirect_ajax', 'make_cookie_and_redirect_ajax');

function make_cookie_and_redirect_ajax()
{

 $cookie_name  = "origin_page";
 $cookie_value = "fake-list-page";
 setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day

 $post_args = $_POST['newPostData'];

// EXTRACTING THE DATA
 $phone     = sanitize_text_field($post_args['phone']);
 $site      = sanitize_text_field($post_args['site']);
 $facebook  = sanitize_text_field($post_args['facebook']);
 $yelp      = sanitize_text_field($post_args['yelp']);
 $instagram = sanitize_text_field($post_args['instagram']);
 $linkedin  = sanitize_text_field($post_args['linkedin']);
 $twitter   = sanitize_text_field($post_args['twitter']);
 $youtube   = sanitize_text_field($post_args['youtube']);

// SET THE COOKIES
 setcookie("USER_DATA[user_phone]", $phone, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_site]", $site, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_facebook]", $facebook, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_yelp]", $yelp, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_instagram]", $instagram, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_linkedin]", $linkedin, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_twitter]", $twitter, time() + (86400 * 1), "/");
 setcookie("USER_DATA[user_youtube]", $youtube, time() + (86400 * 1), "/");

 if (!is_wp_error($post_id)) {
  wp_send_json_success(array('SET ALL USER DATA TO USER_DATA COOKIE', $phone), 200);
 } else {
  wp_send_json_error($post_id->get_error_message());
 }

 // MUST FOR WP AJAX
 wp_die();

}