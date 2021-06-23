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