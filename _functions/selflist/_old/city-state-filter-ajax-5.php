<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_city_state_filter_ajax', 'city_state_filter_ajax');
add_action('wp_ajax_city_state_filter_ajax', 'city_state_filter_ajax');

 function city_state_filter_ajax() {

  $current_cat_id = $_POST['currentCatId'];
  $state_slug = $_POST['stateSlug'];
  $city_slug = $_POST['citySlug'];

  echo "<h4>Current Cat ID: $current_cat_id</h4><br>"; 
  echo "<h4>Current State Slug: $state_slug</h4><br>"; 
  echo "<h4>Current City Slug: $city_slug</h4><br>"; 

  // WP LOOP STARTS
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  echo 'Paged :' . $paged;
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'paged' => $paged,
    'category__in' => [ $current_cat_id ], //App Dev
    'tax_query' => [
      'relation' => 'AND',
      [
        'taxonomy' => 'states',
        'field' => 'slug',
        'terms' => [ $state_slug ],
      ],
      [
        'taxonomy' => 'states',
        'field' => 'slug',
        'terms' => [ $city_slug ],
      ],
    ],
  );

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) {

    // TESTING PAGINATION START =================================================
    
    $total = $query->found_posts;
    $post_count = $query->post_count;
    $page_count = ceil($query->max_num_pages);

    echo '<br>Total Posts: ' . $total; 
    echo '<br>Total Post Count current page: ' . $post_count; 
    echo '<br>Total Page Count: ' . $page_count; 


    // TESTING PAGINATION END ===================================================
    
    while ( $query->have_posts() ) {
      $query->the_post();

      // CITY & STATE TAXONMY DISPLAY BY LIST START
      $tax = get_the_terms( get_the_ID(), 'states');

      foreach( $tax as $term ) {
        if ( $term->parent == 0 ) {
          $current_state = $term->name;
        } else {
          $current_city = $term->name;
        }
      } 

      echo '
      <p class="text-dark text-uppercase" style="font-size: .8rem; margin-bottom: 0;">
        <small class="font-weight-bold">City: 
          <span class="text-info">' . $current_city .',</span> State: <span class="text-info">' . $current_state .'</span>
        </small>
      </p>';

      the_content();
      $post_id = get_the_id();
      echo "<h5 class='font-weight-bold'>List ID:  $post_id </h5>";
      // SHOW STATE & CITY IN A PARENT CHILD ORDER
      // print_taxonomy_ranks( get_the_terms( get_the_ID(), 'states' ) );


      $cats = get_the_category();
      foreach( $cats as $cat ) {
        if ( $cat->parent == 0 ) {
          // echo '<br>State: ' . $cat->name;
          $current_main_cat = $cat->name;
        } 
      }
      echo '<pre>';
      // print_r($cats);
      // print_r($cats[0]->name);
      echo '<br>Main Cat: ' . $current_main_cat;
      // echo 'Current Catetory: ' . get_categoy($current_cat_id);
      // echo print_r(get_category($current_cat_id));
      echo '<br>Current Cat: ' . get_category($current_cat_id)->name;
      echo '</pre>';
      
    } // END WHILE
    next_posts_link('&laquo; Next Page', $query->max_num_pages);
    // previous_posts_link('Newer Entries &raquo;');
  } else {

    echo 'No Post Found ...';
    
  }

  // DEBUGGING START
  // echo '<pre>';
  // echo print_r($the_post);
  // echo '</pre>';
  // DEBUGGING END
  
  // WP LOOP ENDS

  wp_die();
 }