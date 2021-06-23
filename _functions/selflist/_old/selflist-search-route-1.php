<?php

/**
 * SELFLIST CUSTOM REST FUNCTIONS 
 */


/**
 * REGISTERING LISTING SEARCH INTO REST API
 */
add_action('rest_api_init', 'listingsRegisterSearch');

function listingsRegisterSearch() {
  register_rest_route('listings/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'listingsSearchResults'
  ));
}

function listingsSearchResults($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('listings'),
    's' => sanitize_text_field($data['term'])
  ));

  $results = array(
    'generalInfo' => array(),
  );

  while($mainQuery->have_posts()) {
		$mainQuery->the_post();
		
		if ( get_post_type() == 'listings' ) {
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'authorName' => get_the_author()
      ));
    }
  }

  return $results;

}

 /**
 * ADDING AUTHOR TO REST
 */
function listing_custom_rest() {
  register_rest_field('listings', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}

add_action('rest_api_init', 'listing_custom_rest');

function post_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}

add_action('rest_api_init', 'post_custom_rest');