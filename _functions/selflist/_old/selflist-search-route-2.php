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
    'callback' => 'listingsSearchResults',
    'args' => array(
      'page' => array (
          'required' => true
      ),
    )
  ));
}

function listingsSearchResults($data) {
  $page = $request['page'];

  $args = array(
    'post_type' => array('listings'),
    's' => sanitize_text_field($data['term']),
    'posts_per_page'    => $posts_per_page,
    'paged'             => $page,
    'orderby'           => 'date',
    'order'             => 'desc',
);

  $mainQuery = new WP_Query($args);

   // if no posts found return 
  if( empty($mainQuery->posts) ){
    return new WP_Error( 'no_posts', __('No post found'), array( 'status' => 404 ) );
  }

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