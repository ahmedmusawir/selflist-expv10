<?php 
/**
 * RELSIT - LIST RECREATION WITH AJAX
 */

add_action('wp_ajax_nopriv_relist_data_update_ajax', 'relist_data_update_ajax');
add_action('wp_ajax_relist_data_update_ajax', 'relist_data_update_ajax');

 function relist_data_update_ajax() {

  $relist_id = $_POST['relistId'];

  // GETTING CITY & STATE
  $city_state = get_the_terms($relist_id, 'states');
  // echo '<pre>';
  // print_r($city_state);
  // echo '</pre>';

  foreach($city_state as $item) {
    if($item->parent == 0) {
      $state = $item->name;
      $state_id = $item->term_id;
    }
    else {
      $city = $item->name;
      $city_id = $item->term_id;
    }
  }
  
  $the_list = get_post($relist_id);
  $the_list_cats = get_the_category($relist_id);
  $cat_results = [];

  // GET THE MAIN CAT
  foreach ($the_list_cats as $cat) {
    if ($cat->parent == 0 ) {
      // GET THE SUB CATS
      // Following comes from _functions/selflist/selflist-get-category-json.php
      $new_results = get_selflist_sub_cats_to_json($cat->term_id);

      $cat_results = [
        'mainCatName' => $cat->name,
        'mainCatId' => $cat->term_id,
        $new_results,
      ];
    }
  }

  $list_details = [
    'ID' => $relist_id,
    'list_content' => $the_list->post_content,
    'list_cats' => $cat_results,
    'state' => $state,
    'state_id' => $state_id,
    'city' => $city,
    'city_id' => $city_id,
  ];


  wp_send_json($list_details);

  // FOLLOWING IS A MUST FOR AJAX
  wp_die();

 }