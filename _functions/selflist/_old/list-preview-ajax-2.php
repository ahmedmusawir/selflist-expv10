<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_list_preview_ajax', 'list_preview_ajax');
add_action('wp_ajax_list_preview_ajax', 'list_preview_ajax');

function list_preview_ajax() {

  $post_id = $_POST['post_id'];


  // DEBUGGING START
  // echo "<h4>New Preview List ID: $post_id</h4><br>"; 

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

    while( $the_list->have_posts() ) : $the_list->the_post(); ?>

<section class="category">
  <main id="list-preview" class="site-main container category">
    <article id="" class="category animate__animated">
      <header class="entry-header">

        <?php
            /**
               * 
               * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
               * 
               */
              
              echo '<section class="post-item-cat-list">';
              echo '<p class="font-weight-bold" style="margin-bottom: -.25rem; font-size: .8rem">LIST #' . $post_id . "</p>";
      
              $taxonomy = 'category';
      
              // Get the term IDs assigned to post.
              $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
              
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
    </article><!-- #post-ENDS -->
  </main>
</section>
<?php
        // -------------------------- DEBUGGING INFO -----------------------------------------
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