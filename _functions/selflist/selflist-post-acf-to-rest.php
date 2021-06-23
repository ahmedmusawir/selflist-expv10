<?php
 /**
 * ADDING CUSTOM FIELDS TO REST
 */

function post_acf_to_rest() {
  register_rest_field('post', 'member_name', array(
    'get_callback' => function() {
      $memName = get_field('your_name');
      return $memName;
    }
  ));
  // register_rest_field('post', 'member_address', array(
  //   'get_callback' => function() {
  //     $memAddress = get_field('your_address');
  //     return $memAddress;
  //   }
  // ));
}

add_action('rest_api_init', 'post_acf_to_rest');