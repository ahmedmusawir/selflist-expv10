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

  // echo "<h4>Current Cat ID: $current_cat_id</h4><br>"; 
  // echo "<h4>Current State Slug: $state_slug</h4><br>"; 
  // echo "<h4>Current City Slug: $city_slug</h4><br>"; 

  // WP LOOP STARTS
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  // echo 'Paged :' . $paged;
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
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

  if ( $query->have_posts() ) :

    while ( $query->have_posts() ) :
      $query->the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item animate__animated'); ?>>
    <header class="entry-header">

        <?php
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
        <small class="font-weight-bold">State or Country: 
          <span class="text-info">' . $current_state .',</span> Market <span class="text-info">' .  $current_city .'</span>
        </small>
      </p>';

      /**
         * 
         * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
         * 
         */
        
        echo '<section class="post-item-cat-list">';
        /**
         * DISPLAY USER REGISTRATION DATE
         */
        $user_id = get_post_field( 'post_author' ); // Getting Author ID by Post ID (optional)
        $udata = get_userdata( $user_id );
        $registered = $udata->user_registered;
        echo '<span class="bg-danger text-light font-weight-bold float-right py-2 px-4" style="font-size: .8rem;">';
        printf( '%s<br>', date( "d", strtotime( $registered ) ) );
        printf( '%s<br>', date( "m", strtotime( $registered ) ) );
        printf( '%s<br>', date( "y", strtotime( $registered ) ) );
        echo '</span>';
        // DISPLAY LIST ID
        echo '<p class="font-weight-bold" style="margin-bottom: -.5rem; font-size: .8rem">LIST #' . get_the_ID() . "</p>";

        $taxonomy = 'category';

        // Get the term IDs assigned to post.
        $post_terms = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids' ) );
        
        // Separator between links.
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
        
            // Display post categories.
            echo  $terms;
          }

          echo '</section>'; //END .post-item-cat-list

          // =========================================END MOOSE TEST========================================

      if ( 'post' === get_post_type() ) :
                  ?>
        <div class="entry-meta">
            <?php
        cyberize_app_dev_posted_on();
        // cyberize_app_dev_posted_by();
      ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php cyberize_app_dev_post_thumbnail(); ?>

    <div id="post-content" class="entry-content">
        <?php
      the_excerpt();
    ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <section class="flex-icon-five">

            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Facebook Page" src="/wp-content/uploads/fb-icon.png" alt="Facebook Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Twitter Page" src="/wp-content/uploads/Twitter-Icon.png" alt="Twitter Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Yelp Page" src="/wp-content/uploads/Yelp-icon.png" alt="Yelp Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Instagram Page" src="/wp-content/uploads/Instagram-icon.png" alt="Instagram Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Linkedin Page" src="/wp-content/uploads/Linkedin-Icon.png" alt="Linkedin Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Google Plus Page" src="/wp-content/uploads/Google-icon.png" alt="Google Plus Link">
                </a>
            </div>

        </section>

        <section class="flex-icon-five">

            <div class="flex-icon-item">
                <a href="tel:404-321-1234">
                    <img title="Phone: 404-321-1234" src="/wp-content/uploads/Cell-icon.png" alt="Phone Number">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="mailto:webmaster@example.com">
                    <img title="your@email.com" src="/wp-content/uploads/Email-icon.png" alt="Email Address">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="http://website.com" src="/wp-content/uploads/Website-icon.png" alt="Website Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Hit Me Up" src="/wp-content/uploads/HMU-icon.png" alt="HMU Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Your Chat Page" src="/wp-content/uploads/Instant-Messaging-icon.png" alt="Chat Link">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="#">
                    <img title="Flag This List" src="/wp-content/uploads/Screen-Shot-2021-01-26-at-1.50.39-PM.png"
                        alt="Flag Link">
                </a>
            </div>

        </section>

    </footer><!-- .entry-footer -->
</article><!-- Main Article List Item ends -->
<?php     
     endwhile;        
     else :

    echo "No List Found in ...<span class='text-capitalize font-weight-bold text-primary'>$city_slug</span> " ;
    
  endif;

  // WP LOOP ENDS

  wp_die();
 }