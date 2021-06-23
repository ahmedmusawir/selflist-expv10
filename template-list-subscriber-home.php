<?php
/**
 * The template for displaying all pages
 * Template Name: Subscriber Home
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header();

$current_user = wp_get_current_user();

?>

<main id="primary" class="site-main container">

  <h1 class="">Welcome <?php echo $current_user->display_name; ?></h1>
  <h4>Your User ID: <?php echo $current_user->id; ?></h4>
  <article class="btn btn-light">
    <p class="d-inline">
      Your Messages
      <?php echo do_shortcode('[yobro_chat_notification]'); ?>
    </p>
    <?php 
     echo do_shortcode("[yobro_chat_new_message user_id=$current_user->id]");
    ?>
  </article>

  <?php  echo do_shortcode('[yobro_chat_new_message user_id=10]');?>

  <hr>

</main><!-- #main -->

<?php
get_footer();