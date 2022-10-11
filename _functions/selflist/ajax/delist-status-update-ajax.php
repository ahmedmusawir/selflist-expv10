<?php 
/**
 * DELSIT - LIST STATUS UPDATE TO PENDING WITH AJAX
 */

// add_action('wp_ajax_nopriv_delist_status_update_ajax', 'delist_status_update_ajax');
add_action('wp_ajax_delist_status_update_ajax', 'delist_status_update_ajax');

 function delist_status_update_ajax() {

  $delist_id = $_POST['delistId'];

  // echo "Moose DeList ID: $delist_id"; 

  $delist_args = array(
    'ID'           => $delist_id,
    'post_status'   => 'pending',
  );

  $delist_status = wp_update_post( $delist_args, true );                        
  
  echo $delist_status;

  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }