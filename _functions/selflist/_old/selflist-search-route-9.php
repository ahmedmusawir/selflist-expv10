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
          'required' => false
      ),
    )

  ));
}

function listingsSearchResults(WP_REST_Request $request){
  // get slug and page number
    // $slug = $request['slug'];
    $page = $request['page'];
    // $posts_per_page = 8;
     
    $args = array(
        'post_type' => array('listings'),
        's' => sanitize_text_field($request['term']),
        'posts_per_page'    => $posts_per_page,
        'paged'             => $page,
        'orderby'           => 'date',
        'order'             => 'desc',
    );
 // use WP_Query to get the results with pagination
    $query = new WP_Query( $args ); 

 // if no posts found return 
    if( empty($query->posts) ){
        // return new WP_Error( 'no_posts', __('No post found'), array( 'status' => 404 ) );
        $nothing = array();
        return $nothing;
    }

// MOOSE START - NUMBER 8 IS THE CURRENT WORKING VERSION

// $result = array();

// while($query->have_posts()) {
//   $query->the_post();

//   array_push($result, array(
//     'title' => get_the_title(),
//     'permalink' => get_the_permalink(),
//     'postType' => get_post_type(),
//     'authorName' => get_the_author()
//   ));

// }  

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

// MOOSE END
     
// set max number of pages and total num of posts
    $max_pages = $query->max_num_pages;
    $total = $query->found_posts;

    $posts = $query->posts;


// prepare data for output
    $controller = new WP_REST_Posts_Controller('post');

    foreach ( $posts as $post ) {
        $response = $controller->prepare_item_for_response( $post, $request );
        $data[] = $controller->prepare_response_for_collection( $response );  
    }

// set headers and return response      
    $response = new WP_REST_Response($data, 200);

    $response->header( 'X-WP-Total', $total ); 
    $response->header( 'X-WP-TotalPages', $max_pages );

    return $response;
}

 /**
 * ADDING CUSTOM FIELDS TO REST
 */
// FOLLOWING NOT WORKING WITH CPT NAME, BUT WORK WHEN POST IS USED WHY?
// function listing_custom_rest() {
//   register_rest_field('listings', 'authorName', array(
//     'get_callback' => function() {return get_the_author();}
//   ));
// }

// add_action('rest_api_init', 'listing_custom_rest');

function acf_custom_rest() {
  register_rest_field('post', 'titlePrimo', array(
    'get_callback' => function() {
      $titlePrimo = get_field('subtitle_primo');
      return $titlePrimo;
    }
  ));
  register_rest_field('post', 'titleSecondo', array(
    'get_callback' => function() {
      $titleSecondo = get_field('subtitle_secondo');
      return $titleSecondo;
    }
  ));
  register_rest_field('post', 'titleTerzo', array(
    'get_callback' => function() {
      $titleTerzo = get_field('subtitle_terzo');
      return $titleTerzo;
    }
  ));
}

add_action('rest_api_init', 'acf_custom_rest');

// function post_custom_rest() {
//   register_rest_field('post', 'authorName', array(
//     'get_callback' => function() {return get_the_author();}
//   ));
// }

// add_action('rest_api_init', 'post_custom_rest');