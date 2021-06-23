<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_list_preview_ajax', 'list_preview_ajax');
add_action('wp_ajax_list_preview_ajax', 'list_preview_ajax');

 function list_preview_ajax() {

  $post_id = $_POST['post_id'];

  echo "<h4>New Preview List ID: $post_id</h4><br>"; 

  // DEBUGGING START

  // $the_post = get_post($post_id);

  // echo '<pre>';
  // echo print_r($the_post);
  // echo '</pre>';

  // DEBUGGING END

  $args = [
    'post_type' => 'post',
    'post_status' => 'pending',
    'p' => $post_id,
  ];

  $the_list = new WP_Query($args);

  if ( $the_list->have_posts() ) : 

    while( $the_list->have_posts() ) : $the_list->the_post();

       /**
         * 
         * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
         * 
         */
        
        echo '<section class="post-item-cat-list">';

        $taxonomy = 'category';
        $list_id = get_the_ID();
 
        // Get the term IDs assigned to post.
        $post_terms = wp_get_object_terms( $list_id, $taxonomy, array( 'fields' => 'ids' ) );
         
        // Separator between links.
        // $separator = '> ';
        $separator = '&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;';
         
        if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
         
            $term_ids = implode( ',' , $post_terms );
         
            $terms = wp_list_categories( array(
                'title_li' => '',
                'style'    => 'none',
                'echo'     => false,
                'taxonomy' => $taxonomy,
                'include'  => $term_ids
            ) );
         
            $terms = trim( str_replace( '<br />',  $separator, $terms ));
            // $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
         
            // Display post categories.
            echo  $terms;
        }

        echo '</section>'; //END .post-item-cat-list

         // =========================================END MOOSE TEST========================================

      the_title();
      echo '<br>';
      the_content();
      echo '<br>';
      echo the_field('your_name') . '<br>';
      echo the_field('your_phone') . '<br>';
      echo the_field('your_email') . '<br>';
      echo the_field('your_site') . '<br>';
      echo the_field('your_city') . '<br>';
      echo the_field('your_zip') . '<br>';
      echo the_field('your_state') . '<br>';
      echo the_field('your_facebook') . '<br>';
      echo the_field('your_yelp') . '<br>';
      echo the_field('your_instagram') . '<br>';
      echo the_field('your_linkedin') . '<br>';
      echo the_field('your_google_plus') . '<br>';
      echo the_field('your_twitter') . '<br>';

      // echo '<pre>';
      // print_r(get_the_category());
      // echo '</pre>';

    endwhile;  

  endif;  

  die();
 }