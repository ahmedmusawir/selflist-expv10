<?php 
/**
 * DELSIT - LIST STATUS UPDATE TO PENDING WITH AJAX
 */

// add_action('wp_ajax_nopriv_delete_list_permanently_ajax', 'delete_list_permanently_ajax');
add_action('wp_ajax_delete_list_permanently_ajax', 'delete_list_permanently_ajax');

 function delete_list_permanently_ajax() {

  $delist_id = $_POST['delistId'];

  // echo "DeList ID: $delist_id"; 

  $list_del_status = wp_delete_post($delist_id, false); // false for Trash Bin
  // $list_del_status = wp_delete_post($delist_id, false); // false for Trash Bin

  wp_send_json($list_del_status); 
  // return $list_del_status; 


  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }