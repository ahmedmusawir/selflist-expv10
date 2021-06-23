<?php 
/**
 * THIS ADDS INITIAL 10 FREE POINTS DURING MEMBER SIGNUP USING GRAVITY REG FORM
 */

function add_signup_customer_points($user_id, $feed, $entry, $user_pass) {

  $new_customer_points = $entry['5'];
  $new_customer_point = 25;

  // SETTING INITIAL MEMBER POINTS
  // Will return false if the previous value is the same as $new_value.
  $points_updated = update_user_meta( $user_id, 'selflist_points', $new_customer_point );
  // $points_updated = update_user_meta( $user_id, 'selflist_points', 10 );

  // GFCommon::log_debug( __METHOD__ . '(): entry => ' . print_r( $entry, true ) );
  // GFCommon::log_debug( __METHOD__ . '(): MOOSE POINTS => ' . print_r( $new_customer_points, true ) );
  // GFCommon::log_debug( __METHOD__ . '(): MOOSE POINTS UPDATED => ' . print_r( $points_updated, true ) );

}

add_action( 'gform_user_registered', 'add_signup_customer_points', 10, 4 );