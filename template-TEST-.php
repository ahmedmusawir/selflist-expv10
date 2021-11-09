<?php
/**
 * The template for displaying all pages
 * Template Name: List TEST
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

if (is_user_logged_in()) {
  get_header();
} else {
  get_header('loggedout');
}
?>

<main id="primary" class="site-main container">

    <h2 class="text-center font-weight-bold mt-5">PENDING POST CATS</h2>

    <?php 
$args = array (
  'post_type' => 'post',
  'post_status' => 'pending',
  'p' => 1296
);  

 $query = new WP_Query($args);

  if ( $query->have_posts() ) {

    while ( $query->have_posts() ) { 
      $query->the_post();

    $post_id = get_the_ID();  

    /**
             *
             * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
             *
             */
            $taxonomy = 'category';
            // function coming from _functions/selflist/taxonomy/selflist-cat-list-w-links
            // show_all_categories_w_links_and_arrows($post_id, $taxonomy);
            $cats = get_the_category($post_id);

            echo '<pre>';
            print_r($cats);
            echo '</pre>';

            foreach ($cats as $cat) {
                # code...
                echo $cat->name;
                echo '<br>';
            } 


                  
    //   the_content();

    }
  } else {
    
    echo 'No Post Found ...';

  } 
  
?>

</main><!-- #main -->

<?php
get_footer();