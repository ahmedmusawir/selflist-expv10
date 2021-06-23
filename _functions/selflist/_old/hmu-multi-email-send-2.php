<?php 
/**
 * This uses gform_notification hook and a hidden field to 
 * send emails to multiple people at a time
 */

add_filter( 'gform_notification_6', function( $notification, $form, $entry ) {

  $notification['to'] = $entry['4'];
  // GFCommon::log_debug( __METHOD__ . '(): entry [gf_notification] => ' . print_r( $entry, true ) );

  return $notification;

}, 10, 3 );

// add_action( 'gform_after_submission_5', 'moose_send_email', 10, 2 );
// function moose_send_email( $entry, $form ) {
 
//     //getting post
//     $to = $entry['3'];
//     $subject = $entry['1'];
//     $message = $entry['2'];
 
//     //emailing manually
//     $email_success = wp_mail( $to, $subject, $message );

//   GFCommon::log_debug( __METHOD__ . '(): entry [gf_after_submission] => ' . print_r( $entry, true ) );
//   GFCommon::log_debug( __METHOD__ . '(): wp_mail [$to] => ' . print_r( $to, true ) );
//   GFCommon::log_debug( __METHOD__ . '(): wp_mail [$subject] => ' . print_r( $subject, true ) );
//   GFCommon::log_debug( __METHOD__ . '(): wp_mail [$message] => ' . print_r( $message, true ) );
//   GFCommon::log_debug( __METHOD__ . '(): wp_mail [$email_success] => ' . print_r( $email_success, true ) );
// }